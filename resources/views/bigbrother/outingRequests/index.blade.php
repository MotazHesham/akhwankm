@extends('layouts.bigbrother')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('bigbrother.outing-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.outingRequest.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.outingRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <div class="container mt-5 mb-3">
                <div class="row">
            @foreach($outingRequests as $key => $outingRequest)

            <div class="col-md-4">
                <div class="card border-danger mb-3" style="max-width: 18rem;">
                <div class="card-header"> {{ $outingRequest->id ?? '' }}) {{ $outingRequest->outing_type->name_ar ?? '' }} </div>
                <div class="card-body text-danger">
                  <h5 class="card-title"> {{ $outingRequest->place ?? '' }}</h5>
                  <p class="card-text" style="color: black" > <span style="color: rgb(219, 60, 60)"> {{ trans('cruds.outingRequest.fields.start_date') }} :</span>{{ $outingRequest->start_date ?? '' }} </p>
                  <p class="card-text" style="color: black"> <span style="color: rgb(219, 60, 60)">{{ trans('cruds.outingRequest.fields.end_date') }} : </span>{{ $outingRequest->end_date ?? '' }}</p>

                  <a class="btn btn-xs btn-primary" href="{{ route('bigbrother.outing-requests.show', $outingRequest->id) }}">
                    {{ trans('global.view') }}
                </a>

                <a class="btn btn-xs btn-info" href="{{ route('bigbrother.outing-requests.edit', $outingRequest->id) }}">
                    {{ trans('global.edit') }}
                </a>
                <form action="{{ route('bigbrother.outing-requests.destroy', $outingRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                </form>
                </div>
            </div>
        </div>
                @endforeach
                @if($outingRequests->count())
                <div class="row">
                    <div class="col">
                        {{ $outingRequests->links() }}
                    </div>
                </div>
            @endif
            </div>
        </div>

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
    url: "{{ route('bigbrother.outing-requests.massDestroy') }}",
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
  let table = $('.datatable-OutingRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
