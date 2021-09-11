@extends('layouts.admin')
@section('content')
@can('managers_ratting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.managers-rattings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.managersRatting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.managersRatting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ManagersRatting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.member_of_the_board_of_directors') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.executive_director') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.brotherhood_specialist') }}
                        </th>

                        <th>
                            {{ trans('cruds.managersRatting.fields.evaluation_of_fraternity_procedures') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.evaluation_of_interviews_with_the_specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.number_of_interviews') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.the_convenience_of_choosing_a_bigbrother') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.the_quality_of_the_training_program') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.evaluate_the_study_of_challenges_and_find_solutions_to_help') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.desire_to_continue_the_relationship_between_brothers') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.interaction_of_the_small_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.how_well_the_brotherhood_work_team_dealt_and_interacted') }}
                        </th>
                        <th>
                            {{ trans('cruds.managersRatting.fields.general_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($managersRattings as $key => $managersRatting)
                        <tr data-entry-id="{{ $managersRatting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $managersRatting->id ?? '' }}
                            </td>
                            <td>
                                {{ $managersRatting->member_of_the_board_of_directors ?? '' }}
                            </td>
                            <td>
                                {{ $managersRatting->executive_director ?? '' }}
                            </td>
                            <td>
                                {{ $managersRatting->brotherhood_specialist->name ?? '' }}
                            </td>

                            <td>
                                {{ trans('global.evaluation_of_fraternity_procedures.'.$managersRatting->evaluation_of_fraternity_procedures ?? '' )}}
                            </td>
                            <td>
                                {{ trans('global.evaluation_of_interviews_with_the_specialist.'.$managersRatting->evaluation_of_interviews_with_the_specialist ?? '' )}}
                            </td>
                            <td>
                                {{ $managersRatting->number_of_interviews ?? '' }}
                            </td>
                            <td>
                                {{ trans('global.the_convenience_of_choosing_a_bigbrother.'.$managersRatting->the_convenience_of_choosing_a_bigbrother ?? '') }}
                            </td>
                            <td>
                                {{ trans('global.the_quality_of_the_training_program.'.$managersRatting->the_quality_of_the_training_program ?? '') }}
                            </td>
                            <td>
                                {{ trans('global.evaluate_the_study_of_challenges_and_find_solutions_to_help.'.$managersRatting->evaluate_the_study_of_challenges_and_find_solutions_to_help ?? '' )}}
                            </td>
                            <td>
                                {{ trans('global.desire_to_continue_the_relationship_between_brothers.'.$managersRatting->desire_to_continue_the_relationship_between_brothers ?? '') }}
                            </td>
                            <td>
                                {{ trans('global.interaction_of_the_small_brother.'.$managersRatting->interaction_of_the_small_brother ?? '' )}}
                            </td>
                            <td>
                                {{ trans('global.how_well_the_brotherhood_work_team_dealt_and_interacted.'.$managersRatting->how_well_the_brotherhood_work_team_dealt_and_interacted ?? '' )}}
                            </td>
                            <td>
                                {{ $managersRatting->general_notes ?? '' }}
                            </td>
                            <td>
                                @can('managers_ratting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.managers-rattings.show', $managersRatting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('managers_ratting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.managers-rattings.edit', $managersRatting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('managers_ratting_delete')
                                    <form action="{{ route('admin.managers-rattings.destroy', $managersRatting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('managers_ratting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.managers-rattings.massDestroy') }}",
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
  let table = $('.datatable-ManagersRatting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
