<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSmallBrotherRequest;
use App\Http\Requests\UpdateSmallBrotherRequest;
use App\Http\Resources\Admin\SmallBrotherResource;
use App\Models\SmallBrother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SmallBrotherApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('small_brother_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SmallBrotherResource(SmallBrother::with(['user', 'skills', 'big_brother', 'charactaristics'])->get());
    }

    public function store(StoreSmallBrotherRequest $request)
    {
        $smallBrother = SmallBrother::create($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));

        return (new SmallBrotherResource($smallBrother))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SmallBrother $smallBrother)
    {
        abort_if(Gate::denies('small_brother_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SmallBrotherResource($smallBrother->load(['user', 'skills', 'big_brother', 'charactaristics']));
    }

    public function update(UpdateSmallBrotherRequest $request, SmallBrother $smallBrother)
    {
        $smallBrother->update($request->all());
        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));

        return (new SmallBrotherResource($smallBrother))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SmallBrother $smallBrother)
    {
        abort_if(Gate::denies('small_brother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smallBrother->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
