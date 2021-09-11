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
                                {{ trans('global.suitability_of_program_and_its_help_in_developing_your_skills.'.$smallBrotherRating->suitability_of_program_and_its_help_in_developing_your_skills ?? '') }}
                            </td>
                            <td>
                                {{ trans('global.how_much_do_you_accept_the_big_brother_sister.'.$smallBrotherRating->how_much_do_you_accept_the_big_brother_sister ?? '' ) }}
                            </td>
                            <td>
                                {{ trans('global.big_brother_big_sister_reacts_to_my_needs.'.$smallBrotherRating->big_brother_big_sister_reacts_to_my_needs ?? '' ) }}
                            </td>
                            <td>
                                {{ trans('global.sticks_to_his_appointments.'.$smallBrotherRating->sticks_to_his_appointments ?? '') }}
                            </td>
                            <td>
                                {{ trans('global.good_to_listen_to_my_discussions.'.$smallBrotherRating->good_to_listen_to_my_discussions ?? '' )}}
                            </td>
                            <td>
                                {{ trans('global.would_you_like_to_continue_with_big_brother.'.$smallBrotherRating->would_you_like_to_continue_with_big_brother ?? '' )}}
                            </td>
                            <td>
                                {{ trans('global.ease_of_registering.'.$smallBrotherRating->ease_of_registering ?? '' ) }}
                            </td>
                            <td>
                                {{ trans('global.extent_of_benefit_from_the_program.'.$smallBrotherRating->extent_of_benefit_from_the_program ?? '' ) }}
                            </td>
                            <td>


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
