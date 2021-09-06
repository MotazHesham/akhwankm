@extends('layouts.bigbrother')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('bigbrother.challenges.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.challenge.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="container mt-5 mb-3">
            @php
            $name = 'name_' . app()->getLocale();
        @endphp
            @foreach($challenges as $key => $challenge)

                <div class="card border-danger    mb-3">
                    <div class="card-header ">
                        <div class="row justify-content-between">
                            <div class="col">{{$challenge->created_at ?? '' }} </div>
                        </div>
                    </div>
                        <div class="card-body text-danger">
                      
                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.challenge.fields.challenge')  }}
                                    <br> </span>
                              @foreach($challenge->challengs as $key => $item)
                              <span class="badge badge-secondary">{{ $item->$name  }}</span>
                              <span class="badge badge-info">{{ $challenge->other ?? '' }}</span>
                                @endforeach
                        </div>
                        <div class="col-md-6" style="margin:40px;">
                       
                    <a class="btn btn-xs btn-info" href="{{ route('bigbrother.challenges.edit', $challenge->id) }}">
                        {{ trans('global.edit') }}
                    </a>
                         </div>
                </div>
        </div>
    </div>
    @endforeach
    @endsection
