@extends('layouts.specialist')
@section('content')

<div class="card">
    <div class="card-header">
    {{ trans('global.list') }}    {{ trans('cruds.followUp.title_singular') }} 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Challenge">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.challenge.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.challenge.fields.challenge') }}
                        </th>
                        <th>
                            {{ trans('cruds.challenge.fields.small_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.challenge.fields.evalute') }}
                        </th>
                        <th>
                             &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($challenges as $key => $challenge)
                        <tr data-entry-id="{{ $challenge->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $challenge->id ?? '' }}
                            </td>
                            <td>
                                @php
                              $name = 'name_' . app()->getLocale();      
                                @endphp
                                @foreach($challenge->challengs as $key => $item)
                                    <span class="badge badge-info">{{ $item->$name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $challenge->small_brother->user->name ?? '' }}
                            </td>
                            <td>
                                @php
                             $follow_up=App\Models\FollowUp::where('small_brother_id', $challenge->small_brother_id)->first();    
                                @endphp
                                @if($follow_up)
                             
                           {{ $follow_up->notes}}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('specialist.follow-ups.edit', $follow_up->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            </td>
                            @else
                                    <a class="btn btn-xs btn-primary" href="{{ route('specialist.follow-ups.create', $challenge->small_brother_id) }}">
                                        {{ trans('global.evalute') }}
                                    </a>
                        
                         @endif
                         

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

