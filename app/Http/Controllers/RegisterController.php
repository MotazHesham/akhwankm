<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\User;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\Skill;
use App\Models\Country;
use App\Models\SmallBrother;
use App\Models\BigBrother;
use App\Http\Requests\StoreBigBrotherRequest;
Use Alert;
use App\Http\Requests\StoreSmallBrotherRequest;

class RegisterController extends Controller
{
    use MediaUploadingTrait;

    public function register(){
        $charactarstics = Characteristic::all()->pluck('name_ar', 'id');
        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');
        $skills = Skill::all()->pluck('name_ar', 'id');
        $countries = Country::get()->pluck('name', 'id');

        return view('auth.register', compact( 'charactarstics', 'skills','countries','charactaristics'));
         }

    public function register2(){
        $charactaristics = Characteristic::all()->pluck('name_ar', 'id');

        $skills = Skill::all()->pluck('name_ar', 'id');


        return view('auth.partials.common', compact( 'charactarstics', 'skills'));

    }

    public function choose_small_brothers(Request $request){
        global $skills;
        $skills = $request->skills;
        $small_brothers = SmallBrother::whereHas('skills',function($query){
            $query->whereIn('id',$GLOBALS['skills']);
        })->get()->take(5);
        return view('auth.partials.choose_small_brothers', compact('small_brothers'));
    }

    public function big_brother(StoreBigBrotherRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'big_brother',
            'identity_number' => $request->identity_number,
            'identity_date' => $request->identity_date,
            'dbo' => $request->dbo,
            'marital_status' => $request->marital_status,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'degree' => $request->degree,
        ]);

        if ($request->input('cv', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }
        $bigBrother=BigBrother::create ([
            'job'=>$request->job,
            'job_place'=>$request->job_place,
            'salary'=>$request->salary,
            'family_male'=>$request->family_male,
            'family_female'=> $request->family_female,
            'marital_status'=>$request->marital_status,
            'brotherhood_reason'=>$request->brotherhood_reason,
            'user_id'=>$user->id,

        ]);
        $bigBrother->charactarstics()->sync($request->input('charactarstics', []));
        $bigBrother->skills()->sync($request->input('skills', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        return redirect()->route('login');
    }

    public function small_brother(StoreSmallBrotherRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 'small_brother',
            'identity_number' => $request->identity_number,
            'identity_date' => $request->identity_date,
            'dbo' => $request->dbo,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'degree' => $request->degree,
        ]);

        if ($request->input('cv', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }



        $smallBrother = SmallBrother::create([

            'user_id'=> $user->id,

        ]);

        $smallBrother->skills()->sync($request->input('skills', []));
        $smallBrother->charactaristics()->sync($request->input('charactaristics', []));

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));
        return redirect()->route('login');

    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
