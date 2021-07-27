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
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $users = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $big_brothers = BigBrother::all()->pluck('brotherhood_reason', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');

        return view('admin.smallBrothers.create', compact('users', 'skills', 'big_brothers', 'charactaristics'));
    }

    public function store(StoreSmallBrotherRequest $request)
    {
        $smallBrother = SmallBrother::create($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));

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

        return view('admin.smallBrothers.edit', compact('users', 'skills', 'big_brothers', 'charactaristics', 'smallBrother'));
    }

    public function update(UpdateSmallBrotherRequest $request, SmallBrother $smallBrother)
    {
        $smallBrother->update($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));

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

        return back();
    }

    public function massDestroy(MassDestroySmallBrotherRequest $request)
    {
        SmallBrother::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
