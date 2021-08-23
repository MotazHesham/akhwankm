@extends('layouts.specialist')
@section('styles')
    <link rel="stylesheet" href={{ asset('css/cards.css') }}>

@endsection

@section('content')

    <div class="container mt-5 mb-3">
        <div class="row">
            @foreach ($outingRequests as $key => $outingRequest)

                <div class="col-md-4">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">

                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">{{ $outingRequest->outing_type->name_ar ?? 'أخري' }}</h6>
                                    <span>{{ $outingRequest->start_date ?? '' }}</span> <br>
                                    <span>{{ $outingRequest->big_brother->user->email ?? '' }}</span>
                                </div>
                            </div>
                            <div class="badge"> 
                                <span>{{ $outingRequest->status ? trans('global.outing_status.' . $outingRequest->status) : 'أخري' }}</span>
                                <br>
                                @if($outingRequest->status == 'pending')
                                    <a href="{{ route('specialist.outing-requests.change_status',['id' => $outingRequest->id , 'status' => 'accept' ]) }}" class="btn btn-outline-success">موافقة</a>
                                    <a href="{{ route('specialist.outing-requests.change_status',['id' => $outingRequest->id , 'status' => 'refuse' ]) }}" class="btn btn-outline-danger">رفض</a>
                                @elseif($outingRequest->status == 'accept')
                                    <a href="{{ route('specialist.outing-requests.change_status',['id' => $outingRequest->id , 'status' => 'outing' ]) }}" class="btn btn-outline-info">بدء</a>
                                    <a href="{{ route('specialist.outing-requests.change_status',['id' => $outingRequest->id , 'status' => 'cancel' ]) }}" class="btn btn-outline-danger">الغاء</a>
                                @elseif($outingRequest->status == 'outing')
                                    <a href="{{ route('specialist.outing-requests.change_status',['id' => $outingRequest->id , 'status' => 'done' ]) }}" class="btn btn-outline-warning">أنهاء</a>
                                @endif
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">{{ $outingRequest->place ?? '' }}</h3>
                            <div class="mt-5">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="mt-3"> <span class="text1"> {{ trans('cruds.outingRequest.fields.end_date') }}
                                        : <span class="text2">{{ $outingRequest->start_date ?? '' }}</span></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $outingRequests->links() }}
            </div>
        </div>
    </div>
@endsection
