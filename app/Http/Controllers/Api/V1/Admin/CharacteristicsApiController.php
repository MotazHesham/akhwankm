<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacteristicRequest;
use App\Http\Requests\UpdateCharacteristicRequest;
use App\Http\Resources\Admin\CharacteristicResource;
use App\Models\Characteristic;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CharacteristicsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('characteristic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CharacteristicResource(Characteristic::all());
    }

    public function store(StoreCharacteristicRequest $request)
    {
        $characteristic = Characteristic::create($request->all());

        return (new CharacteristicResource($characteristic))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Characteristic $characteristic)
    {
        abort_if(Gate::denies('characteristic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CharacteristicResource($characteristic);
    }

    public function update(UpdateCharacteristicRequest $request, Characteristic $characteristic)
    {
        $characteristic->update($request->all());

        return (new CharacteristicResource($characteristic))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Characteristic $characteristic)
    {
        abort_if(Gate::denies('characteristic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $characteristic->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
