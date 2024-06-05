<?php

namespace App\Http\Controllers;

use App\Models\RegistroTiempo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistroTiemposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user)
    {
        RegistroTiempo::create([
            'user_id' => $user,
            'clases_totales' => 0,
            'clases_45' => 0,
            'clases_60' => 0,
            'clases_120' => 0,
            'minutos_totales' => 0,
            'clases_disfrutadas' => 0,
            'tiempo_disfrutado' => 0,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistroTiempo $registroTiempo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroTiempo $registroTiempo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroTiempo $registroTiempo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroTiempo $registroTiempo)
    {
        //
    }
}
