<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCharacteristicRequest;
use App\Http\Requests\StoreCharacteristicRequest;
use App\Http\Requests\UpdateCharacteristicRequest;
use App\Models\Characteristic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CharacteristicsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('characteristic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $characteristics = Characteristic::all();

        return view('admin.characteristics.index', compact('characteristics'));
    }

    public function create()
    {
        abort_if(Gate::denies('characteristic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.characteristics.create');
    }

    public function store(StoreCharacteristicRequest $request)
    {
        $characteristic = Characteristic::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('admin.characteristics.index');
    }

    public function edit(Characteristic $characteristic)
    {
        abort_if(Gate::denies('characteristic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.characteristics.edit', compact('characteristic'));
    }

    public function update(UpdateCharacteristicRequest $request, Characteristic $characteristic)
    {
        $characteristic->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.characteristics.index');
    }

    public function show(Characteristic $characteristic)
    {
        abort_if(Gate::denies('characteristic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.characteristics.show', compact('characteristic'));
    }

    public function destroy(Characteristic $characteristic)
    {
        abort_if(Gate::denies('characteristic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $characteristic->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyCharacteristicRequest $request)
    {
        Characteristic::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
