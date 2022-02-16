<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInequalityRequest;
use App\Http\Requests\StoreInequalityRequest;
use App\Http\Requests\UpdateInequalityRequest;
use App\Models\BigBrother;
use App\Models\Inequality;
use App\Models\SmallBrother;
use App\Models\User;
use App\Models\BrothersDealForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Alert;

class InequalityController extends Controller
{

    public function create()
    {

        $brotherhood = BigBrother::where('user_id',Auth::id())->first();
 

        return view('bigbrother.Inequality', compact('brotherhood'));
    }

    public function store(StoreInequalityRequest $request)
    {
        $Inequality=Inequality::where('user_id',Auth::id())->first();

        if( $Inequality == null){
            
        $inequality = Inequality::create($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        }
        
        else

        Alert::error(' تم ارسال طلب عدم تكافؤ سابقا وجاري النظر فيه من قبل الاخصائي ');
      
       return redirect()->route('bigbrother.home');
    }


}
