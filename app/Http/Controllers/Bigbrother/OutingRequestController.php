<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutingRequestRequest;
use App\Http\Requests\StoreOutingRequestRequest;
use App\Http\Requests\UpdateOutingRequestRequest;
use App\Models\BigBrother;
use App\Models\OutingRequest;
use App\Models\OutingType;
use App\Models\SmallBrother;
use App\Models\UserAlert;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Alert;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class OutingRequestController extends Controller
{
    public function index()
    {


        $bigBrother = BigBrother::where('user_id',Auth::id())->first();

        $outingRequests = OutingRequest::where('big_brother_id',$bigBrother->id)->with(['outing_type', 'big_brother', 'small_brother'])->orderBy('created_at','desc')->paginate(6);

        return view('Bigbrother.outingRequests.index', compact('outingRequests'));
    }

    public function create()
    {
        $name = 'name_' . app()->getLocale();

        $outing_types = OutingType::all()->pluck($name, 'id')->prepend(trans('global.pleaseSelect'), '');

        $big_brothers = BigBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $small_brothers = SmallBrother::with('user')->get()->pluck('user.email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('Bigbrother.outingRequests.create', compact('outing_types', 'big_brothers', 'small_brothers'));
    }

    public function store(StoreOutingRequestRequest $request)
    {
        $validated_request = $request->all();
        $big_brother = BigBrother::find($validated_request['big_brother_id']);
        $validated_request['small_brother_id'] = $big_brother->small_brother_id;
        if($big_brother->small_brother_id != null){
            $validated_request['small_brother_id'] = $big_brother->small_brother_id;
        }else{
            Alert::error('لم يتم الأضافة','لا يتم المأخاة  بعد');
            return redirect()->route('bigbrother.outing-requests.index');
        }
        $outingRequest = OutingRequest::create($validated_request);

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        
        $userAlert = UserAlert::create([
            'alert_text' => 'طلب خروج جديد  ',
            'alert_link' => route('specialist.outing-requests.index'),
            'type' => 'system',
        ]);

        $user_id=Bigbrother::where('id',$request->big_brother_id)->first()->specialist_id;

   
        $userAlert->users()->sync([$user_id ?? 0]);

        return redirect()->route('bigbrother.outing-requests.index');
    }

    public function edit(OutingRequest $outingRequest)
    {

        if($outingRequest->status != 'pending'){
            Alert::error('لا يمكن التعديل');
            return back();
        }
        $outing_types = OutingType::all()->pluck('name_ar', 'id')->prepend(trans('global.pleaseSelect'), ''); 

        $outingRequest->load('outing_type', 'big_brother', 'small_brother');

        return view('Bigbrother.outingRequests.edit', compact('outing_types', 'outingRequest'));
    }

    public function update(UpdateOutingRequestRequest $request, OutingRequest $outingRequest)
    {
        $outingRequest->update($request->all());

        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('bigbrother.outing-requests.index');
    }

    public function show(OutingRequest $outingRequest)
    {


        $outingRequest->load('outing_type', 'big_brother', 'small_brother');

        return view('Bigbrother.outingRequests.show', compact('outingRequest'));
    }

    public function destroy(OutingRequest $outingRequest)
    {


        if($outingRequest->status != 'pending'){
            Alert::error('لا يمكن الحذف');
            return back();
        }

        $outingRequest->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroyOutingRequestRequest $request)
    {
        OutingRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
