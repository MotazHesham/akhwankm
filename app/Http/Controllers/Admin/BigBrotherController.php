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

        return view('admin.bigBrothers.create', compact('users', 'charactarstics', 'skills'));
    }

    public function store(StoreBigBrotherRequest $request)
    {
        $bigBrother = BigBrother::create($request->all());
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

        return redirect()->route('admin.big-brothers.index');
    }

    public function edit(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');

        $bigBrother->load('user', 'charactarstics', 'skills');

        return view('admin.bigBrothers.edit', compact('users', 'charactarstics', 'skills', 'bigBrother'));
    }

    public function update(UpdateBigBrotherRequest $request, BigBrother $bigBrother)
    {
        $bigBrother->update($request->all());
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

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
