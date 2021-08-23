<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpecialistRequest;
use App\Http\Requests\StoreSpecialistRequest;
use App\Http\Requests\UpdateSpecialistRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
Use Alert;

class SpecialistsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = User::where('user_type','specialist')->select(sprintf('%s.*', (new User())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'specialist_show';
                $editGate = 'specialist_edit';
                $deleteGate = 'specialist_delete';
                $crudRoutePart = 'specialists';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            }); 
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? User::GENDER_RADIO[$row->gender] : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? User::MARITAL_STATUS_RADIO[$row->marital_status] : '';
            });
            $table->editColumn('degree', function ($row) {
                return $row->degree ? User::DEGREE_RADIO[$row->degree] : '';
            });

            $table->rawColumns(['actions', 'placeholder' ]);

            return $table->make(true);
        }

        return view('admin.specialists.index');
    }

    public function create()
    {
        abort_if(Gate::denies('specialist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::get()->pluck('name', 'id'); 

        return view('admin.specialists.create', compact( 'countries'));
    }

    public function store(StoreSpecialistRequest $request)
    {
        $validated_request = $request->all();
        $validated_request['user_type'] = 'specialist';
        $user = User::create($validated_request);
        
        if ($request->input('cv', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($request->input('image', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        Alert::success(trans('global.flash.success'), trans('global.flash.created'));

        return redirect()->route('admin.specialists.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $countries = Country::get()->pluck('name', 'id'); 

        $user = User::findOrFail($id);

        return view('admin.specialists.edit', compact('user','countries'));
    }

    public function update(UpdateSpecialistRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        
        
        if ($request->input('cv', false)) {
            if (!$user->cv || $request->input('cv') !== $user->cv->file_name) {
                if ($user->cv) {
                    $user->cv->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($user->cv) {
            $user->cv->delete();
        }

        
        if ($request->input('image', false)) {
            if (!$user->image || $request->input('image') !== $user->image->file_name) {
                if ($user->image) {
                    $user->image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($user->image) {
            $user->image->delete();
        }
        
        Alert::success(trans('global.flash.success'), trans('global.flash.updated'));

        return redirect()->route('admin.specialists.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findOrFail($id);

        return view('admin.specialists.show', compact('user'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('specialist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findOrFail($id);

        $user->delete();

        Alert::success(trans('global.flash.success'), trans('global.flash.deleted'));

        return back();
    }

    public function massDestroy(MassDestroySpecialistRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    } 
}
