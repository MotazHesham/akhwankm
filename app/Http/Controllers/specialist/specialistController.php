<?php

namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\User;
use App\Models\ApprovementForm;
use App\Models\DatingSession;
use App\Models\BrothersDealForm;
use App\Http\Requests\StoreApprovementFormRequest;

use Alert;


class specialistController extends Controller
{
    //

    public function allBrothers(){

        $bigBrothers = BigBrother::with(['user', 'charactarstics', 'skills'])->get();

        return view ('specialist.allBrothers',compact('bigBrothers'));
    }

    public function brother_detials($big_brother_id){
        global $skills;
        
        $bigBrother = BigBrother::findOrfail($big_brother_id);

        $bigBrother->load('user', 'charactarstics', 'skills','small_brother','user.city','small_brother.skills','small_brother.charactaristics');

        $approve=ApprovementForm::where('big_brother_id',$bigBrother->id)->first();


        $dating=DatingSession::where('big_brother_id',$bigBrother->id)->first();

        $deal= BrothersDealForm::where('big_brother_id',$bigBrother->id)->first();
  

        $skills = $bigBrother['skills'];
        $small_brothers = SmallBrother::whereHas('skills',function($query){
           $query->whereIn('id',$GLOBALS['skills']);
       })->get()->take(5);

        
       
        return view ('specialist.BrotherDetails',compact('bigBrother','approve','dating','small_brothers'));

    }
    public function brotherhood($big_brother_id){

        
        $bigBrother = BigBrother::findOrfail($big_brother_id);
        $bigBrother->load('user');

        return view('specialist.approvement', compact('bigBrother'));
    }
    public function approvement(StoreApprovementFormRequest $request){
 
            $approvementForm = ApprovementForm::create($request->all());
   
            
        Alert::success(trans('global.flash.success'),'تم تسجيل معلومات التوصيه بنجاح');
    
            return redirect()->route('specialist.brother_details',$request->big_brother_id);  
    
    }

   
}
