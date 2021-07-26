<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBigBrotherRequest;
use App\Http\Requests\StoreBigBrotherRequest;
use App\Http\Requests\UpdateBigBrotherRequest;
use App\Models\BigBrother;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $users = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $roles = Role::all()->pluck('title', 'id');


        return view('admin.bigBrothers.create', compact('users', 'charactarstics', 'skills','roles'));
    }

    public function store(StoreBigBrotherRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
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

        return redirect()->route('admin.big-brothers.index');
    }

    public function edit(BigBrother $bigBrother,User $user)
    {
        abort_if(Gate::denies('big_brother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $bigBrother->load('user', 'charactarstics', 'skills');

        
        $user=User::find($bigBrother->user_id);

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');


        return view('admin.bigBrothers.edit', compact('users', 'charactarstics', 'skills', 'bigBrother','roles','user'));
    }

    public function update(UpdateBigBrotherRequest $request, BigBrother $bigBrother)
    {
        $bigBrother->update($request->all());
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));


        $user=User::find($bigBrother->user_id);

        $user->update($request->all());

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

        return back();
    }

    public function massDestroy(MassDestroyBigBrotherRequest $request)
    {
        BigBrother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
