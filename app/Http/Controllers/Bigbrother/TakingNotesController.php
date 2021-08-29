<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTakingNoteRequest;
use App\Http\Requests\StoreTakingNoteRequest;
use App\Http\Requests\UpdateTakingNoteRequest;
use App\Models\SmallBrother;
use App\Models\BigBrother;
use App\Models\TakingNote;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
Use Alert;
use Auth;

class TakingNotesController extends Controller
{
    public function index()
    {
        $big_brother = BigBrother::where('user_id',Auth::id())->first();

        $takingNotes = TakingNote::where('small_brother_name_id',$big_brother->small_brother_id)->with(['specialist_name', 'small_brother_name'])->orderBy('created_at','desc')->paginate(4);

        return view('bigbrother.notes', compact('takingNotes'));
    }


}

