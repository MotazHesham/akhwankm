<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApprovementFormRequest;
use App\Http\Requests\StoreApprovementFormRequest;
use App\Http\Requests\UpdateApprovementFormRequest;
use App\Models\ApprovementForm;
use App\Models\BrothersDealForm;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;

class ApprovementFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('approvement_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvementForms = ApprovementForm::with(['specialist', 'brothers_deal_form'])->get();

        return view('admin.approvementForms.index', compact('approvementForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('approvement_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brothers_deal_forms = BrothersDealForm::all()->pluck('social_worker', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.approvementForms.create', compact('specialists', 'brothers_deal_forms'));
    }

    public function store(StoreApprovementFormRequest $request)
    {
        $approvementForm = ApprovementForm::create($request->all());

        return redirect()->route('admin.approvement-forms.index');
    }

    public function edit(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brothers_deal_forms = BrothersDealForm::all()->pluck('social_worker', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvementForm->load('specialist', 'brothers_deal_form');

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return view('admin.approvementForms.edit', compact('specialists', 'brothers_deal_forms', 'approvementForm'));
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

        $approvementForm->load('specialist', 'brothers_deal_form');

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
}
