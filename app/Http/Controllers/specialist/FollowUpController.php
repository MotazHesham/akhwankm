<?php

namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFollowUpRequest;
use App\Http\Requests\StoreFollowUpRequest;
use App\Http\Requests\UpdateFollowUpRequest;
use App\Models\BigBrother;
use App\Models\FollowUp;
use App\Models\SmallBrother;
use App\Models\Challenge;
use App\Models\User;
use Gate;
use Auth;
use Alert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FollowUpController extends Controller
{
    public function index()
    {

        $challenges = Challenge::where('specialist_id',Auth::id())->with(['challengs', 'small_brother'])->get();

        return view('specialist.followUps.index', compact('challenges'));
    }

    public function create($id)
    {

        $small_brother = SmallBrother::findOrfail($id);

        return view('specialist.followUps.create', compact( 'small_brother'));
    }

    public function store(StoreFollowUpRequest $request)
    {
        $followUp = FollowUp::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('specialist.follow-ups.index');
    }

    public function edit(FollowUp $followUp)
    {


        $small_brothers = SmallBrother::with('user')->get()->pluck('user.name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $followUp->load('big_brother', 'small_brother', 'specialist');

        return view('specialist.followUps.edit', compact( 'small_brothers', 'specialists', 'followUp'));
    }

    public function update(UpdateFollowUpRequest $request, FollowUp $followUp)
    {
        $followUp->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('specialist.follow-ups.index');
    }

    public function show(FollowUp $followUp)
    {

        $followUp->load('big_brother', 'small_brother', 'specialist');

        return view('specialist.followUps.show', compact('followUp'));
    }

    public function destroy(FollowUp $followUp)
    {
        abort_if(Gate::denies('follow_up_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $followUp->delete();

        return back();
    }

    public function massDestroy(MassDestroyFollowUpRequest $request)
    {
        FollowUp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
