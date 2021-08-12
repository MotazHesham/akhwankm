
    @extends('layouts.smallbrother')
    @section('styles') 
    <link rel="stylesheet" href={{asset("css/cards.css")}}> 
    
    @endsection

    @section('content')

    <div class="container mt-5 mb-3">
        <div class="row">
            @foreach($outingRequests as $key => $outingRequest)
    
            <div class="col-md-4">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                      
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">{{ $outingRequest->outing_type->name_ar ?? '' }}</h6> <span>{{ $outingRequest->start_date  ?? '' }}</span>
                            </div>
                        </div>
                        <div class="badge"> <span>{{ $outingRequest->status ?? '' }}</span> </div>
                    </div>
                    <div class="mt-5">
                        <h3 class="heading">{{ $outingRequest->place ?? '' }}</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                 
                            <div class="mt-3"> <span class="text1"> {{ trans('cruds.outingRequest.fields.end_date') }} : <span class="text2">{{ $outingRequest->start_date  ?? '' }}</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
      @endforeach      
@endsection

