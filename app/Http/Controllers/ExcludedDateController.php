<?php

namespace App\Http\Controllers;

use App\Models\ExcludedDate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ExcludedDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('layouts.excluded_dates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        ExcludedDate::create($request->all());
        $request->session()->flash('success','Date saved');
        return redirect(route('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param ExcludedDate $excludedDate
     * @return Response
     */
    public function show(ExcludedDate $excludedDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ExcludedDate $excludedDate
     * @return Response
     */
    public function edit(ExcludedDate $excludedDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ExcludedDate $excludedDate
     * @return Response
     */
    public function update(Request $request, ExcludedDate $excludedDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExcludedDate $excludedDate
     * @return Response
     */
    public function destroy(ExcludedDate $excludedDate)
    {
        //
    }
}
