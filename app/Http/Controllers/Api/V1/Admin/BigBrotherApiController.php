<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBigBrotherRequest;
use App\Http\Requests\UpdateBigBrotherRequest;
use App\Http\Resources\Admin\BigBrotherResource;
use App\Models\BigBrother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BigBrotherApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('big_brother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BigBrotherResource(BigBrother::with(['user', 'charactarstics', 'skills'])->get());
    }

    public function store(StoreBigBrotherRequest $request)
    {
        $bigBrother = BigBrother::create($request->all());
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

        return (new BigBrotherResource($bigBrother))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BigBrotherResource($bigBrother->load(['user', 'charactarstics', 'skills']));
    }

    public function update(UpdateBigBrotherRequest $request, BigBrother $bigBrother)
    {
        $bigBrother->update($request->all());
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

        return (new BigBrotherResource($bigBrother))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BigBrother $bigBrother)
    {
        abort_if(Gate::denies('big_brother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bigBrother->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
