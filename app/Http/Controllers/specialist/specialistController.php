<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\User;
use App\Models\ApprovementForm;
use App\Models\DatingSession;
use App\Models\BrothersDealForm;
use App\Http\Requests\StoreApprovementFormRequest;
use Auth;
use Alert;


class SpecialistController extends Controller
{ 
    public function allBrothers(){

        $bigBrothers = BigBrother::where('specialist_id',Auth::id())->with(['user', 'charactarstics', 'skills'])->orderBy('created_at','desc')->paginate(6);

        return view ('specialist.allBrothers',compact('bigBrothers'));
    }

    public function brother_detials($big_brother_id){
        global $skills;
        
        $bigBrother = BigBrother::findOrfail($big_brother_id);

        $bigBrother->load('user', 'charactarstics', 'skills','small_brother','user.city','small_brother.skills','small_brother.charactaristics');

        $approvementForm = ApprovementForm::where('big_brother_id',$bigBrother->id)->first();

        $small_brothers2 = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $datingSessions = DatingSession::where('big_brother_id',$bigBrother->id)->orderBy('created_at','desc')->get();

        $brotherDealForm = BrothersDealForm::where('big_brother_id',$bigBrother->id)->first(); 

        $skills = $bigBrother['skills'];
        
        $selected_small_brothers = BigBrother::where('small_brother_id','!=',null)->get()->pluck('small_brother_id');
        $small_brothers = SmallBrother::whereNotIn('id',$selected_small_brothers)->whereHas('skills',function($query){
                                                                                                    $query->whereIn('id',$GLOBALS['skills']);
                                                                                                })->get()->take(5); 
        return view ('specialist.BrotherDetails',compact('bigBrother','approvementForm','datingSessions','small_brothers','brotherDealForm','small_brothers2'));

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

    public function printApprovementForm(ApprovementForm $approvementForm){ 
       
        $approvementForms = ApprovementForm::findOrFail($approvementForm->id);

        return view('forms.approvementForm',compact('approvementForms'));


    }

}
