<?php


namespace App\Http\Controllers\specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Http\Requests\StoreDatingSessionRequest;
use App\Models\DatingSession;
use App\Models\User;
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

        Alert::success(trans('global.flash.success'),'تم تسجيل معلومات جلسة التعارف بنجاح');
    
        return redirect()->route('specialist.brother_details',$request->big_brother_id);  
    }
}
