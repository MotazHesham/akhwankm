@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.dashboard') }}
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $settings1['column_class'] }}">
                            <div class="card text-white bg-info" style="position: relative">
                                <div style="position: absolute;@if(app()->getLocale() == 'ar') left:0 @else right:0 @endif">
                                    <i style="font-size: 91px;color:#082a482e" class="fa-fw fas fa-male c-sidebar-nav-icon"></i>
                                </div>
                                <div class="card-body pb-0"> 
                                    <div class="text-value-lg">{{ $settings1['chart_title'] }}</div>
                                    <div style="font-size: 20px">{{ number_format($settings1['total_number']) }}</div>
                                    <br />
                                </div>
                            </div>
                        </div> 
                        <div class="{{ $settings2['column_class'] }}">
                            <div class="card text-white bg-warning" style="position: relative">
                                <div style="position: absolute;@if(app()->getLocale() == 'ar') left:0 @else right:0 @endif">
                                    <i style="font-size: 91px;color:#082a482e" class="fa-fw fas fa-child c-sidebar-nav-icon"></i>
                                </div>
                                <div class="card-body pb-0"> 
                                    <div class="text-value-lg">{{ $settings2['chart_title'] }}</div>
                                    <div style="font-size: 20px">{{ number_format($settings2['total_number']) }}</div>
                                    <br />
                                </div>
                            </div>
                        </div> 
                        <div class="{{ $settings3['column_class'] }}">
                            <div class="card text-white bg-danger" style="position: relative">
                                <div style="position: absolute;@if(app()->getLocale() == 'ar') left:0 @else right:0 @endif">
                                    <i style="font-size: 91px;color:#082a482e" class="fa-fw fas fa-handshake c-sidebar-nav-icon"></i>
                                </div>
                                <div class="card-body pb-0"> 
                                    <div class="text-value-lg">{{ $settings3['chart_title'] }}</div>
                                    <div style="font-size: 20px">{{ number_format($settings3['total_number']) }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>  
                        <div class="{{ $chart4->options['column_class'] }}" style="padding:15px">
                            <h3>{!! $chart4->options['chart_title'] !!}</h3>
                            {!! $chart4->renderHtml() !!}
                        </div> 

                        <div id="big_brother_create" class="{{ $chart7->options['column_class'] }}" style="background-color: white;padding:15px 0 0 15px;border-radius:8px">
                            <div class="d-flex justify-content-between">
                                <div style="padding: 10px">
                                    <h4 class="card-title mb-0">{!! $chart7->options['chart_title'] !!}</h4>
                                    <div class="small text-muted">{{date("F", mktime(0, 0, 0, $month_bar, 10))}} - {{$year_bar}}</div>
                                </div>
                                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                                    <form action="" method="GET" id="form-line">
                                        <label class="btn btn-outline-secondary">
                                            <select class="form-control" name="month_bar" id="month_bar">
                                                <option value="1" @if($month_bar == "1") selected @endif>{{trans('global.months.january')}}</option>
                                                <option value="2" @if($month_bar == "2") selected @endif>{{trans('global.months.february')}}</option>
                                                <option value="3" @if($month_bar == "3") selected @endif>{{trans('global.months.march')}}</option>
                                                <option value="4" @if($month_bar == "4") selected @endif>{{trans('global.months.april')}}</option>
                                                <option value="5" @if($month_bar == "5") selected @endif>{{trans('global.months.may')}}</option>
                                                <option value="6" @if($month_bar == "6") selected @endif>{{trans('global.months.june')}}</option>
                                                <option value="7" @if($month_bar == "7") selected @endif>{{trans('global.months.july')}}</option>
                                                <option value="8" @if($month_bar == "8") selected @endif>{{trans('global.months.august')}}</option>
                                                <option value="9" @if($month_bar == "9") selected @endif>{{trans('global.months.september')}}</option>
                                                <option value="10" @if($month_bar == "10") selected @endif>{{trans('global.months.october')}}</option>
                                                <option value="11" @if($month_bar == "11") selected @endif>{{trans('global.months.november')}}</option>
                                                <option value="12" @if($month_bar == "12") selected @endif>{{trans('global.months.december')}}</option>
                                            </select>
                                        </label>
                                        <label class="btn btn-outline-secondary">
                                            <input type="submit" class="btn btn-info" value="fetch">
                                        </label>
                                        <label class="btn btn-outline-secondary">
                                            <select class="form-control" name="year_bar" id="year_bar">
                                                @for($i = 2021 ; $i <= 2051 ; $i++)
                                                <option value="{{$i}}" @if($year_bar == "{{$i}}") selected @endif>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            {!! $chart7->renderHtml() !!}
                        </div> 

                        {{-- Widget - latest entries --}}
                        <div class="{{ $settings5['column_class'] }}" style="overflow-x: auto;">
                            <h3>{{ $settings5['chart_title'] }}</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @foreach($settings5['fields'] as $key => $value)
                                            <th>
                                                {{ trans(sprintf('cruds.%s.fields.%s', $settings5['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($settings5['data'] as $entry)
                                        <tr>
                                            @foreach($settings5['fields'] as $key => $value)
                                                <td>
                                                    @if($value === '')
                                                        {{ $entry->{$key} }}
                                                    @elseif(is_iterable($entry->{$key}))
                                                        @foreach($entry->{$key} as $subEentry)
                                                            <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                        @endforeach
                                                    @else
                                                        {{ data_get($entry, $key . '.' . $value) }}
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="{{ count($settings5['fields']) }}">{{ __('No entries found') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Widget - latest entries --}}
                        <div class="{{ $settings6['column_class'] }}" style="overflow-x: auto;">
                            <h3>{{ $settings6['chart_title'] }}</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @foreach($settings6['fields'] as $key => $value)
                                            <th>
                                                {{ trans(sprintf('cruds.%s.fields.%s', $settings6['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($settings6['data'] as $entry)
                                        <tr>
                                            @foreach($settings6['fields'] as $key => $value)
                                                <td>
                                                    @if($value === '')
                                                        {{ $entry->{$key} }}
                                                    @elseif(is_iterable($entry->{$key}))
                                                        @foreach($entry->{$key} as $subEentry)
                                                            <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                        @endforeach
                                                    @else
                                                        {{ data_get($entry, $key . '.' . $value) }}
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="{{ count($settings6['fields']) }}">{{ __('No entries found') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart4->renderJs() !!} {!! $chart7->renderJs() !!}
<script> 
    @if(request()->has('month_line'))
        $('html, body').animate({
            scrollTop: $("#big_brother_create").offset().top
        }, 1000);
    @endif 
</script>
@endsection