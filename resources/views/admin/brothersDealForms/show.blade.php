@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.brothersDealForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.brothers-deal-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.id') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.day') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.department_of_social_service') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->department_of_social_service }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.executive_committee') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->executive_committee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.executive_director') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->executive_director }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->big_brother->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.small_brother') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->small_brother->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.approvment_form') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->approvment_form->id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.specialist') }}
                        </th>
                        <td>
                            {{ $brothersDealForm->specialist->email ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.brothers-deal-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection