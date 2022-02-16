<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use Carbon\Carbon;

class GeneralReportingController extends Controller
{
    //
    public function index(){

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');
        $countries = Country::get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.generalReports.bigbrother.index', compact( 'charactarstics', 'skills','countries'));
    }

    public function show(Request $request){
            
           $start_date = null;
           $end_date = null;
           $dbo_start = null;
           $dbo_end = null;
           $marital_status = null;
           $gender = null;
           $degree = null;
           $city_id = null; 
           $charactarstics = null;
           $skills = null;
           $family = null;
           $family_male = null;
           $family_female = null; 
           $salary = null; 

       
        $bigBrothers=BigBrother::with('user');

        if ($request->start_date != null && $request->end_date != null ){
            $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->start_date)->format('d-m-Y')); 
            $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->end_date)->format('d-m-Y')); 
            $bigBrothers = $bigBrothers->whereBetween('created_at',[$from,$to]);
          
        }
        if ($request->start_date != null && $request->end_date == null ){
            $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->start_date)->format('d-m-Y')); 
            $to=Carbon::now(); 
            $bigBrothers = $bigBrothers->whereBetween('created_at',[$from,$to]);
          
        }

        if ($request->start_date != null && $request->end_date == null ){
            $from=Carbon::now(); 
            $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->end_date)->format('d-m-Y')); 
            $bigBrothers = $bigBrothers->whereBetween('created_at',[$from,$to]);
          
        }

        if ($request->dbo_start != null && $request->dbo_end != null ){
            global $from,$to;
            $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_start)->format('d-m-Y')); 
            $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_end)->format('d-m-Y')); 
            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->whereBetween('dbo',[$GLOBALS['from'],$GLOBALS['to']]);
            });
          
        }
        if ($request->dbo_start != null && $request->dbo_end == null ){
            global $from,$to;
            $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_start)->format('d-m-Y')); 
            $to=Carbon::now(); 
            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->whereBetween('dbo',[$GLOBALS['from'],$GLOBALS['to']]);
            });
          
        }
        if ($request->dbo_start == null && $request->dbo_end != null ){
            global $from,$to;
            $from=Carbon::now(); 
            $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_end)->format('d-m-Y')); 
            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->whereBetween('dbo',$GLOBALS['from'],$GLOBALS['to']);
            });
          
        }

        if ($request->marital_status != null){
            global $marital_status;
            $marital_status = $request->marital_status;  
            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->where('marital_status',$GLOBALS['marital_status']);
            });
      
        }
        if ($request->degree != null) {
            global $degree;
            $degree = $request->degree;  

            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->where('degree',$GLOBALS['degree']);
            });
    
        } 

        if ($request->gender != null){
            global $gender;
            $gender = $request->gender;  
            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->where('gender',$GLOBALS['gender']);
            });      
        }

        if ($request->salary != null){ 
            $bigBrothers = $bigBrothers->where('salary','>',$request->salary);  
            $salary=$request->$salary;   
        }

        if ($request->family != null  ){ 
         
            $bigBrothers = $bigBrothers->whereRaw('family_male + family_female > '.$request->family);
            $family=$request->$family;   
        }
    
        if ($request->city_id != null){
            global $city_id;
            $city_id = $request->city_id;  

            $bigBrothers = $bigBrothers->whereHas('user',function($query){
                $query->where('city_id',$GLOBALS['city_id']);
            });
        } 
        if ($request->skills != null){
            global $skills;
            $skills = $request->skills;  

            $bigBrothers = $bigBrothers->whereHas('skills',function($query){
                $query->whereIn('id',$GLOBALS['skills']);
            });
        } 
        if ($request->charactarstics != null){
            global $charactarstics;
            $charactarstics = $request->charactarstics;  

            $bigBrothers = $bigBrothers->whereHas('charactarstics',function($query){
                $query->whereIn('id',$GLOBALS['charactarstics']);
            });
        } 

        $bigBrothers = $bigBrothers->orderBy('created_at', 'desc')->get();

        //return     $bigBrothers ;

        return view('admin.generalReports.bigbrother.show', compact('bigBrothers'));
    }
//--------------------------------------------------------------------------------------
    public function SmallBrotherindex(){

        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');
    
        return view('admin.generalReports.smallbrother.index', compact( 'charactarstics', 'skills'));
    }
    
    public function SmallBrothershow(Request $request){
            
        $start_date = null;
        $end_date = null;
        $dbo_start = null;
        $dbo_end = null;
        $gender = null;
        $degree = null;
        $charactarstics = null;
        $skills = null;

    
      $smallBrothers = SmallBrother::with('user');

     if ($request->start_date != null && $request->end_date != null ){
         $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->start_date)->format('d-m-Y')); 
         $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->end_date)->format('d-m-Y')); 
         $smallBrothers = $smallBrothers->whereBetween('created_at',[$from,$to]);
       
     }
     if ($request->start_date != null && $request->end_date == null ){
         $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->start_date)->format('d-m-Y')); 
         $to=Carbon::now(); 
         $smallBrothers = $smallBrothers->whereBetween('created_at',[$from,$to]);
       
     }

     if ($request->start_date != null && $request->end_date == null ){
         $from=Carbon::now(); 
         $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->end_date)->format('d-m-Y')); 
         $smallBrothers = $smallBrothers->whereBetween('created_at',[$from,$to]);
       
     }

     if ($request->dbo_start != null && $request->dbo_end != null ){
         global $from,$to;
         $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_start)->format('d-m-Y')); 
         $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_end)->format('d-m-Y')); 
         $smallBrothers = $smallBrothers->whereHas('user',function($query){
             $query->whereBetween('dbo',[$GLOBALS['from'],$GLOBALS['to']]);
         });
       
     }
     if ($request->dbo_start != null && $request->dbo_end == null ){
         global $from,$to;
         $from=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_start)->format('d-m-Y')); 
         $to=Carbon::now(); 
         $smallBrothers = $smallBrothers->whereHas('user',function($query){
             $query->whereBetween('dbo',[$GLOBALS['from'],$GLOBALS['to']]);
         });
       
     }
     if ($request->dbo_start == null && $request->dbo_end != null ){
         global $from,$to;
         $from=Carbon::now(); 
         $to=Carbon::parse(Carbon::createFromFormat('d/m/Y', $request->dbo_end)->format('d-m-Y')); 
         $smallBrothers = $smallBrothers->whereHas('user',function($query){
             $query->whereBetween('dbo',$GLOBALS['from'],$GLOBALS['to']);
         });
       
     }

    
     if ($request->degree != null) {
         global $degree;
         $degree = $request->degree;  

         $smallBrothers = $smallBrothers->whereHas('user',function($query){
             $query->where('degree',$GLOBALS['degree']);
         });
 
     } 

     if ($request->gender != null){
         global $gender;
         $gender = $request->gender;  
         $smallBrothers = $smallBrothers->whereHas('user',function($query){
             $query->where('gender',$GLOBALS['gender']);
         });      
     }

     if ($request->skills != null){
         global $skills;
         $skills = $request->skills;  

         $smallBrothers = $smallBrothers->whereHas('skills',function($query){
             $query->whereIn('id',$GLOBALS['skills']);
         });
     } 
     if ($request->charactarstics != null){
         global $charactarstics;
         $charactarstics = $request->charactarstics;  

         $smallBrothers = $smallBrothers->whereHas('charactaristics',function($query){
             $query->whereIn('id',$GLOBALS['charactarstics']);
         });
     } 

     $smallBrothers = $smallBrothers->orderBy('created_at', 'desc')->get();


     return view('admin.generalReports.smallbrother.show', compact('smallBrothers'));
 }
}
