<?php


namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Models\DatingSession;
use App\Models\User;
use App\Models\UserAlert;
use Alert;

class DatingSessionController extends Controller
{
    //
    public function create($big_brother_id){
  
        $bigBrother = BigBrother::findOrfail($big_brother_id);

        return view('specialist.session',compact('bigBrother'));
       
    }
    
    public function store(StoreDatingSessionRequest $request)
    {
        $datingSession = DatingSession::create($request->all());
        $BigBrother = BigBrother::find($datingSession->big_brother_id);
        
        $userAlert = UserAlert::create([
            'alert_text' => 'تم تحديد معاد لجلسة التعارف',
            'alert_link' => route('bigbrother.calender'),
            'type' => 'system',
        ]);
        
        $userAlert->users()->sync([$BigBrother->user->id]);
        Alert::success(trans('global.flash.success'),'تم تسجيل معلومات جلسة التعارف بنجاح');
    
        return redirect()->route('specialist.brother_details',$request->big_brother_id);  
    }
}
