<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutingRequestRequest;
use App\Http\Requests\UpdateOutingRequestRequest;
use App\Http\Resources\Admin\OutingRequestResource;
use App\Models\OutingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutingRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outing_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutingRequestResource(OutingRequest::with(['outing_type', 'big_brother', 'small_brother'])->get());
    }

    public function store(StoreOutingRequestRequest $request)
    {
        $outingRequest = OutingRequest::create($request->all());

        return (new OutingRequestResource($outingRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OutingRequest $outingRequest)
    {
        abort_if(Gate::denies('outing_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutingRequestResource($outingRequest->load(['outing_type', 'big_brother', 'small_brother']));
    }

    public function update(UpdateOutingRequestRequest $request, OutingRequest $outingRequest)
    {
        $outingRequest->update($request->all());

        return (new OutingRequestResource($outingRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OutingRequest $outingRequest)
    {
        abort_if(Gate::denies('outing_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
