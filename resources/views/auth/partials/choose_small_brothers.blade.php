<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable datatable-SmallBrother">
        <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.smallBrother.fields.id') }}
                </th>

                <th>
                    {{ trans('cruds.user.fields.name') }}
                </th>


                <th>
                    {{ trans('cruds.smallBrother.fields.skills') }}
                </th>

                <th>
                    {{ trans('cruds.smallBrother.fields.charactaristics') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.dbo') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($small_brothers as $key => $smallBrother)
                <tr data-entry-id="{{ $smallBrother->id }}">
                    <td>
                        <button type="button" class="btn btn-success" onclick="choosebrother({{ $smallBrother->id }})">
                            اختر
                        </button>
                    </td>
                    <td>
                        {{ $smallBrother->id ?? '' }}
                    </td>

                    <td>
                        {{ $smallBrother->user->name ?? '' }}
                    </td>

                    <td>
                        @foreach ($smallBrother->skills as $key => $item)
                            <span class="badge badge-info">{{ $item->name_ar }}</span>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($smallBrother->charactaristics as $key => $item)
                            <span class="badge badge-info">{{ $item->name_ar }}</span>
                        @endforeach
                    </td>

                    <td>
                        {{ $smallBrother->user->dbo ?? '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
