@extends('layouts.smallbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.smallBrother.fields.brothers') }} 
    </div>

    <div class="card-body">
        
<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable datatable-SmallBrother">
        <thead>
            <tr>
                <th width="10">

                    {{ trans('cruds.user.user_type.big_brother') }}
                </th>
                <th width="10">

                    {{ trans('cruds.user.fields.email') }}
                </th>

                <th>
                    {{ trans('cruds.smallBrother.fields.skills') }}
                </th>
                <th>
                    {{ trans('cruds.smallBrother.fields.charactaristics') }}
                </th>

                <th>
                    {{ trans('cruds.smallBrother.fields.created_at_b') }}
                </th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($bigBrother as $key => $bigBrother)
                <tr data-entry-id="{{ $bigBrother->id }}">
                    <td>
                        {{ $bigBrother->user->name ?? '' }}
                    </td>
                    <td>
                        {{ $bigBrother->user->email ?? '' }}
                    </td>
                    <td>
                        @foreach($bigBrother->skills as $key => $item)
                            <span class="badge badge-info">{{ $item->name_ar }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($bigBrother->charactarstics as $key => $item)
                            <span class="badge badge-info">{{ $item->name_ar }}</span>
                        @endforeach
                    </td>
                    <td>
                        {{ $bigBrother->created_at->format('m/d/Y') ?? '' }}
                    </td>
            

                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection