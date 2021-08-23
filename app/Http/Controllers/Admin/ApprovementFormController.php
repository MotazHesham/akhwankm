<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApprovementFormRequest;
use App\Http\Requests\StoreApprovementFormRequest;
use App\Http\Requests\UpdateApprovementFormRequest;
use App\Models\ApprovementForm;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class ApprovementFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('approvement_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvementForms = ApprovementForm::with(['specialist', 'big_brother'])->get();

        return view('admin.approvementForms.index', compact('approvementForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('approvement_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');  

        return view('admin.approvementForms.create', compact('big_brothers'));
    }

    public function store(StoreApprovementFormRequest $request)
    {
        $validated_request = $request->all();
        $bigBrother = BigBrother::findOrFail($validated_request['big_brother_id']);

        if($bigBrother->specialist_id != null){
            $validated_request['specialist_id'] = $bigBrother->specialist_id;
        }else{
            Alert::error('لم يتم الأضافة','برجاء أضافة مشرف للأخ الأكبر');
            return redirect()->route('admin.approvement-forms.index');
        }

        $approvementForm = ApprovementForm::create($validated_request);

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        return redirect()->route('admin.approvement-forms.index');
    }

    public function edit(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), ''); 
        
        $specialists = User::where('user_type','specialist')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvementForm->load('specialist', 'big_brother');

        return view('admin.approvementForms.edit', compact('specialists', 'big_brothers', 'approvementForm'));
    }

    public function update(UpdateApprovementFormRequest $request, ApprovementForm $approvementForm)
    {
        $approvementForm->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));
        return redirect()->route('admin.approvement-forms.index');
    }

    public function show(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvementForm->load('specialist', 'big_brother');

        return view('admin.approvementForms.show', compact('approvementForm'));
    }

    public function destroy(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvementForm->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));
        return back();
    }

    public function massDestroy(MassDestroyApprovementFormRequest $request)
    {
        ApprovementForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function printForm(ApprovementForm $approvementForm){ 
        $approvementForms = ApprovementForm::findOrFail($approvementForm->id);

        return view('forms.approvementForm',compact('approvementForms'));


    }
}
