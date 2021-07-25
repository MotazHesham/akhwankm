@extends('layouts.admin')
@section('content')
@can('big_brother_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.big-brothers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bigBrother.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bigBrother.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BigBrother">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.id') }}
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
                            {{ trans('cruds.user.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.job_place') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.family_male') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.family_female') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.degree') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.brotherhood_reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.charactarstics') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrother.fields.skills') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bigBrothers as $key => $bigBrother)
                        <tr data-entry-id="{{ $bigBrother->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bigBrother->id ?? '' }}
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
                                {{ $bigBrother->user->address ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->job ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->job_place ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->salary ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->family_male ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->family_female ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->degree ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrother->brotherhood_reason ?? '' }}
                            </td>
                            <td>
                                @foreach($bigBrother->charactarstics as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($bigBrother->skills as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('big_brother_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.big-brothers.show', $bigBrother->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('big_brother_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.big-brothers.edit', $bigBrother->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('big_brother_delete')
                                    <form action="{{ route('admin.big-brothers.destroy', $bigBrother->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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