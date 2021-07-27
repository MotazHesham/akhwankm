@extends('layouts.admin')
@section('content')
@can('approvement_form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.approvement-forms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.approvementForm.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.approvementForm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ApprovementForm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.approved') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.brothers_deal_form') }}
                        </th>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvementForm.fields.descision') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvementForms as $key => $approvementForm)
                        <tr data-entry-id="{{ $approvementForm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $approvementForm->id ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->approved ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->specialist->email ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->brothers_deal_form->social_worker ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->brothers_deal_form->code ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->reason ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->description ?? '' }}
                            </td>
                            <td>
                                {{ $approvementForm->descision ?? '' }}
                            </td>
                            <td>
                                @can('approvement_form_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.approvement-forms.show', $approvementForm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('approvement_form_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.approvement-forms.edit', $approvementForm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('approvement_form_delete')
                                    <form action="{{ route('admin.approvement-forms.destroy', $approvementForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('approvement_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.approvement-forms.massDestroy') }}",
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
  let table = $('.datatable-ApprovementForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection