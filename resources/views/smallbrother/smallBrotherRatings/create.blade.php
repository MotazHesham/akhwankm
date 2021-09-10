@extends('layouts.smallbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.smallBrotherRating.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("smallbrother.small-brother-ratings.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="name" value={{$small_brother->name}}>

            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.suitability_of_program_and_its_help_in_developing_your_skills') }}</label>
                @foreach(App\Models\SmallBrotherRating::SUITABILITY_OF_PROGRAM_AND_ITS_HELP_IN_DEVELOPING_YOUR_SKILLS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('suitability_of_program_and_its_help_in_developing_your_skills') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="suitability_of_program_and_its_help_in_developing_your_skills_{{ $key }}" name="suitability_of_program_and_its_help_in_developing_your_skills" value="{{ $key }}" {{ old('suitability_of_program_and_its_help_in_developing_your_skills', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="suitability_of_program_and_its_help_in_developing_your_skills_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('suitability_of_program_and_its_help_in_developing_your_skills'))
                    <div class="invalid-feedback">
                        {{ $errors->first('suitability_of_program_and_its_help_in_developing_your_skills') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.suitability_of_program_and_its_help_in_developing_your_skills_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.how_much_do_you_accept_the_big_brother_sister') }}</label>
                @foreach(App\Models\SmallBrotherRating::HOW_MUCH_DO_YOU_ACCEPT_THE_BIG_BROTHER_SISTER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('how_much_do_you_accept_the_big_brother_sister') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="how_much_do_you_accept_the_big_brother_sister_{{ $key }}" name="how_much_do_you_accept_the_big_brother_sister" value="{{ $key }}" {{ old('how_much_do_you_accept_the_big_brother_sister', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="how_much_do_you_accept_the_big_brother_sister_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('how_much_do_you_accept_the_big_brother_sister'))
                    <div class="invalid-feedback">
                        {{ $errors->first('how_much_do_you_accept_the_big_brother_sister') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.how_much_do_you_accept_the_big_brother_sister_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.big_brother_big_sister_reacts_to_my_needs') }}</label>
                @foreach(App\Models\SmallBrotherRating::BIG_BROTHER_BIG_SISTER_REACTS_TO_MY_NEEDS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('big_brother_big_sister_reacts_to_my_needs') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="big_brother_big_sister_reacts_to_my_needs_{{ $key }}" name="big_brother_big_sister_reacts_to_my_needs" value="{{ $key }}" {{ old('big_brother_big_sister_reacts_to_my_needs', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="big_brother_big_sister_reacts_to_my_needs_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('big_brother_big_sister_reacts_to_my_needs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('big_brother_big_sister_reacts_to_my_needs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.big_brother_big_sister_reacts_to_my_needs_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.sticks_to_his_appointments') }}</label>
                @foreach(App\Models\SmallBrotherRating::STICKS_TO_HIS_APPOINTMENTS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sticks_to_his_appointments') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sticks_to_his_appointments_{{ $key }}" name="sticks_to_his_appointments" value="{{ $key }}" {{ old('sticks_to_his_appointments', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="sticks_to_his_appointments_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sticks_to_his_appointments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sticks_to_his_appointments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.sticks_to_his_appointments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.good_to_listen_to_my_discussions') }}</label>
                @foreach(App\Models\SmallBrotherRating::GOOD_TO_LISTEN_TO_MY_DISCUSSIONS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('good_to_listen_to_my_discussions') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="good_to_listen_to_my_discussions_{{ $key }}" name="good_to_listen_to_my_discussions" value="{{ $key }}" {{ old('good_to_listen_to_my_discussions', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="good_to_listen_to_my_discussions_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('good_to_listen_to_my_discussions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('good_to_listen_to_my_discussions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.good_to_listen_to_my_discussions_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.would_you_like_to_continue_with_big_brother') }}</label>
                @foreach(App\Models\SmallBrotherRating::WOULD_YOU_LIKE_TO_CONTINUE_WITH_BIG_BROTHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('would_you_like_to_continue_with_big_brother') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="would_you_like_to_continue_with_big_brother_{{ $key }}" name="would_you_like_to_continue_with_big_brother" value="{{ $key }}" {{ old('would_you_like_to_continue_with_big_brother', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="would_you_like_to_continue_with_big_brother_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('would_you_like_to_continue_with_big_brother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('would_you_like_to_continue_with_big_brother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.would_you_like_to_continue_with_big_brother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.ease_of_registering') }}</label>
                @foreach(App\Models\SmallBrotherRating::EASE_OF_REGISTERING_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('ease_of_registering') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="ease_of_registering_{{ $key }}" name="ease_of_registering" value="{{ $key }}" {{ old('ease_of_registering', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="ease_of_registering_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('ease_of_registering'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ease_of_registering') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.ease_of_registering_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.smallBrotherRating.fields.extent_of_benefit_from_the_program') }}</label>
                @foreach(App\Models\SmallBrotherRating::EXTENT_OF_BENEFIT_FROM_THE_PROGRAM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('extent_of_benefit_from_the_program') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="extent_of_benefit_from_the_program_{{ $key }}" name="extent_of_benefit_from_the_program" value="{{ $key }}" {{ old('extent_of_benefit_from_the_program', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="extent_of_benefit_from_the_program_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('extent_of_benefit_from_the_program'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extent_of_benefit_from_the_program') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smallBrotherRating.fields.extent_of_benefit_from_the_program_helper') }}</span>
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
