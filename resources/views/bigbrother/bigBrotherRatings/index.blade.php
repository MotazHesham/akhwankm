@extends('layouts.bigbrother')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('bigbrother.big-brother-ratings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bigBrotherRating.title_singular') }}
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.bigBrotherRating.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="container mt-5 mb-3">

                @foreach ($bigBrotherRatings as $key => $bigBrotherRating)

                    <div class="card border-warning    mb-3">
                        <div class="card-header ">
                            <div class="row justify-content-between">
                                <div class="col">{{ $bigBrotherRating->created_at ?? '' }} </div>
                            </div>
                        </div>
                        <div class="card-body text-warning">
                            <h5 class="card-title"> مؤشرات التقييم</h5>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.evaluation_procedures_provided_by_specialist') }}
                                    :</span>
                                {{ trans('global.evaluation_procedures_provided_by_specialist.'.$bigBrotherRating->evaluation_procedures_provided_by_specialist ?? '') }}
                            </p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.the_quality_of_communication_with_specialist') }}
                                    :
                                </span>{{ trans('global.the_quality_of_communication_with_specialist.'.$bigBrotherRating->the_quality_of_communication_with_specialist ?? '' )}}
                            </p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.evaluation_of_required_interviews_with_specialist') }}
                                    :
                                </span>{{ trans('global.evaluation_of_required_interviews_with_specialist.'.$bigBrotherRating->evaluation_of_required_interviews_with_specialist ?? '' )}}
                            </p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.number_of_interviews') }}
                                    : </span>{{ $bigBrotherRating->number_of_interviews ?? '' }}</p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.satisfaction_with_the_acceptance_of_the_smaller_brother') }}
                                    :
                                </span>{{ trans('global.satisfaction_with_the_acceptance_of_the_smaller_brother.'.$bigBrotherRating->satisfaction_with_the_acceptance_of_the_smaller_brother ?? '') }}
                            </p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.quality_of_offered_programs') }}
                                    :
                                </span>{{ trans('global.quality_of_offered_programs.'.$bigBrotherRating->quality_of_offered_programs ?? '' )}}
                            </p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.evaluate_study_of_challenges_and_find_helpful_solutions') }}
                                    :
                                </span>{{ trans('global.evaluate_study_of_challenges_and_find_helpful_solutions.'.$bigBrotherRating->evaluate_study_of_challenges_and_find_helpful_solutions ?? '') }}
                            </p>

                            <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                    {{ trans('cruds.bigBrotherRating.fields.assessment_of_the_interaction_of_the_smaller_brother') }}
                                    :
                                </span>{{ trans('global.assessment_of_the_interaction_of_the_smaller_brother.'.$bigBrotherRating->assessment_of_the_interaction_of_the_smaller_brother ?? '' )}}
                            </p>

                            <br>
                            <a class="btn btn-xs btn-primary"
                                href="{{ route('bigbrother.big-brother-ratings.show', $bigBrotherRating->id) }}">
                                {{ trans('global.view') }}
                            </a>



                            <a class="btn btn-xs btn-info"
                                href="{{ route('bigbrother.big-brother-ratings.edit', $bigBrotherRating->id) }}">
                                {{ trans('global.edit') }}
                            </a>



                            <form action="{{ route('bigbrother.big-brother-ratings.destroy', $bigBrotherRating->id) }}"
                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
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
            $(function() {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('bigbrother.outing-requests.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)


                $.extend(true, $.fn.dataTable.defaults, {
                    orderCellsTop: true,
                    order: [
                        [1, 'desc']
                    ],
                    pageLength: 100,
                });
                let table = $('.datatable-OutingRequest:not(.ajaxTable)').DataTable({
                    buttons: dtButtons
                })
                $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });

            })
        </script>
    @endsection
