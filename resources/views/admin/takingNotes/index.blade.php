@extends('layouts.admin')
@section('content')
@can('taking_note_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.taking-notes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.takingNote.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.takingNote.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TakingNote">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.takingNote.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.takingNote.fields.day') }}
                        </th>
                        <th>
                            {{ trans('cruds.takingNote.fields.specialist_name') }}
                        </th>



                        <th>
                            {{ trans('cruds.takingNote.fields.small_brother_name') }}
                        </th>
                        
                        <th>
                            {{ trans('cruds.takingNote.fields.behavioral_change') }}
                        </th>
                        <th>
                            {{ trans('cruds.takingNote.fields.psychologists_opinions') }}
                        </th>
                        <th>
                            {{ trans('cruds.takingNote.fields.social_specialist_opinion') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($takingNotes as $key => $takingNote)
                        <tr data-entry-id="{{ $takingNote->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $takingNote->id ?? '' }}
                            </td>
                            <td>
                                {{ trans('global.day.' . $takingNote->day) }}
                            </td>
                            <td>
                                {{ $takingNote->specialist_name->name ?? '' }}
                            </td>


                            <td>
                                {{ $takingNote->small_brother_name->user->name ?? '' }}
                            </td>


                            <td>
                                {{ $takingNote->behavioral_change ?? '' }}
                            </td>
                            <td>
                                {{ $takingNote->psychologists_opinions ?? '' }}
                            </td>
                            <td>
                                {{ $takingNote->social_specialist_opinion ?? '' }}
                            </td>
                            <td>
                                @can('taking_note_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.taking-notes.show', $takingNote->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('taking_note_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.taking-notes.edit', $takingNote->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('taking_note_delete')
                                    <form action="{{ route('admin.taking-notes.destroy', $takingNote->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('taking_note_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.taking-notes.massDestroy') }}",
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
  let table = $('.datatable-TakingNote:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
