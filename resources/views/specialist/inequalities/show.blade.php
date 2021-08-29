@extends('layouts.specialist')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inequality.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('specialist.inequalities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inequality.fields.id') }}
                        </th>
                        <td>
                            {{ $inequality->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inequality.fields.specialist') }}
                        </th>
                        <td>
                            {{ $inequality->specialist->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inequality.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $inequality->big_brother->user->name ?? '' }}
                 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inequality.fields.small_brother') }}
                        </th>
                        <td>
                            {{ $inequality->small_brother->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inequality.fields.reasons') }}
                        </th>
                        <td>
                            {{ $inequality->reasons }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inequality.fields.date') }}
                        </th>
                        <td>
                            {{ $inequality->date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('specialist.inequalities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection