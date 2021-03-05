<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Session;
use Throwable;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $teams = Team::orderBy('team_no')->get();
        return view('layouts.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('layouts.teams.create');
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
            'name' => 'required|unique:teams',
            'team_no' => 'required|numeric|unique:teams'
        ]);

        Team::create($request->all());
        $request->session()->flash('success', 'Team Added');
        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return Application|Factory|View
     */
    public function show(Team $team)
    {
        return view('layouts.teams.edit', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Application|Factory|View|Response
     */
    public function edit(Team $team)
    {
        return view('layouts.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Throwable
     */
    public function update(Request $request, Team $team)
    {
        $team->fill($request->all());
        $team->saveOrFail();
        $request->session()->flash('success', 'Team Updated');
        return redirect(route('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(Team $team)
    {
        $team->delete();
        Session::flash('deleted', 'Team Deleted');
        return redirect(route('admin'));

    }
}
