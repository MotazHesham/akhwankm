@extends('layouts.smallbrother')
@section('content')

@can('outing_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.outing-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.outingRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.outingRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OutingRequest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.outing_type') }}
                        </th> 
                        <th>
                            {{ trans('cruds.outingRequest.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.place') }}
                        </th> 
                        <th>
                            {{ trans('cruds.outingRequest.fields.status') }}
                        </th> 
                        <th>
                            {{ trans('cruds.outingRequest.fields.big_brother') }}
                        </th> 
            
                    </tr>
                </thead>
                <tbody>
                    @foreach($outingRequests as $key => $outingRequest)
                        <tr data-entry-id="{{ $outingRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $outingRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->outing_type->name_ar ?? '' }}
                            </td> 
                            <td>
                                {{ $outingRequest->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->place ?? '' }}
                            </td> 
                            <td>
                                {{ $outingRequest->status ?? '' }}
                            </td> 
                            <td>
                                {{ $outingRequest->big_brother->user->name ?? '' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

