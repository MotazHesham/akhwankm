<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApprovementFormRequest;
use App\Http\Requests\UpdateApprovementFormRequest;
use App\Http\Resources\Admin\ApprovementFormResource;
use App\Models\ApprovementForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovementFormApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('approvement_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApprovementFormResource(ApprovementForm::with(['specialist', 'big_brother'])->get());
    }

    public function store(StoreApprovementFormRequest $request)
    {
        $approvementForm = ApprovementForm::create($request->all());

        return (new ApprovementFormResource($approvementForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApprovementFormResource($approvementForm->load(['specialist', 'big_brother']));
    }

    public function update(UpdateApprovementFormRequest $request, ApprovementForm $approvementForm)
    {
        $approvementForm->update($request->all());

        return (new ApprovementFormResource($approvementForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ApprovementForm $approvementForm)
    {
        abort_if(Gate::denies('approvement_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvementForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
