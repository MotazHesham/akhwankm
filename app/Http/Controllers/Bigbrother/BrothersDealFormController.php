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
    public function index($user_id)
    {
        $user_id=BigBrother::where('user_id',Auth::id())->first()->id;
        $brothersDealForms = BrothersDealForm::with(['big_brother', 'small_brother', 'approvment_form', 'specialist'])
        ->where('big_brother_id',$user_id)->get();

        return view('bigbrother.brotherDealForm.index', compact('brothersDealForms'));


    }

    public function view(BrothersDealForm $brothersDealForm)
    {
        $big_brother=BigBrother::findOrFail($brothersDealForm->big_brother_id);
        $small_brother=SmallBrother::findOrFail($brothersDealForm->small_brother_id);

        return view('bigbrother.brotherDealForm.brothersDeal', compact('brothersDealForm','big_brother','small_brother'));
    }


    public function printForm(BrothersDealForm $brothersDealForm)
    {
        $big_brother=BigBrother::findOrFail($brothersDealForm->big_brother_id);
        $small_brother=SmallBrother::findOrFail($brothersDealForm->small_brother_id);

        return view('forms.brothersDeal', compact('brothersDealForm','big_brother','small_brother'));
    }
}
