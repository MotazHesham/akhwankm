@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
       نتيجة التقرير
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BigBrother">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th> 
                        <th>
                            {{ trans('cruds.user.fields.identity_number') }}
                        </th>
                        <th>
                        {{ trans('cruds.user.fields.identity_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.dbo') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.marital_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.salary') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bigBrothers as $key => $bigBrother)
                        <tr data-entry-id="{{ $bigBrother->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bigBrother->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->user->phone ?? '' }}
                            </td> 
                            <td>
                                {{ $bigBrother->user->identity_number }}
                            </td>
                            <td>
                                {{ $bigBrother->user->identity_date }}
                            </td>
                            <td>
                                {{ $bigBrother->user->dbo }}
                            </td>

                            <td>
                                {{ trans('global.marital_status.'. $bigBrother->user->marital_status ?? '')  }}
                            </td>
                            <td>
                                {{ $bigBrother->salary }}
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
@can('big_brother_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.big-brothers.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-BigBrother:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
