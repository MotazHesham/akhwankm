<?php


namespace App\Http\Controllers\Smallbrother;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\OutingRequest;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\DatingSession;
use App\Models\User;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\Role;
use Auth;
use Alert;


class SmallBrotherController extends Controller
{
    //
    public function MyBrother ($user_id){

        $bigBrother = BigBrother::Where('small_brother_id',$user_id)->with(['user', 'skills','charactarstics'])->first();
    
          
        return view('smallbrother.MyBrother', compact('bigBrother'));
    }

    public function edit($user_id)
    {
    
        $skills = Skill::all()->pluck('name_ar', 'id');

        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');
      
        $smallBrother=SmallBrother::find($user_id);

        $user_id=Smallbrother::where('user_id',Auth::id())->first()->id;
   
        return view('smallBrother.edit', compact( 'skills', 'charactaristics', 'smallBrother','user_id'));
    }
    public function update(UpdateRequest $request,User $user,$user_id)
    {
        $smallBrother=SmallBrother::find($user_id);
        $smallBrother->update($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));


        $user=User::find($smallBrother->user_id);

        $user->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('smallbrother.home');
    }
    public function outing($user_id)
    {
       
        $outingRequests = OutingRequest::Where('small_brother_id',$user_id)->orderBy('created_at', 'desc')->with(['outing_type', 'big_brother', 'small_brother'])->paginate(9);

        return view('smallbrother.outingRequests', compact('outingRequests'));
    }
    public function DatingSession($user_id)
    {

        $datingSessions = DatingSession::Where('small_brother_id',$user_id)->with(['specialist', 'big_brother']);

        $users = User::get();

        $big_brothers = BigBrother::get();

        return view('smallbrother.datingSession', compact('datingSessions', 'users', 'big_brothers'));
    }
}
