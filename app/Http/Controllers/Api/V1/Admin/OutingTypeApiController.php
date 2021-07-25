<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutingTypeRequest;
use App\Http\Requests\UpdateOutingTypeRequest;
use App\Http\Resources\Admin\OutingTypeResource;
use App\Models\OutingType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutingTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outing_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutingTypeResource(OutingType::all());
    }

    public function store(StoreOutingTypeRequest $request)
    {
        $outingType = OutingType::create($request->all());

        return (new OutingTypeResource($outingType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OutingType $outingType)
    {
        abort_if(Gate::denies('outing_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutingTypeResource($outingType);
    }

    public function update(UpdateOutingTypeRequest $request, OutingType $outingType)
    {
        $outingType->update($request->all());

        return (new OutingTypeResource($outingType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OutingType $outingType)
    {
        abort_if(Gate::denies('outing_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
