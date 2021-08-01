@extends('layouts.admin')
@section('content')
@can('small_brother_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.small-brothers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.smallBrother.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.smallBrother.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SmallBrother">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.smallBrother.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrother.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.identity_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrother.fields.skills') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrother.fields.big_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrother.fields.charactaristics') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($smallBrothers as $key => $smallBrother)
                        <tr data-entry-id="{{ $smallBrother->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $smallBrother->id ?? '' }}
                            </td>
                            <td>
                                {{ $smallBrother->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $smallBrother->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $smallBrother->user->identity_number ?? '' }}
                            </td>
                            <td>
                                {{ $smallBrother->user->phone ?? '' }}
                            </td>
                            <td>
                                @foreach($smallBrother->skills as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $smallBrother->big_brother->brotherhood_reason ?? '' }}
                            </td>
                            <td>
                                @foreach($smallBrother->charactaristics as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('small_brother_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.small-brothers.show', $smallBrother->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('small_brother_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.small-brothers.edit', $smallBrother->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                <a class="btn btn-xs btn-info" href="{{ route('admin.small-brothers.print', $smallBrother->id) }}">
                                    print
                                </a>
                                @can('small_brother_delete')
                                    <form action="{{ route('admin.small-brothers.destroy', $smallBrother->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('small_brother_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.small-brothers.massDestroy') }}",
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
  let table = $('.datatable-SmallBrother:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
