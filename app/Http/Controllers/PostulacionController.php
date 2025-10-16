<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use App\Http\Requests\StorePostulacionRequest;

class PostulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $postulaciones = Postulacion::with(['participante', 'vacante'])->paginate(10);
        return view('postulaciones.index', compact('postulaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostulacionRequest $request)
    {
        $data = $request->validated();

        $existe = Postulacion::where('participante_id', $data['participante_id'])
            ->where('vacante_id', $data['vacante_id'])
            ->exists();

        if ($existe) {
            return back()->with('error', 'Ya te has postulado a esta vacante.');
        }

        Postulacion::create($data);

        return back()->with('success', '¡Postulación registrada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Postulacion $postulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postulacion $postulacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postulacion $postulacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postulacion $postulacion)
    {
        //
    }
}
