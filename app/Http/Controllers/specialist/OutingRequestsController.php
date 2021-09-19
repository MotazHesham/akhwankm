<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OutingRequest;
use App\Models\BigBrother;
use App\Models\UserAlert;
use App\Models\User;
use Auth;
use Alert;

class OutingRequestsController extends Controller
{
    public function index(){
        $bigBrothers = BigBrother::where('specialist_id',Auth::id())->get()->pluck('id');
        $outingRequests = OutingRequest::whereIn('big_brother_id',$bigBrothers)->orderBy('created_at','desc')->paginate(6);
        return view('specialist.outingRequests',compact('outingRequests'));
    }

    public function change_status($id, $status){
        $outingRequest = OutingRequest::findOrFail($id);
        if(!in_array($status,['accept','refuse','outing','done','cancel'])){
            Alert::error('something went wrong');
            return redirect()->route('specialist.outing-requests.index');
        }
        if($status == 'done'){
            $outingRequest->done_time = date('d/m/Y H:i:s');
        }elseif($status == 'outing'){
            $outingRequest->outing_date = date('d/m/Y H:i:s');
        }

        $outingRequest->status = $status;
        $outingRequest->save();

        $userAlert = UserAlert::create([
            'alert_text' => trans('global.outing_status.' .$status).' طلب الخروج ',
            'alert_link' => route('bigbrother.outing-requests.index'),
            'type' => 'system',
        ]);

        $user_id=Bigbrother::where('id',$outingRequest->big_brother_id)->first()->user_id;

      
        $userAlert->users()->sync([$user_id ?? 0]);
        
        Alert::success('تم التعديل بنجاح');
        return redirect()->route('specialist.outing-requests.index');
    }
}
