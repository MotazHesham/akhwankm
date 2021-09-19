<?php


namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserAlert;
use Alert;

class BrotherhoodController extends Controller
{
    //

    
    public function store(Request $request ){

        $BigBrother=BigBrother::findOrFail($request->big_brother_id);
        
        $BigBrother->update([
       
            'small_brother_id'=>$request->small_brother_id,


        ]);
            
        $userAlert = UserAlert::create([
            'alert_text' => 'تمت المؤاخاة مع الأخ الأصغر',
            'alert_link' => route('bigbrother.brotherhood.show'),
            'type' => 'system',
        ]);
        
        $userAlert->users()->sync([$BigBrother->user->id ?? 0]);

        Alert::success(trans('global.flash.success'),'تم تسجيل معلومات المأخاه بنجاح');
    
            return redirect()->route('specialist.brother_details',$request->big_brother_id);  
    
  
    }

}
