@extends('layouts.specialist')
@section('content')
     @php 
  $name='name_' . app()->getLocale();
   @endphp
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reporting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('specialist.reportings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.reportings.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.id') }}
                                </th>
                                <td>
                                    {{ $reporting->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.report_type') }}
                                </th>
                                <td>
                                    {{ $reporting->report_type->$name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.big_brother') }}
                                </th>
                                <td>
                                    {{ $reporting->big_brother->user->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.date') }}
                                </th>
                                <td>
                                    {{ $reporting->date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.number_of_repeat_offences') }}
                                </th>
                                <td>
                                    {{ $reporting->number_of_repeat_offences }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.violation_summary') }}
                                </th>
                                <td>
                                    {{ $reporting->violation_summary }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.violation_justifications') }}
                                </th>
                                <td>
                                    {{ $reporting->violation_justifications }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.specialist') }}
                                </th>
                                <td>
                                    {{ $reporting->specialist->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.reporting.fields.committees_decision') }}
                                </th>
                                <td>
                                    {{ $reporting->committees_decision }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
            <div class="form-group">
                <a class="btn btn-xs btn-info" href="{{ route('specialist.reportings.edit', $reporting->id) }}">
                    {{ trans('cruds.reporting.committees_decision_add') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection