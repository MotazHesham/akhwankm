<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutingRequestRequest;
use App\Http\Requests\StoreOutingRequestRequest;
use App\Http\Requests\UpdateOutingRequestRequest;
use App\Models\BigBrother;
use App\Models\OutingRequest;
use App\Models\OutingType;
use App\Models\SmallBrother;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutingRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outing_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingRequests = OutingRequest::with(['outing_type', 'big_brother', 'small_brother'])->get();

        return view('admin.outingRequests.index', compact('outingRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('outing_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outing_types = OutingType::all()->pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');  

        return view('admin.outingRequests.create', compact('outing_types', 'big_brothers', 'small_brothers'));
    }

    public function store(StoreOutingRequestRequest $request)
    {
        $outingRequest = OutingRequest::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('admin.outing-requests.index');
    }

    public function edit(OutingRequest $outingRequest)
    {
        abort_if(Gate::denies('outing_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outing_types = OutingType::all()->pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        $outingRequest->load('outing_type', 'big_brother', 'small_brother');

        return view('admin.outingRequests.edit', compact('outing_types', 'big_brothers', 'small_brothers', 'outingRequest'));
    }

    public function update(UpdateOutingRequestRequest $request, OutingRequest $outingRequest)
    {
        $outingRequest->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.outing-requests.index');
    }

    public function show(OutingRequest $outingRequest)
    {
        abort_if(Gate::denies('outing_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingRequest->load('outing_type', 'big_brother', 'small_brother');

        return view('admin.outingRequests.show', compact('outingRequest'));
    }

    public function destroy(OutingRequest $outingRequest)
    {
        abort_if(Gate::denies('outing_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outingRequest->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyOutingRequestRequest $request)
    {
        OutingRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
