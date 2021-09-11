@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.managersRatting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.managers-rattings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="member_of_the_board_of_directors">{{ trans('cruds.managersRatting.fields.member_of_the_board_of_directors') }}</label>
                <input class="form-control {{ $errors->has('member_of_the_board_of_directors') ? 'is-invalid' : '' }}" type="text" name="member_of_the_board_of_directors" id="member_of_the_board_of_directors" value="{{ old('member_of_the_board_of_directors', '') }}" required>
                @if($errors->has('member_of_the_board_of_directors'))
                    <div class="invalid-feedback">
                        {{ $errors->first('member_of_the_board_of_directors') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.member_of_the_board_of_directors_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="executive_director">{{ trans('cruds.managersRatting.fields.executive_director') }}</label>
                <input class="form-control {{ $errors->has('executive_director') ? 'is-invalid' : '' }}" type="text" name="executive_director" id="executive_director" value="{{ old('executive_director', '') }}" required>
                @if($errors->has('executive_director'))
                    <div class="invalid-feedback">
                        {{ $errors->first('executive_director') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.executive_director_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brotherhood_specialist_id">{{ trans('cruds.managersRatting.fields.brotherhood_specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('brotherhood_specialist') ? 'is-invalid' : '' }}" name="brotherhood_specialist_id" id="brotherhood_specialist_id" required>
                    @foreach($brotherhood_specialists as $id => $entry)
                        <option value="{{ $id }}" {{ old('brotherhood_specialist_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('brotherhood_specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brotherhood_specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.brotherhood_specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.evaluation_of_fraternity_procedures') }}</label>
                @foreach(App\Models\ManagersRatting::EVALUATION_OF_FRATERNITY_PROCEDURES_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('evaluation_of_fraternity_procedures') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="evaluation_of_fraternity_procedures_{{ $key }}" name="evaluation_of_fraternity_procedures" value="{{ $key }}" {{ old('evaluation_of_fraternity_procedures', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="evaluation_of_fraternity_procedures_{{ $key }}">{{ trans('global.evaluation_of_fraternity_procedures.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('evaluation_of_fraternity_procedures'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluation_of_fraternity_procedures') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.evaluation_of_fraternity_procedures_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.evaluation_of_interviews_with_the_specialist') }}</label>
                @foreach(App\Models\ManagersRatting::EVALUATION_OF_INTERVIEWS_WITH_THE_SPECIALIST_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('evaluation_of_interviews_with_the_specialist') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="evaluation_of_interviews_with_the_specialist_{{ $key }}" name="evaluation_of_interviews_with_the_specialist" value="{{ $key }}" {{ old('evaluation_of_interviews_with_the_specialist', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="evaluation_of_interviews_with_the_specialist_{{ $key }}">{{ trans('global.evaluation_of_interviews_with_the_specialist.'.$label)  }}</label>
                    </div>
                @endforeach
                @if($errors->has('evaluation_of_interviews_with_the_specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluation_of_interviews_with_the_specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.evaluation_of_interviews_with_the_specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_interviews">{{ trans('cruds.managersRatting.fields.number_of_interviews') }}</label>
                <input class="form-control {{ $errors->has('number_of_interviews') ? 'is-invalid' : '' }}" type="number" name="number_of_interviews" id="number_of_interviews" value="{{ old('number_of_interviews', '') }}" step="1" required>
                @if($errors->has('number_of_interviews'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_interviews') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.number_of_interviews_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.the_convenience_of_choosing_a_bigbrother') }}</label>
                @foreach(App\Models\ManagersRatting::THE_CONVENIENCE_OF_CHOOSING_A_BIGBROTHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('the_convenience_of_choosing_a_bigbrother') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="the_convenience_of_choosing_a_bigbrother_{{ $key }}" name="the_convenience_of_choosing_a_bigbrother" value="{{ $key }}" {{ old('the_convenience_of_choosing_a_bigbrother', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="the_convenience_of_choosing_a_bigbrother_{{ $key }}">{{ trans('global.the_convenience_of_choosing_a_bigbrother.'.$label)  }}</label>
                    </div>
                @endforeach
                @if($errors->has('the_convenience_of_choosing_a_bigbrother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('the_convenience_of_choosing_a_bigbrother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.the_convenience_of_choosing_a_bigbrother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.the_quality_of_the_training_program') }}</label>
                @foreach(App\Models\ManagersRatting::THE_QUALITY_OF_THE_TRAINING_PROGRAM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('the_quality_of_the_training_program') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="the_quality_of_the_training_program_{{ $key }}" name="the_quality_of_the_training_program" value="{{ $key }}" {{ old('the_quality_of_the_training_program', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="the_quality_of_the_training_program_{{ $key }}">{{ trans('global.the_quality_of_the_training_program.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('the_quality_of_the_training_program'))
                    <div class="invalid-feedback">
                        {{ $errors->first('the_quality_of_the_training_program') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.the_quality_of_the_training_program_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.evaluate_the_study_of_challenges_and_find_solutions_to_help') }}</label>
                @foreach(App\Models\ManagersRatting::EVALUATE_THE_STUDY_OF_CHALLENGES_AND_FIND_SOLUTIONS_TO_HELP_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('evaluate_the_study_of_challenges_and_find_solutions_to_help') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="evaluate_the_study_of_challenges_and_find_solutions_to_help_{{ $key }}" name="evaluate_the_study_of_challenges_and_find_solutions_to_help" value="{{ $key }}" {{ old('evaluate_the_study_of_challenges_and_find_solutions_to_help', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="evaluate_the_study_of_challenges_and_find_solutions_to_help_{{ $key }}">{{ trans('global.evaluate_the_study_of_challenges_and_find_solutions_to_help.'.$label)  }}</label>
                    </div>
                @endforeach
                @if($errors->has('evaluate_the_study_of_challenges_and_find_solutions_to_help'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluate_the_study_of_challenges_and_find_solutions_to_help') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.evaluate_the_study_of_challenges_and_find_solutions_to_help_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.desire_to_continue_the_relationship_between_brothers') }}</label>
                @foreach(App\Models\ManagersRatting::DESIRE_TO_CONTINUE_THE_RELATIONSHIP_BETWEEN_BROTHERS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('desire_to_continue_the_relationship_between_brothers') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="desire_to_continue_the_relationship_between_brothers_{{ $key }}" name="desire_to_continue_the_relationship_between_brothers" value="{{ $key }}" {{ old('desire_to_continue_the_relationship_between_brothers', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="desire_to_continue_the_relationship_between_brothers_{{ $key }}">{{trans('global.desire_to_continue_the_relationship_between_brothers.'.$label) }}</label>
                    </div>
                @endforeach
                @if($errors->has('desire_to_continue_the_relationship_between_brothers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desire_to_continue_the_relationship_between_brothers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.desire_to_continue_the_relationship_between_brothers_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.managersRatting.fields.interaction_of_the_small_brother') }}</label>
                @foreach(App\Models\ManagersRatting::INTERACTION_OF_THE_SMALL_BROTHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('interaction_of_the_small_brother') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="interaction_of_the_small_brother_{{ $key }}" name="interaction_of_the_small_brother" value="{{ $key }}" {{ old('interaction_of_the_small_brother', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="interaction_of_the_small_brother_{{ $key }}">{{ trans('global.interaction_of_the_small_brother.'.$label)  }}</label>
                    </div>
                @endforeach
                @if($errors->has('interaction_of_the_small_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interaction_of_the_small_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.interaction_of_the_small_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.managersRatting.fields.how_well_the_brotherhood_work_team_dealt_and_interacted') }}</label>
                @foreach(App\Models\ManagersRatting::HOW_WELL_THE_BROTHERHOOD_WORK_TEAM_DEALT_AND_INTERACTED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('how_well_the_brotherhood_work_team_dealt_and_interacted') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="how_well_the_brotherhood_work_team_dealt_and_interacted_{{ $key }}" name="how_well_the_brotherhood_work_team_dealt_and_interacted" value="{{ $key }}" {{ old('how_well_the_brotherhood_work_team_dealt_and_interacted', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="how_well_the_brotherhood_work_team_dealt_and_interacted_{{ $key }}">{{ trans('global.how_well_the_brotherhood_work_team_dealt_and_interacted.'.$label)  }}</label>
                    </div>
                @endforeach
                @if($errors->has('how_well_the_brotherhood_work_team_dealt_and_interacted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('how_well_the_brotherhood_work_team_dealt_and_interacted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.how_well_the_brotherhood_work_team_dealt_and_interacted_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="general_notes">{{ trans('cruds.managersRatting.fields.general_notes') }}</label>
                <textarea class="form-control {{ $errors->has('general_notes') ? 'is-invalid' : '' }}" name="general_notes" id="general_notes" required>{{ old('general_notes') }}</textarea>
                @if($errors->has('general_notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('general_notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.managersRatting.fields.general_notes_helper') }}</span>
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
