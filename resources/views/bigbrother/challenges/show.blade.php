@extends('layouts.bigbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.challenge.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('bigbrother.challenges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.challenge.fields.id') }}
                        </th>
                        <td>
                            {{ $challenge->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.challenge.fields.challeng') }}
                        </th>
                        <td>
                            @foreach($challenge->challengs as $key => $challeng)
                                <span class="label label-info">{{ $challeng->name_en }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.challenge.fields.small_brother') }}
                        </th>
                        <td>
                            {{ $challenge->small_brother->temp ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('bigbrother.challenges.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection