@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.followUp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.follow-ups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.id') }}
                        </th>
                        <td>
                            {{ $followUp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $followUp->big_brother->job ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.small_brother') }}
                        </th>
                        <td>
                            {{ $followUp->small_brother->temp ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.specialist') }}
                        </th>
                        <td>
                            {{ $followUp->specialist->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.deal') }}
                        </th>
                        <td>
                            {{ App\Models\FollowUp::DEAL_RADIO[$followUp->deal] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.academic_level') }}
                        </th>
                        <td>
                            {{ App\Models\FollowUp::ACADEMIC_LEVEL_RADIO[$followUp->academic_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.notes') }}
                        </th>
                        <td>
                            {{ $followUp->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.followUp.fields.date') }}
                        </th>
                        <td>
                            {{ $followUp->date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.follow-ups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection