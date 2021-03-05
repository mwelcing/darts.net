<?php

namespace App\Http\Controllers;

use App\Models\MatchScore;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MatchScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $matchscores = MatchScore::all();
        return view('layouts.match_scores.index', compact('matchscores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  MatchScore  $matchScore
     * @return Response
     */
    public function show(MatchScore $matchScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  MatchScore  $matchScore
     * @return Application|Factory|View|Response
     */
    public function edit(MatchScore $matchScore)
    {
        return view('layouts.match_scores.edit', compact('matchScore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  MatchScore  $matchScore
     * @return Response
     */
    public function update(Request $request, MatchScore $matchScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MatchScore $matchScore
     * @return Response
     */
    public function destroy(MatchScore $matchScore)
    {
        //
    }
}
