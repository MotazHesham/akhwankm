@extends('layouts.smallbrother')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('smallbrother.small-brother-ratings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.smallBrotherRating.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.smallBrotherRating.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="container mt-5 mb-3">

            @foreach ($smallBrotherRatings as $key => $smallBrotherRating)

                <div class="card border-warning    mb-3">
                    <div class="card-header ">
                        <div class="row justify-content-between">
                            <div class="col">{{ $smallrotherRating->created_at ?? '' }} </div>
                        </div>
                    </div>
                    <div class="card-body text-warning">
                        <h5 class="card-title"> مؤشرات التقييم</h5>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.suitability_of_program_and_its_help_in_developing_your_skills') }} :</span>
                            {{  trans('global.suitability_of_program_and_its_help_in_developing_your_skills.'.$smallBrotherRating->suitability_of_program_and_its_help_in_developing_your_skills ?? '' )}}
                        </p>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.how_much_do_you_accept_the_big_brother_sister') }}
                                :</span>
                                {{ trans('global.how_much_do_you_accept_the_big_brother_sister.'.$smallBrotherRating->how_much_do_you_accept_the_big_brother_sister ?? '' )}}
                        </p>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.big_brother_big_sister_reacts_to_my_needs') }}
                                :
                            </span>
                            {{ trans('global.big_brother_big_sister_reacts_to_my_needs.'.$smallBrotherRating->big_brother_big_sister_reacts_to_my_needs ?? '' )}}
                        </p>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.sticks_to_his_appointments') }}
                                : </span>
                                {{ trans('global.sticks_to_his_appointments.'.$smallBrotherRating->sticks_to_his_appointments ?? '' )}}

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.good_to_listen_to_my_discussions') }}
                                :
                            </span>
                            {{ trans('global.good_to_listen_to_my_discussions.'.$smallBrotherRating->good_to_listen_to_my_discussions ?? '' )}}
                        </p>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.would_you_like_to_continue_with_big_brother') }}
                                :
                            </span>
                            {{ trans('global.would_you_like_to_continue_with_big_brother.'.$smallBrotherRating->would_you_like_to_continue_with_big_brother ?? '' )}}
                        </p>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.ease_of_registering') }}
                                :
                            </span>
                            {{ trans('global.ease_of_registering.'.$smallBrotherRating->ease_of_registering ?? '') }}
                        </p>

                        <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                            {{ trans('cruds.smallBrotherRating.fields.extent_of_benefit_from_the_program') }}
                                :
                            </span>
                            {{ trans('global.extent_of_benefit_from_the_program.'.$smallBrotherRating->extent_of_benefit_from_the_program ?? '') }}
                        </p>

                        <br>
                        <a class="btn btn-xs btn-primary" href="{{ route('smallbrother.small-brother-ratings.show', $smallBrotherRating->id) }}">
                            {{ trans('global.view') }}
                        </a>

                        <a class="btn btn-xs btn-info" href="{{ route('smallbrother.small-brother-ratings.edit', $smallBrotherRating->id) }}">
                            {{ trans('global.edit') }}
                        </a>

                        <form action="{{ route('smallbrother.small-brother-ratings.destroy', $smallBrotherRating->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                        </form>






                    </div>
                </div>

            @endforeach
            {{-- <div class="row">
                <div class="col">
                    {{ $bigBrotherRatings->links() }}
                </div>
            </div> --}}
        </div>
    </div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('small_brother_rating_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('smallbrother.small-brother-ratings.massDestroy') }}",
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
  let table = $('.datatable-SmallBrotherRating:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
