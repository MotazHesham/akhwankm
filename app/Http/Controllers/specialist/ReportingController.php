<?php

namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportingRequest;
use App\Http\Requests\StoreReportingRequest;
use App\Http\Requests\UpdateReport_specialist;
use App\Models\BigBrother;
use App\Models\Reporting;
use App\Models\ReportType;
use App\Models\User;
use Gate;
use Auth;
use Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportingController extends Controller
{
    public function index()
    {
     
        $reportings = Reporting::where('specialist_id',Auth::id())->with(['report_type', 'big_brother', 'specialist'])->get();

        return view('specialist.reportings.index', compact('reportings'));
    }


    public function edit(Reporting $reporting)
    {
     
        $report_types = ReportType::pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::pluck('job', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reporting->load('report_type', 'big_brother', 'specialist');

        return view('specialist.reportings.edit', compact('report_types', 'big_brothers', 'specialists', 'reporting'));
    }


    public function update(UpdateReport_specialist $request, Reporting $reporting)
    {
        $reporting->update($request->all());

       Alert::success(trans('global.flash.success'), trans('global.flash.updated'));
       
        return redirect()->route('specialist.reportings.index');
    }

    public function show(Reporting $reporting)
    {

        $reporting->load('report_type', 'big_brother', 'specialist');

        return view('specialist.reportings.show', compact('reporting'));
    }

    public function destroy(Reporting $reporting)
    {
        abort_if(Gate::denies('reporting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reporting->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportingRequest $request)
    {
        Reporting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
