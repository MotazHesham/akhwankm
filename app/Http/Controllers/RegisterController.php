<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\SmallBrother;
Use Alert;


class RegisterController extends Controller
{

    public function register(){
        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        return view('auth.big_brother_register', compact( 'charactarstics', 'skills'));

    }

    public function choose_small_brothers(Request $request){ 
        global $skills;
        $skills = $request->skills;
        $small_brothers = SmallBrother::whereHas('skills',function($query){
            $query->whereIn('id',$GLOBALS['skills']);
        })->get()->take(5);
        return view('auth.partials.choose_small_brothers', compact('small_brothers')); 
    }

    public function big_brother(StoreBigBrotherRequest $request)
    {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'big_brother',
            'identity_number' => $request->identity_number,
            'identity_date' => $request->identity_date,
            'dbo' => $request->dbo,
            'marital_status' => $request->marital_status,
            'country' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'degree' => $request->degree,
        ]);

        if ($request->input('cv', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }
        $bigBrother=BigBrother::create ([
            'job'=>$request->job,
            'job_place'=>$request->job_place,
            'salary'=>$request->salary,
            'family_male'=>$request->family_male,
            'family_female'=> $request->family_female,
            'marital_status'=>$request->marital_status,
            'brotherhood_reason'=>$request->brotherhood_reason,
            'user_id'=>$user->id,

        ]);
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        return redirect()->route('admin.big-brothers.right_brothers');
    }
}
