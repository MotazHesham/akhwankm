<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChallengeRequest;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use App\Models\Challenge;
use App\Models\Challengetype;
use App\Models\BigBrother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Alert;

class ChallengesController extends Controller
{
    public function index()
{
        
        $bigbrother= BigBrother::where('user_id',Auth::id())->first();

        $challenges = Challenge::where('small_brother_id', $bigbrother->small_brother_id)->with(['challengs', 'small_brother'])->get();

        return view('bigbrother.challenges.index', compact('challenges'));
    }

    public function create()
    {

        $name = 'name_' . app()->getLocale();
    
        $challengs = Challengetype::pluck($name, 'id');

        $bigbrother= BigBrother::where('user_id',Auth::id())->first();

        return view('bigbrother.challenges.create', compact('challengs','bigbrother'));
    }

    public function store(StoreChallengeRequest $request)
    {

      $challenges = Challenge::where('small_brother_id', $request->small_brother_id)->first();
     
      if( $challenges == null){

        $challenge = Challenge::create($request->all());
      
        $challenge->challengs()->sync($request->input('challengs', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        }
        
        else

        Alert::error(trans('global.add_challenge_again'));

        return redirect()->route('bigbrother.challenges.index');
    }

    public function edit(Challenge $challenge)
    {
        
        $name = 'name_' . app()->getLocale();

        $challengs = Challengetype::pluck($name, 'id');

        $challenge->load('challengs');

        return view('bigbrother.challenges.edit', compact('challengs', 'challenge'));
    }

    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        $challenge->update($request->all());
        $challenge->challengs()->sync($request->input('challengs', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('bigbrother.challenges.index');
    }

    public function show(Challenge $challenge)
    {

        $challenge->load('challengs');

        return view('bigbrother.challenges.show', compact('challenge'));
    }

    public function destroy(Challenge $challenge)
    {
        abort_if(Gate::denies('challenge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $challenge->delete();

        return back();
    }

    public function massDestroy(MassDestroyChallengeRequest $request)
    {
        Challenge::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
