<?php

namespace App\Http\Controllers\Smallbrother;

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

        $smallbrother = SmallBrother::where('user_id',Auth::id())->first(); 

        $brotherhood = BigBrother::where('small_brother_id',$smallbrother->id)->first();
 
        return view('smallbrother.inequality', compact('brotherhood'));
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

        return redirect()->route('smallbrother.home');
    }


}
