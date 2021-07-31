<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySmallBrotherRequest;
use App\Http\Requests\StoreSmallBrotherRequest;
use App\Http\Requests\UpdateSmallBrotherRequest;
use App\Models\BigBrother;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\SmallBrother;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Alert;

class SmallBrotherController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('small_brother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden'); 
        $smallBrothers = SmallBrother::with(['user', 'skills', 'big_brother', 'charactaristics'])->get();

        return view('admin.smallBrothers.index', compact('smallBrothers'));
    }

    public function create()
    {
        abort_if(Gate::denies('small_brother_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $big_brothers = BigBrother::all()->pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');


        return view('admin.smallBrothers.create', compact('skills', 'big_brothers', 'charactaristics'));
    }

    public function store(StoreSmallBrotherRequest $request)
    { 
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'small_brother',
            'identity_number' => $request->identity_number,
            'identity_date' => $request->identity_date,
            'dbo' => $request->dbo,  
            'phone' => $request->phone,
            'gender' => $request->gender,
            'degree' => $request->degree,
        ]);

        if ($request->input('cv', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }


        
        $smallBrother = SmallBrother::create([

            'user_id'=> $user->id,

        ]);

        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        return redirect()->route('admin.small-brothers.index');

    }

    public function edit(SmallBrother $smallBrother)
    {
        abort_if(Gate::denies('small_brother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $big_brothers = BigBrother::all()->pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');

        $smallBrother->load('user', 'skills', 'big_brother', 'charactaristics');
        
        $user=User::find($smallBrother->user_id);

        $roles = Role::all()->pluck('title', 'id');
        $user->load('roles');

        return view('admin.smallBrothers.edit', compact('users', 'skills', 'big_brothers', 'charactaristics', 'smallBrother','user','roles'));
    }

    public function update(UpdateSmallBrotherRequest $request, SmallBrother $smallBrother,User $user)
    {
        $smallBrother->update($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));
        

        $user=User::find($smallBrother->user_id);

        $user->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));   

        return redirect()->route('admin.small-brothers.index');
    }

    public function show(SmallBrother $smallBrother)
    {
        abort_if(Gate::denies('small_brother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smallBrother->load('user', 'skills', 'big_brother', 'charactaristics');

        return view('admin.smallBrothers.show', compact('smallBrother'));
    }

    public function destroy(SmallBrother $smallBrother)
    {
        abort_if(Gate::denies('small_brother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smallBrother->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroySmallBrotherRequest $request)
    {
        SmallBrother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
