<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Models\OutingRequest;
use App\Http\Requests\MassDestroyBrothersDealFormRequest;
use App\Http\Requests\StoreBrothersDealFormRequest;
use App\Http\Requests\UpdateBrothersDealFormRequest;
use App\Models\ApprovementForm;
use App\Models\BigBrother;
use App\Models\BrothersDealForm;
use App\Models\SmallBrother;
use App\Models\User;
use Gate;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrothersDealFormController extends Controller
{
    public function index()
    {
        $bigbrother = BigBrother::where('user_id',Auth::id())->first();

        $brothersDealForm = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])
                                                ->orderBy('created_at','desc')
                                                ->where('big_brother_id',$bigbrother->id)->first();

        return view('bigbrother.brotherDealForm.index', compact('brothersDealForm'));


    }

    public function view()
    {
        $big_brother = BigBrother::where('user_id',Auth::id())->first();
        $brothersDealForm = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])
                                                ->orderBy('created_at','desc')
                                                ->where('big_brother_id',$big_brother->id)->first();
        $small_brother = SmallBrother::find($big_brother->small_brother_id);

        return view('bigbrother.brotherDealForm.brothersDeal', compact('brothersDealForm','big_brother','small_brother'));
    }


    public function printForm()
    {        
        
        $big_brother = BigBrother::where('user_id',Auth::id())->first();
        $brothersDealForm = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])
                                                ->orderBy('created_at','desc')
                                                ->where('big_brother_id',$big_brother->id)->first();
        $small_brother = SmallBrother::find($big_brother->small_brother_id);

        return view('forms.brothersDeal', compact('brothersDealForm','big_brother','small_brother'));
    }
}
