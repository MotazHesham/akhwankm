<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBrothersDealFormRequest;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Http\Requests\UpdateBrothersDealFormRequest;
use App\Models\ApprovementForm;
use App\Models\BigBrother;
use App\Models\BrothersDealForm;
use App\Models\SmallBrother;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrothersDealFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brothers_deal_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForms = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])->get();

        return view('admin.brothersDealForms.index', compact('brothersDealForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('brothers_deal_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id','small_brother_id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvment_forms = ApprovementForm::pluck('approved', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::where('user_type','staff')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.brothersDealForms.create', compact('big_brothers', 'small_brothers', 'approvment_forms', 'specialists'));
    }

    public function store(StoreBrothersDealFormRequest $request)
    {
        $smallbrother_id=BIgBrother::findOrfail($request->big_brother_id)->first();
        $small_brother=$smallbrother_id->small_brother_id;
        $brothersDealForm = BrothersDealForm::create(
       [
        'big_brother_id' => $request->big_brother_id ,
        'day' => $request->day ,
       'department_of_social_service' => $request->department_of_social_service ,
       'executive_committee' => $request->executive_committee ,
       'executive_director' => $request->executive_director ,
       'small_brother_id' => $smallbrother_id->small_brother_id ,
       'specialist_id'=> $request->specialist_id ,
]);
        return redirect()->route('admin.brothers-deal-forms.index');
    }

    public function edit(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');


        $approvment_forms = ApprovementForm::pluck('approved', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::where('user_type','staff')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brothersDealForm->load('big_brother', 'small_brother', 'approvment_form', 'specialist');

        return view('admin.brothersDealForms.edit', compact('big_brothers', 'small_brothers', 'approvment_forms', 'specialists', 'brothersDealForm'));
    }

    public function update(UpdateBrothersDealFormRequest $request, BrothersDealForm $brothersDealForm)
    {
        $brothersDealForm->update($request->all());

        return redirect()->route('admin.brothers-deal-forms.index');
    }

    public function show(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->load('big_brother', 'small_brother', 'approvment_form', 'specialist');

        return view('admin.brothersDealForms.show', compact('brothersDealForm'));
    }

    public function destroy(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->delete();

        return back();
    }

    public function massDestroy(MassDestroyBrothersDealFormRequest $request)
    {
        BrothersDealForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function printForm(BrothersDealForm $brothersDealForm)
    {
        $big_brother=BigBrother::findOrFail($brothersDealForm->big_brother_id);
        $small_brother=SmallBrother::findOrFail($brothersDealForm->small_brother_id);
        $approvment_form_id=ApprovementForm::where('big_brother_id',$brothersDealForm->big_brother_id)->first()->id;
        return view('forms.brothersDeal', compact('brothersDealForm','big_brother','small_brother','approvment_form_id'));
    }
}
