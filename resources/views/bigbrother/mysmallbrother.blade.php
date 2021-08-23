@extends('layouts.bigbrother')

@section('styles')
    <link rel="stylesheet" href={{ asset('css/profile-style.css') }}>

@endsection

@section('content')
    @if (!$smallbrother)
        <div class="alert alert-warning">
            <h2>
                لم يتم المأخاة بعد
            </h2>
        </div>
    @else
        <div class="container">
            <div class="main-body">

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if ($smallbrother->user->image)
                                        <img src="{{ asset($smallbrother->user->image->getUrl()) }}" class="rounded-circle"
                                            width="250" height="200" alt="" style="border-radius: 50px;margin:10px">
                                    @else
                                        <img src="{{ asset('user.png') }}" class="rounded-circle" width="250" height="200"
                                            alt="" style="border-radius: 50px;margin:10px">
                                    @endif
                                    <div class="mt-3">
                                        <h4> {{ $smallbrother->user->name ?? '' }}</h4>
                                        <p class="text-dark mb-1"> {{ $smallbrother->user->identity_number ?? '' }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">
                                            {{ trans('cruds.user.user_type.small_brother') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-dark">
                                        {{ $smallbrother->user->name ?? '' }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> {{ trans('cruds.user.fields.email') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-dark">
                                        {{ $smallbrother->user->email ?? '' }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> {{ trans('cruds.user.fields.phone') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-dark">
                                        {{ $smallbrother->user->phone ?? '' }}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ trans('cruds.user.fields.dbo') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-dark">
                                        {{ $smallbrother->user->dbo ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $name = 'name_' . app()->getLocale();
                        @endphp

                        <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">
                                                {{ trans('cruds.smallBrother.fields.skills') }}</i></h6>
                                        @foreach ($smallbrother->skills as $key => $item)

                                            <span class="badge badge-info"> {{ $item->$name }} </span>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2">{{ trans('cruds.smallBrother.fields.charactaristics') }}</i>
                                        </h6>
                                        @foreach ($smallbrother->charactaristics as $key => $item)

                                            <span class="badge badge-info"> {{ $item->$name }} </span>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection
