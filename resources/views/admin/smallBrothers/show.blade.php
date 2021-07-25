@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smallBrother.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.small-brothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.id') }}
                        </th>
                        <td>
                            {{ $smallBrother->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.user') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.skills') }}
                        </th>
                        <td>
                            @foreach($smallBrother->skills as $key => $skills)
                                <span class="label label-info">{{ $skills->name_ar }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $smallBrother->big_brother->brotherhood_reason ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.charactaristics') }}
                        </th>
                        <td>
                            @foreach($smallBrother->charactaristics as $key => $charactaristics)
                                <span class="label label-info">{{ $charactaristics->name_ar }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.small-brothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection