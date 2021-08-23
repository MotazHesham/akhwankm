<?php


namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Models\BrothersDealForm;
use App\Models\ApprovementForm;
use App\Models\Skill;
use App\Models\User;
use Alert;

class BrotherDealControllers extends Controller
{
    //

    public function store(StoreBrothersDealFormRequest $request){

      $validated_request = $request->all();
      $approvmentform = ApprovementForm::where('big_brother_id',$request->big_brother_id)->orderBy('created_at','desc')->first(); 
      $validated_request['approvment_form_id'] = $approvmentform->id; 

      $brothersDealForm = BrothersDealForm::create($validated_request);
      return redirect()->route('specialist.brother_details',$request->big_brother_id); 
    }

}