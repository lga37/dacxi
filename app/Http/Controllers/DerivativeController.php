<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDerivativeRequest;
use App\Http\Requests\UpdateDerivativeRequest;
use App\Models\Derivative;
use Illuminate\Http\Request;

class DerivativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $derivatives = Derivative::simplepaginate(10);
        return view('derivatives',compact('derivatives'));

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
     * @param  \App\Http\Requests\StoreDerivativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDerivativeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Derivative  $derivative
     * @return \Illuminate\Http\Response
     */
    public function show(Derivative $derivative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Derivative  $derivative
     * @return \Illuminate\Http\Response
     */
    public function edit(Derivative $derivative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDerivativeRequest  $request
     * @param  \App\Models\Derivative  $derivative
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDerivativeRequest $request, Derivative $derivative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Derivative  $derivative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Derivative $derivative)
    {
        //
    }
}
