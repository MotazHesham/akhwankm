<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportingRequest;
use App\Http\Requests\StoreReportingRequest;
use App\Http\Requests\UpdateReportingRequest;
use App\Models\BigBrother;
use App\Models\Reporting;
use App\Models\ReportType;
use App\Models\User;
use Gate;
use Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reporting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportings = Reporting::with(['report_type', 'big_brother', 'specialist'])->get();

        return view('admin.reportings.index', compact('reportings'));
    }

    public function create()
    {
        abort_if(Gate::denies('reporting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $name = 'name_' . app()->getLocale();
      
        $report_types = ReportType::pluck($name, 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::where('user_type','specialist')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reportings.create', compact('report_types', 'big_brothers', 'specialists'));
    }

    public function store(StoreReportingRequest $request)
    {
        $reporting = Reporting::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('admin.reportings.index');
    }

    public function edit(Reporting $reporting)
    {
        abort_if(Gate::denies('reporting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report_types = ReportType::pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::pluck('job', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reporting->load('report_type', 'big_brother', 'specialist');

        return view('admin.reportings.edit', compact('report_types', 'big_brothers', 'specialists', 'reporting'));
    }

    public function update(UpdateReportingRequest $request, Reporting $reporting)
    {
        $reporting->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.reportings.index');
    }

    public function show(Reporting $reporting)
    {
        abort_if(Gate::denies('reporting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reporting->load('report_type', 'big_brother', 'specialist');

        return view('admin.reportings.show', compact('reporting'));
    }

    public function destroy(Reporting $reporting)
    {
        abort_if(Gate::denies('reporting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reporting->delete();

        
        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyReportingRequest $request)
    {
        Reporting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
