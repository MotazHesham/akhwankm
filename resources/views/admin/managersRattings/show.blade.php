@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.managersRatting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.managers-rattings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.id') }}
                        </th>
                        <td>
                            {{ $managersRatting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.member_of_the_board_of_directors') }}
                        </th>
                        <td>
                            {{ $managersRatting->member_of_the_board_of_directors }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.executive_director') }}
                        </th>
                        <td>
                            {{ $managersRatting->executive_director }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.brotherhood_specialist') }}
                        </th>
                        <td>
                            {{ $managersRatting->brotherhood_specialist->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.evaluation_of_fraternity_procedures') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::EVALUATION_OF_FRATERNITY_PROCEDURES_RADIO[$managersRatting->evaluation_of_fraternity_procedures] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.evaluation_of_interviews_with_the_specialist') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::EVALUATION_OF_INTERVIEWS_WITH_THE_SPECIALIST_RADIO[$managersRatting->evaluation_of_interviews_with_the_specialist] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.number_of_interviews') }}
                        </th>
                        <td>
                            {{ $managersRatting->number_of_interviews }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.the_convenience_of_choosing_a_bigbrother') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::THE_CONVENIENCE_OF_CHOOSING_A_BIGBROTHER_RADIO[$managersRatting->the_convenience_of_choosing_a_bigbrother] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.the_quality_of_the_training_program') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::THE_QUALITY_OF_THE_TRAINING_PROGRAM_RADIO[$managersRatting->the_quality_of_the_training_program] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.evaluate_the_study_of_challenges_and_find_solutions_to_help') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::EVALUATE_THE_STUDY_OF_CHALLENGES_AND_FIND_SOLUTIONS_TO_HELP_RADIO[$managersRatting->evaluate_the_study_of_challenges_and_find_solutions_to_help] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.desire_to_continue_the_relationship_between_brothers') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::DESIRE_TO_CONTINUE_THE_RELATIONSHIP_BETWEEN_BROTHERS_RADIO[$managersRatting->desire_to_continue_the_relationship_between_brothers] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.interaction_of_the_small_brother') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::INTERACTION_OF_THE_SMALL_BROTHER_RADIO[$managersRatting->interaction_of_the_small_brother] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.how_well_the_brotherhood_work_team_dealt_and_interacted') }}
                        </th>
                        <td>
                            {{ App\Models\ManagersRatting::HOW_WELL_THE_BROTHERHOOD_WORK_TEAM_DEALT_AND_INTERACTED_RADIO[$managersRatting->how_well_the_brotherhood_work_team_dealt_and_interacted] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.managersRatting.fields.general_notes') }}
                        </th>
                        <td>
                            {{ $managersRatting->general_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.managers-rattings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection