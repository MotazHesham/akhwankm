<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;
Use Auth;

class EditMyInfoController extends Controller
{

    public function edit($user_id)
    {


        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $bigBrother=BigBrother::find($user_id);

        $user_id=BigBrother::where('user_id',Auth::id())->first()->id;


        return view('bigbrother.editMyInfo', compact('charactarstics', 'skills', 'bigBrother','user_id'));
    }

    public function update(UpdateRequest $request, BigBrother $bigBrother  )
    {
        $bigBrother->update([
            'job'=>$request->job,
            'job_place'=>$request->job_place,
            'salary'=>$request->salary,
            'family_male'=>$request->family_male,
            'family_female'=> $request->family_female,
            'marital_status'=>$request->marital_status,
            'brotherhood_reason'=>$request->brotherhood_reason,

        ]);

        $user = User::find($bigBrother->user_id);

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


        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('bigbrother.home');
    }

public function Smallbrotherinfo(BigBrother $bigBrother)
{
    $smallbrother = SmallBrother::Where('id',$bigBrother->small_brother_id)->with(['user', 'skills','charactaristics'])->get();


        return view('bigbrother.mysmallbrother', compact('smallbrother','bigBrother'));
}
}
