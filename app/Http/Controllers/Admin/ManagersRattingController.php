<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManagersRattingRequest;
use App\Http\Requests\StoreManagersRattingRequest;
use App\Http\Requests\UpdateManagersRattingRequest;
use App\Models\ManagersRatting;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagersRattingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('managers_ratting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managersRattings = ManagersRatting::with(['brotherhood_specialist'])->get();

        return view('admin.managersRattings.index', compact('managersRattings'));
    }

    public function create()
    {
        abort_if(Gate::denies('managers_ratting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brotherhood_specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.managersRattings.create', compact('brotherhood_specialists'));
    }

    public function store(StoreManagersRattingRequest $request)
    {
        $managersRatting = ManagersRatting::create($request->all());

        return redirect()->route('admin.managers-rattings.index');
    }

    public function edit(ManagersRatting $managersRatting)
    {
        abort_if(Gate::denies('managers_ratting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brotherhood_specialists = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managersRatting->load('brotherhood_specialist');

        return view('admin.managersRattings.edit', compact('brotherhood_specialists', 'managersRatting'));
    }

    public function update(UpdateManagersRattingRequest $request, ManagersRatting $managersRatting)
    {
        $managersRatting->update($request->all());

        return redirect()->route('admin.managers-rattings.index');
    }

    public function show(ManagersRatting $managersRatting)
    {
        abort_if(Gate::denies('managers_ratting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managersRatting->load('brotherhood_specialist');

        return view('admin.managersRattings.show', compact('managersRatting'));
    }

    public function destroy(ManagersRatting $managersRatting)
    {
        abort_if(Gate::denies('managers_ratting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managersRatting->delete();

        return back();
    }

    public function massDestroy(MassDestroyManagersRattingRequest $request)
    {
        ManagersRatting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
