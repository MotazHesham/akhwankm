<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBrothersDealFormRequest;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Http\Requests\UpdateBrothersDealFormRequest;
use App\Models\BigBrother;
use App\Models\BrothersDealForm;
use App\Models\SmallBrother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;

class BrothersDealFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brothers_deal_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForms = BrothersDealForm::with(['big_brother', 'small_brother'])->get();

        return view('admin.brothersDealForms.index', compact('brothersDealForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('brothers_deal_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::all()->pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::all()->pluck('temp', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.brothersDealForms.create', compact('big_brothers', 'small_brothers'));
    }

    public function store(StoreBrothersDealFormRequest $request)
    {
        $brothersDealForm = BrothersDealForm::create($request->all());
        
        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('admin.brothers-deal-forms.index');
    }

    public function edit(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $big_brothers = BigBrother::all()->pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::all()->pluck('temp', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brothersDealForm->load('big_brother', 'small_brother');

        return view('admin.brothersDealForms.edit', compact('big_brothers', 'small_brothers', 'brothersDealForm'));
    }

    public function update(UpdateBrothersDealFormRequest $request, BrothersDealForm $brothersDealForm)
    {
        $brothersDealForm->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));
        
        return redirect()->route('admin.brothers-deal-forms.index');
    }

    public function show(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->load('big_brother', 'small_brother');

        return view('admin.brothersDealForms.show', compact('brothersDealForm'));
    }

    public function destroy(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyBrothersDealFormRequest $request)
    {
        BrothersDealForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function printForm(BrothersDealForm $brothersDealForm)
    {
       
      
        return view('forms.brothersDeal', compact('brothersDealForm'));
    }
    
}
