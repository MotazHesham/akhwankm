<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTakingNoteRequest;
use App\Http\Requests\StoreTakingNoteRequest;
use App\Http\Requests\UpdateTakingNoteRequest;
use App\Models\SmallBrother;
use App\Models\BigBrother;
use App\Models\TakingNote;
use App\Models\UserAlert;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;

class TakingNotesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('taking_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $takingNotes = TakingNote::with(['specialist_name', 'small_brother_name'])->get();

        return view('admin.takingNotes.index', compact('takingNotes'));
    }

    public function create()
    {
        abort_if(Gate::denies('taking_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist_names = User::where('user_type','specialist')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brother_names = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.takingNotes.create', compact('specialist_names', 'small_brother_names'));
    }

    public function store(StoreTakingNoteRequest $request)
    {
        $takingNote = TakingNote::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        $userAlert = UserAlert::create([
            'alert_text' => 'تم إضافة ملاحظة جديدة    ',
            'alert_link' => route('bigbrother.taking-notes.index'),
            'type' => 'system',
        ]);

        $user_id=Bigbrother::where('small_brother_id',$request->small_brother_name_id)->first()->user_id;
     
    
        $userAlert->users()->sync([$user_id ?? 0]);

        return redirect()->route('admin.taking-notes.index');
    }

    public function edit(TakingNote $takingNote)
    {
        abort_if(Gate::denies('taking_note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist_names = User::where('user_type','specialist')->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brother_names = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $takingNote->load('specialist_name', 'small_brother_name');

        return view('admin.takingNotes.edit', compact('specialist_names', 'small_brother_names', 'takingNote'));
    }

    public function update(UpdateTakingNoteRequest $request, TakingNote $takingNote)
    {
        $takingNote->update($request->all());

        return redirect()->route('admin.taking-notes.index');
    }

    public function show(TakingNote $takingNote)
    {
        abort_if(Gate::denies('taking_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $takingNote->load('specialist_name', 'small_brother_name');

        return view('admin.takingNotes.show', compact('takingNote'));
    }

    public function destroy(TakingNote $takingNote)
    {
        abort_if(Gate::denies('taking_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $takingNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyTakingNoteRequest $request)
    {
        TakingNote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
