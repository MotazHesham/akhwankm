@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bigBrother.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.big-brothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.id') }}
                        </th>
                        <td>
                            {{ $bigBrother->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.user') }}
                        </th>
                        <td>
                            {{ $bigBrother->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.job') }}
                        </th>
                        <td>
                            {{ $bigBrother->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.job_place') }}
                        </th>
                        <td>
                            {{ $bigBrother->job_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.salary') }}
                        </th>
                        <td>
                            {{ $bigBrother->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.family_male') }}
                        </th>
                        <td>
                            {{ $bigBrother->family_male }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.family_female') }}
                        </th>
                        <td>
                            {{ $bigBrother->family_female }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.degree') }}
                        </th>
                        <td>
                            {{ $bigBrother->degree }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.brotherhood_reason') }}
                        </th>
                        <td>
                            {{ $bigBrother->brotherhood_reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.charactarstics') }}
                        </th>
                        <td>
                            @foreach($bigBrother->charactarstics as $key => $charactarstics)
                                <span class="label label-info">{{ $charactarstics->name_ar }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.skills') }}
                        </th>
                        <td>
                            @foreach($bigBrother->skills as $key => $skills)
                                <span class="label label-info">{{ $skills->name_ar }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.big-brothers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection