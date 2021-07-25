@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.characteristic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.characteristics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.characteristic.fields.id') }}
                        </th>
                        <td>
                            {{ $characteristic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.characteristic.fields.name_ar') }}
                        </th>
                        <td>
                            {{ $characteristic->name_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.characteristic.fields.name_en') }}
                        </th>
                        <td>
                            {{ $characteristic->name_en }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.characteristics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection