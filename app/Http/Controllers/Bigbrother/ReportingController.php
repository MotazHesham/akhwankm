<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportingRequest;
use App\Http\Requests\StoreReportingRequest;
use App\Http\Requests\UpdateReport_brother;
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


    public function create()
    {

      $bigbrother = BigBrother::where('user_id',Auth::id())->first();

        $reporting = Reporting::where('big_brother_id', $bigbrother->id)->with('report_type')->first();
       
        return view('bigbrother.reporting.create',compact('reporting'));
    }


    public function update(UpdateReport_brother $request, Reporting $reporting)
    {
        $reporting->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.report_reply'));

        return redirect()->route('bigbrother.reportings.create');
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

        return back();
    }

    public function massDestroy(MassDestroyReportingRequest $request)
    {
        Reporting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
