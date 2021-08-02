@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.datingSession.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dating-sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.datingSession.fields.id') }}
                        </th>
                        <td>
                            {{ $datingSession->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datingSession.fields.date') }}
                        </th>
                        <td>
                            {{ $datingSession->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datingSession.fields.interview_notes') }}
                        </th>
                        <td>
                            {{ $datingSession->interview_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datingSession.fields.recommendations') }}
                        </th>
                        <td>
                            {{ $datingSession->recommendations }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datingSession.fields.specialist') }}
                        </th>
                        <td>
                            {{ $datingSession->specialist->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datingSession.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $datingSession->big_brother->brotherhood_reason ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dating-sessions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection