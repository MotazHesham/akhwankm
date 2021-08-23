@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smallBrother.title') }}
    </div>
    <div class="row"> 
        <div class="col-md-6">
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
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->identity_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.identity_date') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->identity_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.dbo') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->dbo }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.degree') }}
                        </th>
                        <td>
                            {{ App\Models\User::DEGREE_RADIO[$smallBrother->user->degree] ?? '' }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $smallBrother->user->phone ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.image') }}
                        </th>
                        <td>
                            @if($smallBrother->user && $smallBrother->user->image)
                                <a href="{{ asset($smallBrother->user->image->getUrl()) }}" target="_blank" style="display: inline-block">
                                    <img src="{{ asset($smallBrother->user->image->getUrl('thumb')) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.cv') }}
                        </th>
                        <td>
                            @if($smallBrother->user->cv)
                                <a href="{{ $smallBrother->user->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    @php
                        $name = 'name_' . app()->getLocale();
                    @endphp
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.skills') }}
                        </th>
                        <td>
                            @foreach($smallBrother->skills as $key => $skills)
                                <span class="badge badge-info">{{ $skills->$name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrother.fields.charactaristics') }}
                        </th>
                        <td>
                            @foreach($smallBrother->charactaristics as $key => $charactaristics)
                                <span class="badge badge-info">{{ $charactaristics->$name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    <div class="col-md-6">
    <div class="card-body">
        <h4 style="text-align: center;">
            {{ trans('cruds.smallBrother.fields.big_brother') }}
        </h4>
        @if(isset($bigBrother)&&count($bigBrother)>0)
            @foreach ($bigBrother as $bigBrother)

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.id') }}
                        </th>
                        <td >
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
                                <span class="badge badge-info">{{ $charactarstics->$name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrother.fields.skills') }}
                        </th>
                        <td>
                            @foreach($bigBrother->skills as $key => $skills)
                                <span class="badge badge-info">{{ $skills->$name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach

        @else
        <div class="alert alert-danger" role="alert">
            {{ trans('cruds.smallBrother.no_big_brother') }}
        </div>
        @endif
@endsection