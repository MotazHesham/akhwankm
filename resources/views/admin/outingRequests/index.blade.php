@extends('layouts.admin')
@section('content')
@can('outing_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.outing-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.outingRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.outingRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OutingRequest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.outing_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingType.fields.name_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.late') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.outing_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.done_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.big_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.brotherhood_reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.outingRequest.fields.small_brother') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outingRequests as $key => $outingRequest)
                        <tr data-entry-id="{{ $outingRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $outingRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->outing_type->name_ar ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->outing_type->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->place ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->reason ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\OutingRequest::LATE_RADIO[$outingRequest->late] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\OutingRequest::STATUS_SELECT[$outingRequest->status] ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->outing_date ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->done_time ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->big_brother->brotherhood_reason ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->big_brother->brotherhood_reason ?? '' }}
                            </td>
                            <td>
                                {{ $outingRequest->small_brother->temp ?? '' }}
                            </td>
                            <td>
                                @can('outing_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.outing-requests.show', $outingRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('outing_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.outing-requests.edit', $outingRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('outing_request_delete')
                                    <form action="{{ route('admin.outing-requests.destroy', $outingRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('outing_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.outing-requests.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-OutingRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection