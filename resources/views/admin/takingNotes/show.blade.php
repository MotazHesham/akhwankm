@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.takingNote.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.taking-notes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.id') }}
                        </th>
                        <td>
                            {{ $takingNote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.day') }}
                        </th>
                        <td>
                            {{ App\Models\TakingNote::DAY_SELECT[$takingNote->day] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.specialist_name') }}
                        </th>
                        <td>
                            {{ $takingNote->specialist_name->user_type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.time') }}
                        </th>
                        <td>
                            {{ $takingNote->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.small_brother_name') }}
                        </th>
                        <td>
                            {{ $takingNote->small_brother_name->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.behavioral_change') }}
                        </th>
                        <td>
                            {{ $takingNote->behavioral_change }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.psychologists_opinions') }}
                        </th>
                        <td>
                            {{ $takingNote->psychologists_opinions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takingNote.fields.social_specialist_opinion') }}
                        </th>
                        <td>
                            {{ $takingNote->social_specialist_opinion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.taking-notes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
