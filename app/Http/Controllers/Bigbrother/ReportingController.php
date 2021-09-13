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


    public function index()
    {

      $bigbrother = BigBrother::where('user_id',Auth::id())->first();

     $reportings = Reporting::where('big_brother_id', $bigbrother->id)->with('report_type')->orderBy('created_at','desc')->paginate(5);

     return view('bigbrother.reporting.index',compact('reportings'));
    }

    
    public function edit(Reporting $reporting)
    {
      

        return view('bigbrother.reporting.edit',compact('reporting'));
    }
 
    public function update(UpdateReport_brother $request, Reporting $reporting)
    {
        $reporting->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.report_reply'));

        return redirect()->route('bigbrother.reportings.index');
    }

}
