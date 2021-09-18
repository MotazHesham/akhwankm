<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInequalityRequest;
use App\Http\Requests\StoreInequalityRequest;
use App\Http\Requests\UpdateInequalityRequest;
use App\Models\BigBrother;
use App\Models\Inequality;
use App\Models\SmallBrother;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InequalityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inequality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inequalities = Inequality::with(['specialist', 'big_brother', 'small_brother'])->get();

        return view('admin.inequalities.index', compact('inequalities'));
    }

    public function create()
    {
        abort_if(Gate::denies('inequality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::where('user_type','specialist')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inequalities.create', compact('specialists', 'big_brothers', 'small_brothers'));
    }

    public function store(StoreInequalityRequest $request)
    {
        $inequality = Inequality::create($request->all());

        return redirect()->route('admin.inequalities.index');
    }

    public function edit(Inequality $inequality)
    {
        abort_if(Gate::denies('inequality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = User::where('user_type','specialist')->get()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inequality->load('specialist', 'big_brother', 'small_brother');

        return view('admin.inequalities.edit', compact('specialists', 'big_brothers', 'small_brothers', 'inequality'));
    }

    public function update(UpdateInequalityRequest $request, Inequality $inequality)
    {
        $inequality->update($request->all());

        return redirect()->route('admin.inequalities.index');
    }

    public function show(Inequality $inequality)
    {
        abort_if(Gate::denies('inequality_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inequality->load('specialist', 'big_brother', 'small_brother');

        return view('admin.inequalities.show', compact('inequality'));
    }

    public function destroy(Inequality $inequality)
    {
        abort_if(Gate::denies('inequality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inequality->delete();

        return back();
    }

    public function massDestroy(MassDestroyInequalityRequest $request)
    {
        Inequality::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
