@extends('layouts.smallbrother')
@section('content')
@can('dating_session_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dating-sessions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.datingSession.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.datingSession.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DatingSession">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.datingSession.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.datingSession.fields.date') }}
                        </th>
                     
                        <th>
                            {{ trans('cruds.datingSession.fields.specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.datingSession.fields.big_brother') }}
                        </th>
                </tr> 
                </thead>
                <tbody>
                    @foreach($datingSessions as $key => $datingSession)
                        <tr data-entry-id="{{ $datingSession->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $datingSession->id ?? '' }}
                            </td>
                            <td>
                                {{ $datingSession->date ?? '' }}
                            </td>
                          
                            <td>
                                {{ $datingSession->specialist->email ?? '' }}
                            </td>
                            <td>
                                {{ $datingSession->big_brother->user->name ?? '' }}
                            </td>
            

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

