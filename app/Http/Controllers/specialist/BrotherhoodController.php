<?php


namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Models\Skill;
use App\Models\User;
use Alert;

class BrotherhoodController extends Controller
{
    //

    
    public function store(Request $request ){

        $BigBrother=BigBrother::findOrFail($request->big_brother_id);
        
        $BigBrother->update([
       
            'small_brother_id'=>$request->small_brother_id,


        ]);
            
        Alert::success(trans('global.flash.success'),'تم تسجيل معلومات المأخاه بنجاح');
    
            return redirect()->route('specialist.brother_details',$request->big_brother_id);  
    
  
    }

}
