@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.smallBrother.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.small-brothers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.smallBrother.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrother.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skills">{{ trans('cruds.smallBrother.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple required>
                    @foreach($skills as $id => $skills)
                        <option value="{{ $id }}" {{ in_array($id, old('skills', [])) ? 'selected' : '' }}>{{ $skills }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrother.fields.skills_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="big_brother_id">{{ trans('cruds.smallBrother.fields.big_brother') }}</label>
                <select class="form-control select2 {{ $errors->has('big_brother') ? 'is-invalid' : '' }}" name="big_brother_id" id="big_brother_id">
                    @foreach($big_brothers as $id => $entry)
                        <option value="{{ $id }}" {{ old('big_brother_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('big_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('big_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrother.fields.big_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="charactaristics">{{ trans('cruds.smallBrother.fields.charactaristics') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('charactaristics') ? 'is-invalid' : '' }}" name="charactaristics[]" id="charactaristics" multiple required>
                    @foreach($charactaristics as $id => $charactaristics)
                        <option value="{{ $id }}" {{ in_array($id, old('charactaristics', [])) ? 'selected' : '' }}>{{ $charactaristics }}</option>
                    @endforeach
                </select>
                @if($errors->has('charactaristics'))
                    <div class="invalid-feedback">
                        {{ $errors->first('charactaristics') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrother.fields.charactaristics_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection