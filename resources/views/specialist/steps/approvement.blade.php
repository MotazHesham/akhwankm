<div class="col-md-12">
    <div class="card-body">
        <form method="POST" action="{{ route('specialist.approvement-forms.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">


                <input type="hidden" class="form-control {{ $errors->has('big_brother') ? 'is-invalid' : '' }}"
                    name="big_brother_id" id="big_brother_id" value={{ $bigBrother->id }}>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.approvementForm.fields.approved') }}</label>
                        @foreach (App\Models\ApprovementForm::APPROVED_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="approved_{{ $key }}"
                                    name="approved" value="{{ $key }}"
                                    {{ old('approved', '0') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label"
                                    for="approved_{{ $key }}">{{ trans('global.approvment.' . $key) }}</label>
                            </div>
                        @endforeach
                        @if ($errors->has('approved'))
                            <div class="invalid-feedback">
                                {{ $errors->first('approved') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.approvementForm.fields.approved_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required"
                            for="reason">{{ trans('cruds.approvementForm.fields.reason') }}</label>
                        <textarea class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason"
                            id="reason" required>{{ old('reason') }}</textarea>
                        @if ($errors->has('reason'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reason') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.approvementForm.fields.reason_helper') }}</span>
                    </div>
                </div>
            </div>

            <input type="hidden" name="specialist_id" value="{{ Auth::id() }}" id="">

            <div class="form-group">
                <label class="required"
                    for="description">{{ trans('cruds.approvementForm.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description" id="description" required>{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="descision">{{ trans('cruds.approvementForm.fields.descision') }}</label>
                <textarea class="form-control {{ $errors->has('descision') ? 'is-invalid' : '' }}" name="descision"
                    id="descision" required>{{ old('descision') }}</textarea>
                @if ($errors->has('descision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvementForm.fields.descision_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
