<?php

namespace App\Http\Controllers\specialist;

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

    public function index()
    {
       
        $inequalities = Inequality::with(['specialist', 'big_brother', 'small_brother'])->get();

        return view('specialist.inequalities.index', compact('inequalities'));
    }

 
    public function show(Inequality $inequality)
    {

        $inequality->load('specialist', 'big_brother', 'small_brother');
        

        return view('specialist.inequalities.show', compact('inequality'));
    }

    public function destroy(Inequality $inequality)
    {
        abort_if(Gate::denies('inequality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inequality->delete();

        return back();
    }

    public function massDestroy(MassDestroyInequalityRequest $request)
    {
        Inequality::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function print_form($id)
    {

       $inequality=Inequality::findOrfail($id);

       $inequality->load('specialist', 'big_brother', 'small_brother');

       $user=User::findOrfail($inequality->user_id);

        return view('forms.InequalityForm', compact('inequality','user'));
    }
}
