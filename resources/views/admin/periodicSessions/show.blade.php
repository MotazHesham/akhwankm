@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.periodicSession.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.periodic-sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.periodicSession.fields.id') }}
                        </th>
                        <td>
                            {{ $periodicSession->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodicSession.fields.date') }}
                        </th>
                        <td>
                            {{ $periodicSession->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodicSession.fields.bigbrother') }}
                        </th>
                        <td>
                            {{ $periodicSession->bigbrother->brotherhood_reason ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.periodicSession.fields.smallbrother') }}
                        </th>
                        <td>
                            {{ $periodicSession->smallbrother->temp ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.periodic-sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection