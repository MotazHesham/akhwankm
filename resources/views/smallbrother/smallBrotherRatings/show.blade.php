@extends('layouts.smallbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smallBrotherRating.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('smallbrother.small-brother-ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.id') }}
                        </th>
                        <td>
                            {{ $smallBrotherRating->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.name') }}
                        </th>
                        <td>
                            {{ $smallBrotherRating->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.suitability_of_program_and_its_help_in_developing_your_skills') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::SUITABILITY_OF_PROGRAM_AND_ITS_HELP_IN_DEVELOPING_YOUR_SKILLS_RADIO[$smallBrotherRating->suitability_of_program_and_its_help_in_developing_your_skills] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.how_much_do_you_accept_the_big_brother_sister') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::HOW_MUCH_DO_YOU_ACCEPT_THE_BIG_BROTHER_SISTER_RADIO[$smallBrotherRating->how_much_do_you_accept_the_big_brother_sister] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.big_brother_big_sister_reacts_to_my_needs') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::BIG_BROTHER_BIG_SISTER_REACTS_TO_MY_NEEDS_RADIO[$smallBrotherRating->big_brother_big_sister_reacts_to_my_needs] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.sticks_to_his_appointments') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::STICKS_TO_HIS_APPOINTMENTS_RADIO[$smallBrotherRating->sticks_to_his_appointments] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.good_to_listen_to_my_discussions') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::GOOD_TO_LISTEN_TO_MY_DISCUSSIONS_RADIO[$smallBrotherRating->good_to_listen_to_my_discussions] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.would_you_like_to_continue_with_big_brother') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::WOULD_YOU_LIKE_TO_CONTINUE_WITH_BIG_BROTHER_RADIO[$smallBrotherRating->would_you_like_to_continue_with_big_brother] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.ease_of_registering') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::EASE_OF_REGISTERING_RADIO[$smallBrotherRating->ease_of_registering] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smallBrotherRating.fields.extent_of_benefit_from_the_program') }}
                        </th>
                        <td>
                            {{ App\Models\SmallBrotherRating::EXTENT_OF_BENEFIT_FROM_THE_PROGRAM_RADIO[$smallBrotherRating->extent_of_benefit_from_the_program] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.small-brother-ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
