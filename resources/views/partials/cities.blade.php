

@foreach($cities as $id => $name)
    <option value="{{ $id }}"  {{ old('city_id','') == $id ? 'selected' : '' }}>{{ $name }}</option>
@endforeach