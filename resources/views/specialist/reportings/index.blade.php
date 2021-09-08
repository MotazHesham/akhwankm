@extends('layouts.specialist')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.reporting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Reporting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.report_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.reportType.fields.name_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.big_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.day') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.time') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.number_of_repeat_offences') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.violation_summary') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.violation_justifications') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.reporting.fields.committees_decision') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportings as $key => $reporting)
                        <tr data-entry-id="{{ $reporting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reporting->id ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->report_type->name_ar ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->report_type->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->big_brother->job ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->date ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->day ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->time ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->number_of_repeat_offences ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->violation_summary ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->violation_justifications ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->specialist->name ?? '' }}
                            </td>
                            <td>
                                {{ $reporting->committees_decision ?? '' }}
                            </td>
                            <td>
                     
                                    <a class="btn btn-xs btn-primary" href="{{ route('specialist.reportings.show', $reporting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                               
                                <a class="btn btn-xs btn-info" href="{{ route('specialist.reportings.edit', $reporting->id) }}">
                                    {{ trans('cruds.reporting.committees_decision_add') }}
                                </a>


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
@can('reporting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reportings.massDestroy') }}",
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
  let table = $('.datatable-Reporting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection