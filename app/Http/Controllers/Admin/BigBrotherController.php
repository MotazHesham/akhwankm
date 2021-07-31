<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBigBrotherRequest;
use App\Http\Requests\StoreBigBrotherRequest;
use App\Http\Requests\UpdateBigBrotherRequest;
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

class BigBrotherController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('big_brother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigBrothers = BigBrother::with(['user', 'charactarstics', 'skills'])->get();

        return view('admin.bigBrothers.index', compact('bigBrothers'));
    }

    public function create()
    {
        abort_if(Gate::denies('big_brother_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        return view('admin.bigBrothers.create', compact( 'charactarstics', 'skills'));
    }

    public function store(StoreBigBrotherRequest $request)
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

    public function edit(BigBrother $bigBrother,User $user)
    {
        abort_if(Gate::denies('big_brother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $bigBrother->load('user', 'charactarstics', 'skills');


        return view('admin.bigBrothers.edit', compact('charactarstics', 'skills', 'bigBrother'));
    }

    public function update(UpdateBigBrotherRequest $request, BigBrother $bigBrother)
    {


        $bigBrother=BigBrother::create ([
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

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.big-brothers.index');
    }

    public function show(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigBrother->load('user', 'charactarstics', 'skills');

        return view('admin.bigBrothers.show', compact('bigBrother'));
    }

    public function destroy(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigBrother->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyBigBrotherRequest $request)
    {
        BigBrother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function showBrothers (){

        $smallBrothers = SmallBrother::with(['user', 'skills', 'big_brother', 'charactaristics'])->get();

        return view('admin.bigBrothers.right', compact('smallBrothers'));
    }
    

    public function printinfo(BigBrother $bigBrother)
    {
        $userinfo=User::findOrFail($bigBrother->user_id);

        return view('forms.bigBrother_registration', compact('userinfo','bigBrother'));
    }
    
}
