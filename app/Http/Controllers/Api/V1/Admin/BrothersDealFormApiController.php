<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Http\Requests\UpdateBrothersDealFormRequest;
use App\Http\Resources\Admin\BrothersDealFormResource;
use App\Models\BrothersDealForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrothersDealFormApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brothers_deal_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrothersDealFormResource(BrothersDealForm::with(['big_brother', 'small_brother'])->get());
    }

    public function store(StoreBrothersDealFormRequest $request)
    {
        $brothersDealForm = BrothersDealForm::create($request->all());

        return (new BrothersDealFormResource($brothersDealForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrothersDealFormResource($brothersDealForm->load(['big_brother', 'small_brother']));
    }

    public function update(UpdateBrothersDealFormRequest $request, BrothersDealForm $brothersDealForm)
    {
        $brothersDealForm->update($request->all());

        return (new BrothersDealFormResource($brothersDealForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BrothersDealForm $brothersDealForm)
    {
        abort_if(Gate::denies('brothers_deal_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brothersDealForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
