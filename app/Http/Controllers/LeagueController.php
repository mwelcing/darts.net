<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $league = League::get()->first();
        return view('layouts.league.index', compact('league'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('layouts.league.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|unique:leagues',
            'president_id' => 'required|numeric',
            'year' => 'required',
            'pfh' => 'required|numeric',
            'pfs'=> 'required|numeric'
        ]);

        League::create($request->all());
        $request->session()->flash('success', 'League Info Added');
        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param League $league
     * @return Application|Factory|View|Response
     */
    public function show(League $league)
    {
        $teams = Team::all();
        return view('layouts.league.edit', compact('league', 'teams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param League $league
     * @return Response
     */
    public function edit(League $league)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param League $league
     * @return Application|RedirectResponse|Response|Redirector
     * @throws \Throwable
     */
    public function update(Request $request, League $league)
    {
        $validData = $request->validate([
            'name' => 'required|unique:leagues,name,' . $league->id,
            'president_id' => 'required|numeric',
            'year' => 'required',
            'pfh' => 'required|numeric',
            'pfs'=> 'required|numeric'
        ]);

        $league->fill($request->all());
        $league->saveOrFail();
        $request->session()->flash('success','League Info Updated');
        return redirect(route('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param League $league
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(League $league)
    {
        $league->delete();
        \Session::flash('deleted', 'League Info Deleted');
        return redirect(route('admin'));
    }
}
