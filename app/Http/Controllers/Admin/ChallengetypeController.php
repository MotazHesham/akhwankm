<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChallengetypeRequest;
use App\Http\Requests\StoreChallengetypeRequest;
use App\Http\Requests\UpdateChallengetypeRequest;
use App\Models\Challengetype;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChallengetypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('challengetype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $challengetypes = Challengetype::all();

        return view('admin.challengetypes.index', compact('challengetypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('challengetype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.challengetypes.create');
    }

    public function store(StoreChallengetypeRequest $request)
    {
        $challengetype = Challengetype::create($request->all());

        return redirect()->route('admin.challengetypes.index');
    }

    public function edit(Challengetype $challengetype)
    {
        abort_if(Gate::denies('challengetype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.challengetypes.edit', compact('challengetype'));
    }

    public function update(UpdateChallengetypeRequest $request, Challengetype $challengetype)
    {
        $challengetype->update($request->all());

        return redirect()->route('admin.challengetypes.index');
    }

    public function show(Challengetype $challengetype)
    {
        abort_if(Gate::denies('challengetype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.challengetypes.show', compact('challengetype'));
    }

    public function destroy(Challengetype $challengetype)
    {
        abort_if(Gate::denies('challengetype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $challengetype->delete();

        return back();
    }

    public function massDestroy(MassDestroyChallengetypeRequest $request)
    {
        Challengetype::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
