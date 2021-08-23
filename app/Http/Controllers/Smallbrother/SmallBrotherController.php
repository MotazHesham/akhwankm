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

    public function MyBrother (){

        $smallbrother = SmallBrother::where('user_id',Auth::id())->first();  

        $bigBrother = BigBrother::Where('small_brother_id',$smallbrother->id)->with(['user', 'skills','charactarstics'])->first();
    
        
        return view('smallbrother.MyBrother', compact('bigBrother'));
    }

    public function edit()
    {
    
        $smallBrother = SmallBrother::where('user_id',Auth::id())->first();  

        $skills = Skill::all()->pluck('name_ar', 'id');

        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');  

        return view('smallBrother.edit', compact( 'skills', 'charactaristics', 'smallBrother' ));
    }
    
    public function update(UpdateRequest $request)
    {
        $smallBrother = SmallBrother::where('user_id',Auth::id())->first();  
        
        $smallBrother->update($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));


        $user = Auth::user();

        if ($request->input('cv', false)) {
            if (!$user->cv || $request->input('cv') !== $user->cv->file_name) {
                if ($user->cv) {
                    $user->cv->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($user->cv) {
            $user->cv->delete();
        }
        

        if ($request->input('image', false)) {
            if (!$user->image || $request->input('image') !== $user->image->file_name) {
                if ($user->image) {
                    $user->image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($user->image) {
            $user->image->delete();
        }
        $user->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('smallbrother.home');
    }
    public function outing()
    {
        
        $smallBrother = SmallBrother::where('user_id',Auth::id())->first();  
        $outingRequests = OutingRequest::Where('small_brother_id',$smallBrother->id)->orderBy('created_at', 'desc')->with(['outing_type', 'big_brother', 'small_brother'])->paginate(9);

        return view('smallbrother.outingRequests', compact('outingRequests'));
    }
    public function DatingSession()
    {

        $datingSessions = DatingSession::Where('small_brother_id',$smallBrother->id)->with(['specialist', 'big_brother']);

        $users = User::get();

        $big_brothers = BigBrother::get();

        return view('smallbrother.datingSession', compact('datingSessions', 'users', 'big_brothers'));
    }
}
