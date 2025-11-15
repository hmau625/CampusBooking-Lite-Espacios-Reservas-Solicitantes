<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use Illuminate\Http\Request;

class EspacioController extends Controller
{
    /**
     * Mostrar lista paginada de espacios.
     */
    public function index()
    {
        $espacios = Espacio::paginate(10);
        return view('espacios.index', compact('espacios'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('espacios.create');
    }

    /**
     * Guardar un nuevo espacio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'ubicacion' => 'required|string|max:255',
        ]);

        Espacio::create($request->all());

        return redirect()
            ->route('espacios.index')
            ->with('success', 'Espacio creado correctamente.');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(Espacio $espacio)
    {
        return view('espacios.edit', compact('espacio'));
    }

    /**
     * Actualizar un espacio existente.
     */
    public function update(Request $request, Espacio $espacio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'ubicacion' => 'required|string|max:255',
        ]);

        $espacio->update($request->all());

        return redirect()
            ->route('espacios.index')
            ->with('success', 'Espacio actualizado correctamente.');
    }

    /**
     * Eliminar un espacio.
     */
    public function destroy(Espacio $espacio)
    {
        $espacio->delete();

        return redirect()
            ->route('espacios.index')
            ->with('success', 'Espacio eliminado correctamente.');
    }
}