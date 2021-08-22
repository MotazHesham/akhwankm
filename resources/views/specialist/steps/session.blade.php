

    <div class="card-body">
        <form method="POST" action="{{ route("specialist.session_store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.datingSession.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.datingSession.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="interview_notes">{{ trans('cruds.datingSession.fields.interview_notes') }}</label>
                <textarea class="form-control {{ $errors->has('interview_notes') ? 'is-invalid' : '' }}" name="interview_notes" id="interview_notes" required>{{ old('interview_notes') }}</textarea>
                @if($errors->has('interview_notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interview_notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.datingSession.fields.interview_notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="recommendations">{{ trans('cruds.datingSession.fields.recommendations') }}</label>
                <textarea class="form-control {{ $errors->has('recommendations') ? 'is-invalid' : '' }}" name="recommendations" id="recommendations" required>{{ old('recommendations') }}</textarea>
                @if($errors->has('recommendations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recommendations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.datingSession.fields.recommendations_helper') }}</span>
            </div>
            <input type="hidden" name="specialist_id" value="{{Auth::id()}}" id="">
            <input type="hidden" name="big_brother_id" value="{{$bigBrother ->id}}" id="">
        </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
