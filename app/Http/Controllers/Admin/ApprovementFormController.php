<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApprovementFormRequest;
use App\Http\Requests\StoreApprovementFormRequest;
use App\Http\Requests\UpdateApprovementFormRequest;
use App\Models\ApprovementForm;
use App\Models\BigBrother;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $specialists = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.approvementForms.create', compact('specialists', 'big_brothers'));
    }

    public function store(StoreApprovementFormRequest $request)
    {
        $approvementForm = ApprovementForm::create($request->all());

        return redirect()->route('admin.approvement-forms.index');
    }

    public function edit(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvementForm->load('specialist', 'big_brother');

        return view('admin.approvementForms.edit', compact('specialists', 'big_brothers', 'approvementForm'));
    }

    public function update(UpdateApprovementFormRequest $request, ApprovementForm $approvementForm)
    {
        $approvementForm->update($request->all());

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

        return back();
    }

    public function massDestroy(MassDestroyApprovementFormRequest $request)
    {
        ApprovementForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
