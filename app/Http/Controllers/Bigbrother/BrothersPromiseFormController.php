<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBigBrotherRequest;
use App\Http\Requests\StoreBigBrotherRequest;
use App\Http\Requests\UpdateBigBrotherRequest;
use App\Models\BigBrother;
use App\Models\SmallBrother;
use App\Models\BrothersDealForm;
use App\Models\User;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrothersPromiseFormController extends Controller
{

    public function view ()
    {
        $userinfo = Auth::user();

        $bigBrother = BigBrother::where('user_id',$userinfo->id)->first();
        $brothersDealForm = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])
                                                ->orderBy('created_at','desc')
                                                ->where('big_brother_id',$bigBrother->id)->first();

        return view('bigbrother.BrothersPromiseForm',compact('userinfo','bigBrother','brothersDealForm'));
    }

    public function printForm ()
    {
        $userinfo = Auth::user();

        $bigBrother = BigBrother::where('user_id',$userinfo->id)->first();

        return view('forms.BrothersPromiseForm',compact('userinfo','bigBrother'));
    }
}
