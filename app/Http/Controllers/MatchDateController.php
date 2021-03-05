<?php

namespace App\Http\Controllers;

use App\Models\MatchDate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Session;
use Throwable;

class MatchDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $matchDates = MatchDate::orderBy('week_no', 'asc')->get();
        return view('layouts.match_dates.index', compact('matchDates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        try {
            $nextWeekNo = MatchDate::orderBy('week_no', 'desc')->get()->first()->week_no;
        } catch (\Exception $ex) {
            $nextWeekNo = 1;
        }
        return view('layouts.match_dates.create', compact('nextWeekNo'));
    }

    /**
     * @param $date
     * @return string
     */
    public function massCreate($date): string
    {
        //Create a fixed 28 week schedule
        //Grab Week #1 from request
        MatchDate::query()->truncate();
        return $message = '28 Dates Set';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $message = '';
        if ($request->has('mass-create')) {
            $validData = $request->validate([
                'date' => 'required|date'
            ]);
            $date = $request->get('date');
            $message = $this->massCreate($date);
        } else {
            $validData = $request->validate([
                'week_no' => 'required|numeric',
                'date' => 'required|date',
                'half' => 'required|numeric'
            ]);

            MatchDate::created($request->all());
            $message = 'Date Added';
        }

        $request->session()->flash('success', $message);
        return redirect(route('matchdates.index'));
    }

    /**
     * Display the specified resource.
     * @param MatchDate $matchdate
     * @return Application|Factory|View|Response
     */
    public function show(MatchDate $matchdate)
    {
        return view('layouts.match_dates.edit', compact('matchdate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MatchDate $matchDate
     * @return Response
     */
    public function edit(MatchDate $matchDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MatchDate $matchdate
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Throwable
     */
    public function update(Request $request, MatchDate $matchdate)
    {
        $matchdate->fill($request->all());
        if ($matchdate->position_round == 'on') {
            $matchdate->position_round = true;
        } else {
            $matchdate->position_round = false;
        }
        $matchdate->saveOrFail();
        $request->session()->flash('success', 'Date Updated');
        return redirect(route('matchdates.show', $matchdate));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MatchDate $matchdate
     * @return Application|RedirectResponse|Response|Redirector
     * @throws \Exception
     */
    public function destroy(MatchDate $matchdate)
    {
        $matchdate->delete();
        Session::flash('delete', 'Match Date Deleted');
        return redirect(route('admin'));
    }
}
