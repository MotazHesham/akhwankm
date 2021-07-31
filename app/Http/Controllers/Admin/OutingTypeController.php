<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutingTypeRequest;
use App\Http\Requests\StoreOutingTypeRequest;
use App\Http\Requests\UpdateOutingTypeRequest;
use App\Models\OutingType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;

class OutingTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outing_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingTypes = OutingType::all();

        return view('admin.outingTypes.index', compact('outingTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('outing_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outingTypes.create');
    }

    public function store(StoreOutingTypeRequest $request)
    {
        $outingType = OutingType::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('admin.outing-types.index');
    }

    public function edit(OutingType $outingType)
    {
        abort_if(Gate::denies('outing_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outingTypes.edit', compact('outingType'));
    }

    public function update(UpdateOutingTypeRequest $request, OutingType $outingType)
    {
        $outingType->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.outing-types.index');
    }

    public function show(OutingType $outingType)
    {
        abort_if(Gate::denies('outing_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outingTypes.show', compact('outingType'));
    }

    public function destroy(OutingType $outingType)
    {
        abort_if(Gate::denies('outing_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingType->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyOutingTypeRequest $request)
    {
        OutingType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
