<?php


namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Models\BrothersDealForm;
use App\Models\Skill;
use App\Models\User;
use Alert;

class BrotherDealControllers extends Controller
{
    //

    public function store(StoreBrothersDealFormRequest $request){

      $brothersDealForm = BrothersDealForm::create($request->all());

      return redirect()->route('specialist.brother_details',$request->big_brother_id); 
    }

}