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
                    {{ trans('cruds.user.fields.phone') }}
                </th>
                <th>
                    {{ trans('cruds.smallBrother.fields.skills') }}
                </th>

                <th>
                    {{ trans('cruds.smallBrother.fields.charactaristics') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($small_brothers as $key => $smallBrother)
                <tr data-entry-id="{{ $smallBrother->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $smallBrother->id ?? '' }}
                    </td>

                    <td>
                        {{ $smallBrother->user->name ?? '' }}
                    </td>

                    <td>
                        {{ $smallBrother->user->phone ?? '' }}
                    </td>
                    <td>
                        @foreach($smallBrother->skills as $key => $item)
                            <span class="badge badge-info">{{ $item->name_ar }}</span>
                        @endforeach
                    </td>

                    <td>
                        @foreach($smallBrother->charactaristics as $key => $item)
                            <span class="badge badge-info">{{ $item->name_ar }}</span>
                        @endforeach
                    </td>
                    <td>
                        <input type="radio" name="small_brother_id" id="" value="{{$smallBrother->id}}" style="width: 20px">
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
