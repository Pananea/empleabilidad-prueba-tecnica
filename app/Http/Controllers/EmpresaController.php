<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::select('id', 'nit', 'nombre_empresa', 'email', 'ciudad', 'estado')
            ->paginate(10);

        return view('empresas.index', compact('empresas'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        Empresa::create($request->validated());

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        $vacantes = $empresa->vacantes()
            ->select('id', 'titulo', 'descripcion', 'salario', 'ubicacion', 'estado')
            ->get();

        return view('empresas.show', compact('empresa', 'vacantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
