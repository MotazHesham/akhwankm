@extends('layouts.bigbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bigBrotherRating.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("bigbrother.big-brother-ratings.update", [$bigBrotherRating->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf


            <input type="hidden" name="name" value={{$big_brother->name}}>
            <input type="hidden" name="big_brother_id" value={{$big_brothers->id}}>


            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.evaluation_procedures_provided_by_specialist') }}</label>
                @foreach(App\Models\BigBrotherRating::EVALUATION_PROCEDURES_PROVIDED_BY_SPECIALIST_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('evaluation_procedures_provided_by_specialist') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="evaluation_procedures_provided_by_specialist_{{ $key }}" name="evaluation_procedures_provided_by_specialist" value="{{ $key }}" {{ old('evaluation_procedures_provided_by_specialist', $bigBrotherRating->evaluation_procedures_provided_by_specialist) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="evaluation_procedures_provided_by_specialist_{{ $key }}">{{ trans('global.evaluation_procedures_provided_by_specialist.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('evaluation_procedures_provided_by_specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluation_procedures_provided_by_specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.evaluation_procedures_provided_by_specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.the_quality_of_communication_with_specialist') }}</label>
                @foreach(App\Models\BigBrotherRating::THE_QUALITY_OF_COMMUNICATION_WITH_SPECIALIST_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('the_quality_of_communication_with_specialist') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="the_quality_of_communication_with_specialist_{{ $key }}" name="the_quality_of_communication_with_specialist" value="{{ $key }}" {{ old('the_quality_of_communication_with_specialist', $bigBrotherRating->the_quality_of_communication_with_specialist) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="the_quality_of_communication_with_specialist_{{ $key }}">{{ trans('global.the_quality_of_communication_with_specialist.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('the_quality_of_communication_with_specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('the_quality_of_communication_with_specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.the_quality_of_communication_with_specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.evaluation_of_required_interviews_with_specialist') }}</label>
                @foreach(App\Models\BigBrotherRating::EVALUATION_OF_REQUIRED_INTERVIEWS_WITH_SPECIALIST_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('evaluation_of_required_interviews_with_specialist') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="evaluation_of_required_interviews_with_specialist_{{ $key }}" name="evaluation_of_required_interviews_with_specialist" value="{{ $key }}" {{ old('evaluation_of_required_interviews_with_specialist', $bigBrotherRating->evaluation_of_required_interviews_with_specialist) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="evaluation_of_required_interviews_with_specialist_{{ $key }}">{{ trans('global.evaluation_of_required_interviews_with_specialist.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('evaluation_of_required_interviews_with_specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluation_of_required_interviews_with_specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.evaluation_of_required_interviews_with_specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_interviews">{{ trans('cruds.bigBrotherRating.fields.number_of_interviews') }}</label>
                <input class="form-control {{ $errors->has('number_of_interviews') ? 'is-invalid' : '' }}" type="number" name="number_of_interviews" id="number_of_interviews" value="{{ old('number_of_interviews', $bigBrotherRating->number_of_interviews) }}" step="1" required>
                @if($errors->has('number_of_interviews'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_interviews') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.number_of_interviews_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.satisfaction_with_the_acceptance_of_the_smaller_brother') }}</label>
                @foreach(App\Models\BigBrotherRating::SATISFACTION_WITH_THE_ACCEPTANCE_OF_THE_SMALLER_BROTHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('satisfaction_with_the_acceptance_of_the_smaller_brother') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="satisfaction_with_the_acceptance_of_the_smaller_brother_{{ $key }}" name="satisfaction_with_the_acceptance_of_the_smaller_brother" value="{{ $key }}" {{ old('satisfaction_with_the_acceptance_of_the_smaller_brother', $bigBrotherRating->satisfaction_with_the_acceptance_of_the_smaller_brother) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="satisfaction_with_the_acceptance_of_the_smaller_brother_{{ $key }}">{{ trans('global.satisfaction_with_the_acceptance_of_the_smaller_brother.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('satisfaction_with_the_acceptance_of_the_smaller_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('satisfaction_with_the_acceptance_of_the_smaller_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.satisfaction_with_the_acceptance_of_the_smaller_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.quality_of_offered_programs') }}</label>
                @foreach(App\Models\BigBrotherRating::QUALITY_OF_OFFERED_PROGRAMS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('quality_of_offered_programs') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="quality_of_offered_programs_{{ $key }}" name="quality_of_offered_programs" value="{{ $key }}" {{ old('quality_of_offered_programs', $bigBrotherRating->quality_of_offered_programs) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="quality_of_offered_programs_{{ $key }}">{{ trans('global.quality_of_offered_programs.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('quality_of_offered_programs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quality_of_offered_programs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.quality_of_offered_programs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.evaluate_study_of_challenges_and_find_helpful_solutions') }}</label>
                @foreach(App\Models\BigBrotherRating::EVALUATE_STUDY_OF_CHALLENGES_AND_FIND_HELPFUL_SOLUTIONS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('evaluate_study_of_challenges_and_find_helpful_solutions') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="evaluate_study_of_challenges_and_find_helpful_solutions_{{ $key }}" name="evaluate_study_of_challenges_and_find_helpful_solutions" value="{{ $key }}" {{ old('evaluate_study_of_challenges_and_find_helpful_solutions', $bigBrotherRating->evaluate_study_of_challenges_and_find_helpful_solutions) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="evaluate_study_of_challenges_and_find_helpful_solutions_{{ $key }}">{{ trans('global.evaluate_study_of_challenges_and_find_helpful_solutions.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('evaluate_study_of_challenges_and_find_helpful_solutions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluate_study_of_challenges_and_find_helpful_solutions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.evaluate_study_of_challenges_and_find_helpful_solutions_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.bigBrotherRating.fields.assessment_of_the_interaction_of_the_smaller_brother') }}</label>
                @foreach(App\Models\BigBrotherRating::ASSESSMENT_OF_THE_INTERACTION_OF_THE_SMALLER_BROTHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('assessment_of_the_interaction_of_the_smaller_brother') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="assessment_of_the_interaction_of_the_smaller_brother_{{ $key }}" name="assessment_of_the_interaction_of_the_smaller_brother" value="{{ $key }}" {{ old('assessment_of_the_interaction_of_the_smaller_brother', $bigBrotherRating->assessment_of_the_interaction_of_the_smaller_brother) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="assessment_of_the_interaction_of_the_smaller_brother_{{ $key }}">{{ trans('global.assessment_of_the_interaction_of_the_smaller_brother.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('assessment_of_the_interaction_of_the_smaller_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assessment_of_the_interaction_of_the_smaller_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bigBrotherRating.fields.assessment_of_the_interaction_of_the_smaller_brother_helper') }}</span>
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
