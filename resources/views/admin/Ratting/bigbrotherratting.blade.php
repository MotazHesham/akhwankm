@extends('layouts.admin')
@section('content')



<div class="card">
    <div class="card-header">
        {{ trans('cruds.bigBrotherRating.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BigBrotherRating">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.evaluation_procedures_provided_by_specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.the_quality_of_communication_with_specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.evaluation_of_required_interviews_with_specialist') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.number_of_interviews') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.satisfaction_with_the_acceptance_of_the_smaller_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.quality_of_offered_programs') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.evaluate_study_of_challenges_and_find_helpful_solutions') }}
                        </th>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.assessment_of_the_interaction_of_the_smaller_brother') }}
                        </th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($bigBrotherRatings as $key => $bigBrotherRating)
                        <tr data-entry-id="{{ $bigBrotherRating->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bigBrotherRating->id ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrotherRating->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::EVALUATION_PROCEDURES_PROVIDED_BY_SPECIALIST_RADIO[$bigBrotherRating->evaluation_procedures_provided_by_specialist] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::THE_QUALITY_OF_COMMUNICATION_WITH_SPECIALIST_RADIO[$bigBrotherRating->the_quality_of_communication_with_specialist] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::EVALUATION_OF_REQUIRED_INTERVIEWS_WITH_SPECIALIST_RADIO[$bigBrotherRating->evaluation_of_required_interviews_with_specialist] ?? '' }}
                            </td>
                            <td>
                                {{ $bigBrotherRating->number_of_interviews ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::SATISFACTION_WITH_THE_ACCEPTANCE_OF_THE_SMALLER_BROTHER_RADIO[$bigBrotherRating->satisfaction_with_the_acceptance_of_the_smaller_brother] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::QUALITY_OF_OFFERED_PROGRAMS_RADIO[$bigBrotherRating->quality_of_offered_programs] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::EVALUATE_STUDY_OF_CHALLENGES_AND_FIND_HELPFUL_SOLUTIONS_RADIO[$bigBrotherRating->evaluate_study_of_challenges_and_find_helpful_solutions] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BigBrotherRating::ASSESSMENT_OF_THE_INTERACTION_OF_THE_SMALLER_BROTHER_RADIO[$bigBrotherRating->assessment_of_the_interaction_of_the_smaller_brother] ?? '' }}
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

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('bigbrother.big-brother-ratings.massDestroy') }}",
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


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-BigBrotherRating:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
