@extends('layouts.admin')
@section('content')
@can('inequality_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.inequalities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.inequality.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.inequality.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Inequality">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.inequality.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.inequality.fields.specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.inequality.fields.big_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.inequality.fields.small_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.inequality.fields.reasons') }}
                        </th>
                        <th>
                            {{ trans('cruds.inequality.fields.date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inequalities as $key => $inequality)
                        <tr data-entry-id="{{ $inequality->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $inequality->id ?? '' }}
                            </td>
                            <td>
                                {{ $inequality->specialist->name ?? '' }}
                            </td>
                            <td>
                                {{ $inequality->big_brother->brotherhood_reason ?? '' }}
                            </td>
                            <td>
                                {{ $inequality->small_brother->temp ?? '' }}
                            </td>
                            <td>
                                {{ $inequality->reasons ?? '' }}
                            </td>
                            <td>
                                {{ $inequality->date ?? '' }}
                            </td>
                            <td>
                                @can('inequality_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.inequalities.show', $inequality->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('inequality_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.inequalities.edit', $inequality->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('inequality_delete')
                                    <form action="{{ route('admin.inequalities.destroy', $inequality->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('inequality_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.inequalities.massDestroy') }}",
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
  let table = $('.datatable-Inequality:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection