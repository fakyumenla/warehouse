<?php

namespace App\Http\Controllers;

use App\Models\Transaction_owner;
use Illuminate\Http\Request;

class TransactionsController extends Controller
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
     * @param  \App\Models\Transaction_owner  $transaction_owner
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction_owner $transaction_owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction_owner  $transaction_owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction_owner $transaction_owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction_owner  $transaction_owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction_owner $transaction_owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction_owner  $transaction_owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction_owner $transaction_owner)
    {
        //
    }
}
