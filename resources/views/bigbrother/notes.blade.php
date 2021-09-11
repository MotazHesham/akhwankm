@extends('layouts.bigbrother')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.takingNote.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="container mt-5 mb-3">

                    @foreach ($takingNotes as $key => $takingNote)

                    <div class="card border-danger    mb-3">
                        <div class="card-header ">
                            <div class="row justify-content-between">
                                <div class="col">{{$takingNote->created_at ?? '' }} </div>
                            </div>
                        </div>
                            <div class="card-body text-danger">
                                <h5 class="card-title"> {{ trans('global.day.'.$takingNote->day ?? '' )}}</h5>
                                <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">
                                        {{ trans('cruds.takingNote.fields.behavioral_change')  }}
                                        :</span>{{  $takingNote->behavioral_change ?? '' }} </p>
                                <p class="card-text" style="color: black"> <span
                                        style="color: rgb(219, 60, 60)">{{  trans('cruds.takingNote.fields.psychologists_opinions') }}
                                        : </span>{{  $takingNote->psychologists_opinions ?? '' }}</p>
                                <p class="card-text" style="color: black"> <span
                                        style="color: rgb(219, 60, 60)">{{ trans('cruds.takingNote.fields.social_specialist_opinion') }}
                                        : </span>{{$takingNote->social_specialist_opinion ?? '' }}</p>



                            </div>
                        </div>

                    @endforeach
                    <div class="row">
                        <div class="col">
                            {{ $takingNotes->links() }}
                        </div>
                    </div>
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
