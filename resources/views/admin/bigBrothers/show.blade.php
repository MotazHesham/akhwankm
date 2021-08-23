@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.bigBrother.title') }}
        </div>
        <div class="row">
            <div class="col-md-6">
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
                                        <input id="bigbrother" value="{{ $bigBrother->id }}" type="hidden">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->email ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.identity_number') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->identity_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.identity_date') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->identity_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.dbo') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->dbo }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.degree') }}
                                    </th>
                                    <td>
                                        {{ App\Models\User::DEGREE_RADIO[$bigBrother->user->degree] ?? '' }}
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
                                        {{ trans('cruds.user.fields.country_id') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->city->country->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.city_id') }}
                                    </th>
                                    <td>
                                        {{ $bigBrother->user->city->name ?? '' }}
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
                                        {{ trans('cruds.user.fields.image') }}
                                    </th>
                                    <td>
                                        @if ($bigBrother->user && $bigBrother->user->image)
                                            <a href="{{ asset($bigBrother->user->image->getUrl()) }}" target="_blank"
                                                style="display: inline-block">
                                                <img src="{{ asset($bigBrother->user->image->getUrl('thumb')) }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.cv') }}
                                    </th>
                                    <td>
                                        @if ($bigBrother->user->cv)
                                            <a href="{{ $bigBrother->user->cv->getUrl() }}" target="_blank">
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
                                        {{ trans('cruds.bigBrother.fields.charactarstics') }}
                                    </th>
                                    <td>
                                        @foreach ($bigBrother->charactarstics as $key => $charactarstics)
                                            <span class="badge badge-info">{{ $charactarstics->$name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bigBrother.fields.skills') }}
                                    </th>
                                    <td>
                                        @foreach ($bigBrother->skills as $key => $skills)
                                            <span class="badge badge-info">{{ $skills->$name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding: 20px">
                @if ($bigBrother->small_brother_id != null)
                    <h4 style="text-align: center;padding:20px;"> {{ trans('cruds.bigBrother.small') }}</h4>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.smallBrother.fields.id') }}
                                </th>
                                <td>
                                    {{ $bigBrother->small_brother->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.name') }}
                                </th>
                                <td>
                                    {{ $bigBrother->small_brother->user->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <td>
                                    {{ $bigBrother->small_brother->user->email ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.user.fields.phone') }}
                                </th>
                                <td>
                                    {{ $bigBrother->small_brother->user->phone ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.smallBrother.fields.skills') }}
                                </th>
                                <td>
                                    @foreach ($bigBrother->small_brother->skills as $key => $skills)
                                        <span class="badge badge-info">{{ $skills->$name }}</span>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    {{ trans('cruds.smallBrother.fields.charactaristics') }}
                                </th>
                                <td>
                                    @foreach ($bigBrother->small_brother->charactaristics as $key => $charactaristics)
                                        <span class="badge badge-info">{{ $charactaristics->$name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning" role="alert" style="margin-top:100px;padding:50px;">
                        {{ trans('cruds.bigBrother.no_brother') }}
                    </div>
                    <div style="margin-top:60px;">
                        <h4 style="text-align: center;padding:20px;">{{ trans('cruds.bigBrother.choose') }}</h4>
                        @include('auth.partials.choose_small_brothers')
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function choosebrother(small_brother_id) {
            var big_id = document.getElementById("bigbrother").value;

            $.ajax({
                type: 'post',
                url: "{{ route('admin.choose.smallbrother') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'small_brother_id': small_brother_id,
                    'big_brother_id': big_id,

                },
                success: function(data) {
                    if (data.status == true) {
                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                    }
                }
            });
        }
    </script>
@endsection
