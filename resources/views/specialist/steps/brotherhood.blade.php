
    <div style="margin-top:60px;">
        <form method="Post" action="{{ route('specialist.choose_smallbrother') }}">
            @csrf
            <h4 style="text-align: center;padding:20px;">{{ trans('cruds.bigBrother.choose') }}</h4>
            <input id="bigbrother" name="big_brother_id" value="{{ $bigBrother->id }}" type="hidden">

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
                                    <input type="radio" name="small_brother_id" id="small_brother_id" value="{{$smallBrother->id}}" style="width: 20px" > 
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
            

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>

    </div>
