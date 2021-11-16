<?php

namespace App\Http\Controllers;

use App\Models\History_ownership;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.Transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function show(History_ownership $history_ownership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function edit(History_ownership $history_ownership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History_ownership $history_ownership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History_ownership  $history_ownership
     * @return \Illuminate\Http\Response
     */
    public function destroy(History_ownership $history_ownership)
    {
        //
    }
}
