<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Http\Requests\StoreParticipanteRequest;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantes = Participante::paginate(10);
        return view('participantes.index', compact('participantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParticipanteRequest $request)
    {
        Participante::create($request->validated());

        return redirect()
            ->route('participantes.index')
            ->with('success', 'Participante creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        $edad = \Carbon\Carbon::parse($participante->fecha_nacimiento)->age;
        return view('participantes.show', compact('participante', 'edad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participante $participante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participante $participante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participante $participante)
    {
        //
    }
}
