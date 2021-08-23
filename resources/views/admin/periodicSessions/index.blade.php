@extends('layouts.admin')
@section('content')
@can('periodic_session_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.periodic-sessions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.periodicSession.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.periodicSession.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PeriodicSession">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.periodicSession.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.periodicSession.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.periodicSession.fields.bigbrother') }}
                        </th>
                        <th>
                            {{ trans('cruds.periodicSession.fields.smallbrother') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periodicSessions as $key => $periodicSession)
                        <tr data-entry-id="{{ $periodicSession->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $periodicSession->id ?? '' }}
                            </td>
                            <td>
                                {{ $periodicSession->date ?? '' }}
                            </td>
                            <td>
                                {{ $periodicSession->big_brother->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $periodicSession->small_brother->user->email ?? '' }}
                            </td>
                            <td> 

                                @can('periodic_session_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.periodic-sessions.edit', $periodicSession->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('periodic_session_delete')
                                    <form action="{{ route('admin.periodic-sessions.destroy', $periodicSession->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('periodic_session_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.periodic-sessions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-PeriodicSession:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
