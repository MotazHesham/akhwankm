<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDatingSessionRequest;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Http\Requests\UpdateDatingSessionRequest;
use App\Models\BigBrother;
use App\Models\DatingSession;
use App\Models\SmallBrother;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class DatingSessionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dating_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datingSessions = DatingSession::with(['specialist', 'big_brother','small_brother'])->get();

        $users = User::get();

        $big_brothers = BigBrother::get();

        return view('admin.datingSessions.index', compact('datingSessions', 'users', 'big_brothers'));
    }

    public function create()
    {
        abort_if(Gate::denies('dating_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        return view('admin.datingSessions.create', compact('big_brothers','small_brothers'));
    }

    public function store(StoreDatingSessionRequest $request)
    {
        $validated_request = $request->all();
        $bigBrother = BigBrother::findOrFail($validated_request['big_brother_id']);

        if($bigBrother->specialist_id != null){
            $validated_request['specialist_id'] = $bigBrother->specialist_id;
        }else{
            Alert::error('لم يتم الأضافة','برجاء أضافة مشرف للأخ الأكبر');
            return redirect()->route('admin.approvement-forms.index');
        }
        $datingSession = DatingSession::create($validated_request);

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        return redirect()->route('admin.dating-sessions.index');
    }

    public function edit(DatingSession $datingSession)
    {
        abort_if(Gate::denies('dating_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        $specialists = User::where('user_type','specialist')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $datingSession->load('small_brother','specialist', 'big_brother');

        return view('admin.datingSessions.edit', compact('specialists','big_brothers','small_brothers' , 'datingSession'));
    }

    public function update(UpdateDatingSessionRequest $request, DatingSession $datingSession)
    {
        $datingSession->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));
        return redirect()->route('admin.dating-sessions.index');
    }

    public function show(DatingSession $datingSession)
    {
        abort_if(Gate::denies('dating_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datingSession->load('small_brother','specialist', 'big_brother');

        return view('admin.datingSessions.show', compact('datingSession'));
    }

    public function destroy(DatingSession $datingSession)
    {
        abort_if(Gate::denies('dating_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datingSession->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));
        return back();
    }

    public function massDestroy(MassDestroyDatingSessionRequest $request)
    {
        DatingSession::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
