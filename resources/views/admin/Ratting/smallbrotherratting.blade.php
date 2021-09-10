@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.smallBrotherRating.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SmallBrotherRating">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.suitability_of_program_and_its_help_in_developing_your_skills') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.how_much_do_you_accept_the_big_brother_sister') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.big_brother_big_sister_reacts_to_my_needs') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.sticks_to_his_appointments') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.good_to_listen_to_my_discussions') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.would_you_like_to_continue_with_big_brother') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.ease_of_registering') }}
                        </th>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.extent_of_benefit_from_the_program') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($smallBrotherRatings as $key => $smallBrotherRating)
                        <tr data-entry-id="{{ $smallBrotherRating->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $smallBrotherRating->id ?? '' }}
                            </td>
                            <td>
                                {{ $smallBrotherRating->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::SUITABILITY_OF_PROGRAM_AND_ITS_HELP_IN_DEVELOPING_YOUR_SKILLS_RADIO[$smallBrotherRating->suitability_of_program_and_its_help_in_developing_your_skills] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::HOW_MUCH_DO_YOU_ACCEPT_THE_BIG_BROTHER_SISTER_RADIO[$smallBrotherRating->how_much_do_you_accept_the_big_brother_sister] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::BIG_BROTHER_BIG_SISTER_REACTS_TO_MY_NEEDS_RADIO[$smallBrotherRating->big_brother_big_sister_reacts_to_my_needs] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::STICKS_TO_HIS_APPOINTMENTS_RADIO[$smallBrotherRating->sticks_to_his_appointments] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::GOOD_TO_LISTEN_TO_MY_DISCUSSIONS_RADIO[$smallBrotherRating->good_to_listen_to_my_discussions] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::WOULD_YOU_LIKE_TO_CONTINUE_WITH_BIG_BROTHER_RADIO[$smallBrotherRating->would_you_like_to_continue_with_big_brother] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::EASE_OF_REGISTERING_RADIO[$smallBrotherRating->ease_of_registering] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SmallBrotherRating::EXTENT_OF_BENEFIT_FROM_THE_PROGRAM_RADIO[$smallBrotherRating->extent_of_benefit_from_the_program] ?? '' }}
                            </td>
                            <td>
                                @can('small_brother_rating_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.small-brother-ratings.show', $smallBrotherRating->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('small_brother_rating_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.small-brother-ratings.edit', $smallBrotherRating->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('small_brother_rating_delete')
                                    <form action="{{ route('admin.small-brother-ratings.destroy', $smallBrotherRating->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-SmallBrotherRating:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
