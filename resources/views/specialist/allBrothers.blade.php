    @extends('layouts.specialist')

    @section('styles') 

        <link rel="stylesheet" href={{asset("css/brotherCards.css")}}> 
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    @endsection

    @section('content')
    
    
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                @foreach ($bigBrothers as $bigBrother)
                    
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"> 
                                @if($bigBrother->user->image)
                                    <img src="{{asset($bigBrother->user->image->getUrl('preview'))}}" class="rounded-circle img-thumbnail">
                                @else
                                    <img src="{{asset('user.png')}}" class="rounded-circle img-thumbnail">
                                @endif  
                            </div>
                            <div class="">
                                <h4>   {{ $bigBrother->user->name ?? '' }}</h4>
                                <p class="text-muted">   {{ $bigBrother->job ?? '' }} <span>| </span><span><a href="#" class="text-pink"> {{ $bigBrother->user->email ?? '' }}</a></span></p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item"> {{ $bigBrother->user->phone ?? '' }}</i></a></li>
                                <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"> <i class="fa fa-phone"></i></a></li>
                            </ul>
                            <a  class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light" href={{route('specialist.brother_details', $bigBrother->id)}}>{{ trans('global.showmore') }}</a>
                    
                        </div>
                    </div>
                </div>
                <!-- end col -->
                @endforeach
            </div>
            <div>
                {{$bigBrothers->links()}}
            </div>
        </div>

    @endsection