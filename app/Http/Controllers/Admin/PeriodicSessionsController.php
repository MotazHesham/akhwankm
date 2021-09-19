<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeriodicSessionRequest;
use App\Http\Requests\StorePeriodicSessionRequest;
use App\Http\Requests\UpdatePeriodicSessionRequest;
use App\Models\BigBrother;
use App\Models\PeriodicSession;
use App\Models\SmallBrother;
use App\Models\UserAlert;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class PeriodicSessionsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('periodic_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $periodicSessions = PeriodicSession::with(['big_brother', 'small_brother'])->get();

        return view('admin.periodicSessions.index', compact('periodicSessions'));
    }

    public function create()
    {
        abort_if(Gate::denies('periodic_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigbrothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $smallbrothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        return view('admin.periodicSessions.create', compact('bigbrothers' ));
    }

    public function store(StorePeriodicSessionRequest $request)
    {
        $validated_request = $request->all();
        $bigbrother = BigBrother::findOrFail($validated_request['big_brother_id']);
        if($bigbrother->small_brother_id == null){
            Alert::error('لم يتم الأضافة','لا يتم المأخاة للأخ الأكبر بعد');
            return redirect()->route('admin.periodic-sessions.index');
        }
        $validated_request['small_brother_id'] = $bigbrother->small_brother_id;
        $periodicSession = PeriodicSession::create($validated_request);

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
           
        $userAlert = UserAlert::create([
            'alert_text' => 'تم تحديد موعد جلسة جديد    ',
            'alert_link' => route('bigbrother.calender'),
            'type' => 'system',
        ]);

        $user_id=Bigbrother::where('id',$request->big_brother_id)->first()->user_id;
  
        $userAlert->users()->sync([$user_id ?? 0]);
        
        return redirect()->route('admin.periodic-sessions.index');
    }

    public function edit(PeriodicSession $periodicSession)
    {
        abort_if(Gate::denies('periodic_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigbrothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');


        $periodicSession->load('big_brother', 'small_brother');

        return view('admin.periodicSessions.edit', compact('bigbrothers' , 'periodicSession'));
    }

    public function update(UpdatePeriodicSessionRequest $request, PeriodicSession $periodicSession)
    {
        $periodicSession->update($request->all());

        return redirect()->route('admin.periodic-sessions.index');
    }

    public function show(PeriodicSession $periodicSession)
    {
        abort_if(Gate::denies('periodic_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodicSession->load('big_brother', 'small_brother');

        return view('admin.periodicSessions.show', compact('periodicSession'));
    }

    public function destroy(PeriodicSession $periodicSession)
    {
        abort_if(Gate::denies('periodic_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodicSession->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeriodicSessionRequest $request)
    {
        PeriodicSession::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
