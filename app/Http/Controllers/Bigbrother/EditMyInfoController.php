<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;
Use Auth;

class EditMyInfoController extends Controller
{

    public function edit()
    {
        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $bigBrother = BigBrother::where('user_id',Auth::id())->first(); 
        $country_id = Auth::user()->city->country->id ?? '';
        $countries = Country::get()->pluck('name', 'id');
        $cities = City::where('country_id',$country_id)->get()->pluck('name', 'id');

        return view('bigbrother.editMyInfo', compact('charactarstics', 'skills', 'bigBrother','countries','cities','country_id'));
    }

    public function update(UpdateRequest $request)
    {
        $bigBrother = BigBrother::where('user_id',Auth::id())->first(); 
        $user = Auth::user();

        $bigBrother->update([
            'job'=>$request->job,
            'job_place'=>$request->job_place,
            'salary'=>$request->salary,
            'family_male'=>$request->family_male,
            'family_female'=> $request->family_female,
            'marital_status'=>$request->marital_status,
            'brotherhood_reason'=>$request->brotherhood_reason,

        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password == null ? $user->password : bcrypt($request->password),
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

        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

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

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('bigbrother.home');
    }

    public function Smallbrotherinfo()
    {
        $bigBrother = BigBrother::where('user_id',Auth::id())->first(); 
        $smallbrother = SmallBrother::find($bigBrother->small_brother_id);
        if($smallbrother){ 
            $smallbrother->load(['user', 'skills','charactaristics']); 
        }
        return view('bigbrother.mysmallbrother', compact('smallbrother','bigBrother'));
    }
}
