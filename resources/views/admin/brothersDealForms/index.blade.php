@extends('layouts.admin')
@section('content')
@can('brothers_deal_form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.brothers-deal-forms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.brothersDealForm.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.brothersDealForm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BrothersDealForm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.id') }}
                        </th> 
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.big_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.small_brother') }}
                        </th>
                     
                        <th>
                            {{ trans('cruds.brothersDealForm.fields.specialist') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brothersDealForms as $key => $brothersDealForm)
                        <tr data-entry-id="{{ $brothersDealForm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $brothersDealForm->id ?? '' }}
                            </td> 
                            <td>
                                {{ $brothersDealForm->big_brother->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $brothersDealForm->small_brother->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $brothersDealForm->specialist->email ?? '' }}
                            </td>
                            <td>
                                @can('brothers_deal_form_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.brothers-deal-forms.show', $brothersDealForm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('brothers_deal_form_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.brothers-deal-forms.edit', $brothersDealForm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                <a class="btn btn-xs btn-success" href="{{ route('admin.brothers-deal-forms.print', $brothersDealForm->id) }}">
                                    {{ trans('global.print') }}
                                </a>

                                @can('brothers_deal_form_delete')
                                    <form action="{{ route('admin.brothers-deal-forms.destroy', $brothersDealForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('brothers_deal_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.brothers-deal-forms.massDestroy') }}",
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
  let table = $('.datatable-BrothersDealForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection