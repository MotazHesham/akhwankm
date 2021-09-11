<?php

namespace App\Http\Controllers\Bigbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBigBrotherRatingRequest;
use App\Http\Requests\StoreBigBrotherRatingRequest;
use App\Http\Requests\UpdateBigBrotherRatingRequest;
use App\Models\BigBrother;
use App\Models\BigBrotherRating;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth ;

class BigBrotherRatingController extends Controller
{
    public function index()
    {


        $bigBrotherRatings = BigBrotherRating::with(['big_brother'])->get();

        return view('bigbrother.bigBrotherRatings.index', compact('bigBrotherRatings'));
    }

    public function create()
    {

        $big_brothers = BigBrother::where('user_id',Auth::id())->first();

        $big_brother= Auth::user();
        return view('bigbrother.bigBrotherRatings.create', compact('big_brother','big_brothers'));
    }

    public function store(StoreBigBrotherRatingRequest $request)
    {
        $bigBrotherRating = BigBrotherRating::create($request->all());

        return redirect()->route('bigbrother.big-brother-ratings.index');
    }

    public function edit(BigBrotherRating $bigBrotherRating)
    {

        $big_brothers = BigBrother::where('user_id',Auth::id())->first();

        $big_brother= Auth::user();
        $bigBrotherRating->load('big_brother');

        return view('bigbrother.bigBrotherRatings.edit', compact('big_brothers', 'bigBrotherRating','big_brother'));
    }

    public function update(UpdateBigBrotherRatingRequest $request, BigBrotherRating $bigBrotherRating)
    {
        $bigBrotherRating->update($request->all());

        return redirect()->route('bigbrother.big-brother-ratings.index');
    }

    public function show(BigBrotherRating $bigBrotherRating)
    {


        $bigBrotherRating->load('big_brother');

        return view('bigbrother.bigBrotherRatings.show', compact('bigBrotherRating'));
    }

    public function destroy(BigBrotherRating $bigBrotherRating)
    {


        $bigBrotherRating->delete();

        return back();
    }

    public function massDestroy(MassDestroyBigBrotherRatingRequest $request)
    {
        BigBrotherRating::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
