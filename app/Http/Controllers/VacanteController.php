<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use App\Models\Empresa;
use App\Http\Requests\StoreVacanteRequest;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacantes = Vacante::with('empresa')->paginate(10);
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::where('estado', 'activa')->get();
        return view('vacantes.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacanteRequest $request)
    {
        Vacante::create($request->validated());

        return redirect()
            ->route('vacantes.index')
            ->with('success', 'Vacante creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)
    {
        $vacante->load('empresa');
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacante $vacante)
    {
        //
    }
}
