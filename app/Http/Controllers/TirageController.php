<?php

namespace App\Http\Controllers;

use App\Models\Choix;
use App\Models\Tirage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TirageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        Tirage::create([
            'tirage' => 'tirage',
        ]);

        return redirect()->back();
    }
    public function choix(Request $request)
    {
        $id         = Auth::user()->id;
        $session_id = $request->session_id;
        $choix      = $request->choix;

        Choix::create([
            'user_id'    => $id,
            'session_id' => $session_id,
            'choix'      => $choix,
        ]);
        return response()->json($session_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tirage  $tirage
     * @return \Illuminate\Http\Response
     */
    public function show(Tirage $tirage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tirage  $tirage
     * @return \Illuminate\Http\Response
     */
    public function edit(Tirage $tirage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tirage  $tirage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tirage $tirage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tirage  $tirage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tirage $tirage)
    {
        //
    }
}
