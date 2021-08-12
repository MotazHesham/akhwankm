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

class DatingSessionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dating_session_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datingSessions = DatingSession::with(['specialist', 'big_brother'])->get();

        $users = User::get();

        $big_brothers = BigBrother::get();

        return view('admin.datingSessions.index', compact('datingSessions', 'users', 'big_brothers'));
    }

    public function create()
    {
        abort_if(Gate::denies('dating_session_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        return view('admin.datingSessions.create', compact('specialists', 'big_brothers','small_brothers'));
    }

    public function store(StoreDatingSessionRequest $request)
    {
        $datingSession = DatingSession::create($request->all());

        return redirect()->route('admin.dating-sessions.index');
    }

    public function edit(DatingSession $datingSession)
    {
        abort_if(Gate::denies('dating_session_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $datingSession->load('specialist', 'big_brother');

        return view('admin.datingSessions.edit', compact('specialists', 'big_brothers', 'datingSession'));
    }

    public function update(UpdateDatingSessionRequest $request, DatingSession $datingSession)
    {
        $datingSession->update($request->all());

        return redirect()->route('admin.dating-sessions.index');
    }

    public function show(DatingSession $datingSession)
    {
        abort_if(Gate::denies('dating_session_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datingSession->load('specialist', 'big_brother');

        return view('admin.datingSessions.show', compact('datingSession'));
    }

    public function destroy(DatingSession $datingSession)
    {
        abort_if(Gate::denies('dating_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datingSession->delete();

        return back();
    }

    public function massDestroy(MassDestroyDatingSessionRequest $request)
    {
        DatingSession::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
