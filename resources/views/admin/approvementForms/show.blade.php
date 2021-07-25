@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.approvementForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approvement-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.id') }}
                        </th>
                        <td>
                            {{ $approvementForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.code') }}
                        </th>
                        <td>
                            {{ $approvementForm->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.approved') }}
                        </th>
                        <td>
                            {{ $approvementForm->approved }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.specialist') }}
                        </th>
                        <td>
                            {{ $approvementForm->specialist->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.brothers_deal_form') }}
                        </th>
                        <td>
                            {{ $approvementForm->brothers_deal_form->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.reason') }}
                        </th>
                        <td>
                            {{ $approvementForm->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.description') }}
                        </th>
                        <td>
                            {{ $approvementForm->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvementForm.fields.descision') }}
                        </th>
                        <td>
                            {{ $approvementForm->descision }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approvement-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection