@extends('layouts.bigbrother')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bigBrotherRating.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('bigbrother.big-brother-ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.id') }}
                        </th>
                        <td>
                            {{ $bigBrotherRating->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.name') }}
                        </th>
                        <td>
                            {{ $bigBrotherRating->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.evaluation_procedures_provided_by_specialist') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::EVALUATION_PROCEDURES_PROVIDED_BY_SPECIALIST_RADIO[$bigBrotherRating->evaluation_procedures_provided_by_specialist] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.the_quality_of_communication_with_specialist') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::THE_QUALITY_OF_COMMUNICATION_WITH_SPECIALIST_RADIO[$bigBrotherRating->the_quality_of_communication_with_specialist] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.evaluation_of_required_interviews_with_specialist') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::EVALUATION_OF_REQUIRED_INTERVIEWS_WITH_SPECIALIST_RADIO[$bigBrotherRating->evaluation_of_required_interviews_with_specialist] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.number_of_interviews') }}
                        </th>
                        <td>
                            {{ $bigBrotherRating->number_of_interviews }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.satisfaction_with_the_acceptance_of_the_smaller_brother') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::SATISFACTION_WITH_THE_ACCEPTANCE_OF_THE_SMALLER_BROTHER_RADIO[$bigBrotherRating->satisfaction_with_the_acceptance_of_the_smaller_brother] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.quality_of_offered_programs') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::QUALITY_OF_OFFERED_PROGRAMS_RADIO[$bigBrotherRating->quality_of_offered_programs] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.evaluate_study_of_challenges_and_find_helpful_solutions') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::EVALUATE_STUDY_OF_CHALLENGES_AND_FIND_HELPFUL_SOLUTIONS_RADIO[$bigBrotherRating->evaluate_study_of_challenges_and_find_helpful_solutions] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.assessment_of_the_interaction_of_the_smaller_brother') }}
                        </th>
                        <td>
                            {{ App\Models\BigBrotherRating::ASSESSMENT_OF_THE_INTERACTION_OF_THE_SMALLER_BROTHER_RADIO[$bigBrotherRating->assessment_of_the_interaction_of_the_smaller_brother] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bigBrotherRating.fields.big_brother') }}
                        </th>
                        <td>
                            {{ $bigBrotherRating->big_brother->brotherhood_reason ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('bigbrother.big-brother-ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
