<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Session;
use Throwable;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $teams = Team::orderBy('team_no')->with('players')->get();
        $players = Player::orderBy('name')->with('team')->get();
        return view('layouts.players.index', compact('players', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $teamId
     * @return Application|Factory|View|Response
     */
    public function create($teamId)
    {
        $teams = Team::all();
        $genders = ['M','F'];
        return view('layouts.players.create', compact('teams','genders', 'teamId'));
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
            'name' => 'required'
        ]);

        Player::create($request->all());
        $request->session()->flash('success', 'Player Added');
        return redirect(route('players.create', $request->team_id));
    }

    /**
     * Display the specified resource.
     *
     * @param Player $player
     * @return Application|Factory|View|Response
     */
    public function show(Player $player)
    {
        $genders = ['M','F'];
        $teams = Team::all();
        return view('layouts.players.edit', compact('player', 'genders','teams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Player $player
     * @return Application|Factory|View|Response
     */
    public function edit(Player $player)
    {
        $genders = ['M','F'];
        $teams = Team::all();
        return view('layouts.players.edit', compact('player', 'genders', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Player $player
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Throwable
     */
    public function update(Request $request, Player $player)
    {
        $validData = $request->validate([
            'name' => 'required'
        ]);

        $player->fill($request->all());
        $player->saveOrFail();
        $request->session()->flash('success', 'Player Updated');
        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Player $player
     * @return Application|RedirectResponse|Response|Redirector
     * @throws \Exception
     */
    public function destroy(Player $player)
    {
        $player->delete();
        Session::flash('deleted', 'Player Deleted');
        return redirect(route('teams.index'));
    }
}
