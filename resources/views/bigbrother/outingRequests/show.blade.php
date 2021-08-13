@extends('layouts.bigbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.outingRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('bigbrother.outing-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $outingRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.outing_type') }}
                        </th>
                        <td>
                            {{ $outingRequest->outing_type->name_ar ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.start_date') }}
                        </th>
                        <td>
                            {{ $outingRequest->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.end_date') }}
                        </th>
                        <td>
                            {{ $outingRequest->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.place') }}
                        </th>
                        <td>
                            {{ $outingRequest->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.reason') }}
                        </th>
                        <td>
                            {{ $outingRequest->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.late') }}
                        </th>
                        <td>
                            {{ App\Models\OutingRequest::LATE_RADIO[$outingRequest->late] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\OutingRequest::STATUS_SELECT[$outingRequest->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.outing_date') }}
                        </th>
                        <td>
                            {{ $outingRequest->outing_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.done_time') }}
                        </th>
                        <td>
                            {{ $outingRequest->done_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $outingRequest->big_brother->brotherhood_reason ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outingRequest.fields.small_brother') }}
                        </th>
                        <td>
                            {{ $outingRequest->small_brother->temp ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('bigbrother.outing-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
