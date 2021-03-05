<?php

namespace App\Http\Controllers;

use App\Models\AdminMessage;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class AdminMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $adminMessages = AdminMessage::all();
        return view('layouts.admin_messages.index', compact('adminMessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('layouts.admin_messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'message' => 'required'
        ]);

        AdminMessage::create($request->all());
        $request->session()->flash('success', 'Message Saved');

        return redirect(route('adminmessages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param AdminMessage $adminMessage
     * @return Response
     */
    public function show(AdminMessage $adminMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AdminMessage $adminmessage
     * @return Application|Factory|View|Response
     */
    public function edit(AdminMessage $adminmessage)
    {
        return view('layouts.admin_messages.edit', compact('adminmessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AdminMessage $adminmessage
     * @return Application|RedirectResponse|Response|Redirector
     * @throws \Throwable
     */
    public function update(Request $request, AdminMessage $adminmessage)
    {
        $adminmessage->fill([
            'message' => $request->input("message")
        ]);

        $adminmessage->saveOrFail();
        $request->session()->flash('success', 'Message Updated');
        return redirect( route('adminmessages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AdminMessage $adminmessage
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(AdminMessage $adminmessage)
    {
        $adminmessage->delete();
        Session::flash('deleted', 'Message Deleted');
        return redirect(route('adminmessages.index'));
    }
}
