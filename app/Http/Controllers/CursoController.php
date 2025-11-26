<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::latest()->get();

        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCursoRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['titulo']);

        cursos::create($data);

        return redirect()->route('dashboard')->with('success', 'Curso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cursos $cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cursos $cursos)
    {
        // Elimina el curso de la base de datos.
        $cursos->delete();

        // Redirige a la vista de administración con un mensaje de éxito.
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
