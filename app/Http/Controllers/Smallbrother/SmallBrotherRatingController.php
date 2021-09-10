<?php

namespace App\Http\Controllers\Smallbrother;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySmallBrotherRatingRequest;
use App\Http\Requests\StoreSmallBrotherRatingRequest;
use App\Http\Requests\UpdateSmallBrotherRatingRequest;
use App\Models\SmallBrotherRating;
use Gate;
use Auth ;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SmallBrotherRatingController extends Controller
{
    public function index()
    {
        $smallBrotherRatings = SmallBrotherRating::all();

        return view('smallbrother.smallBrotherRatings.index', compact('smallBrotherRatings'));
    }

    public function create()
    {
        $small_brother= Auth::user();
        return view('smallbrother.smallBrotherRatings.create', compact('small_brother'));
    }

    public function store(StoreSmallBrotherRatingRequest $request)
    {
        $smallBrotherRating = SmallBrotherRating::create($request->all());

        return redirect()->route('smallbrother.small-brother-ratings.index');
    }

    public function edit(SmallBrotherRating $smallBrotherRating)
    {

        return view('smallbrother.smallBrotherRatings.edit', compact('smallBrotherRating'));
    }

    public function update(UpdateSmallBrotherRatingRequest $request, SmallBrotherRating $smallBrotherRating)
    {
        $smallBrotherRating->update($request->all());

        return redirect()->route('smallbrother.small-brother-ratings.index');
    }

    public function show(SmallBrotherRating $smallBrotherRating)
    {
        return view('smallbrother.smallBrotherRatings.show', compact('smallBrotherRating'));
    }

    public function destroy(SmallBrotherRating $smallBrotherRating)
    {

        $smallBrotherRating->delete();

        return back();
    }

    public function massDestroy(MassDestroySmallBrotherRatingRequest $request)
    {
        SmallBrotherRating::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
