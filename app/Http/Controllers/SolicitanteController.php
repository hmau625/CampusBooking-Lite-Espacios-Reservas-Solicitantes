<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function index()
{
    $solicitantes = Solicitante::paginate(10); // 10 por página
    return view('solicitantes.index', compact('solicitantes'));
}

    public function create()
    {
        $solicitante = new Solicitante();
        return view('solicitantes.create', compact('solicitante'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:solicitantes,email',
            'telefono' => 'nullable'
        ]);

        Solicitante::create($request->all());

        return redirect()->route('solicitantes.index')
                ->with('success', 'Solicitante creado correctamente.');
    }

    public function show(Solicitante $solicitante)
    {
        return view('solicitantes.show', compact('solicitante'));
    }

    public function edit(Solicitante $solicitante)
    {
        return view('solicitantes.edit', compact('solicitante'));
    }

    public function update(Request $request, Solicitante $solicitante)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:solicitantes,email,' . $solicitante->id,
            'telefono' => 'nullable'
        ]);

        $solicitante->update($request->all());

        return redirect()->route('solicitantes.index')
                ->with('success', 'Solicitante actualizado correctamente.');
    }

    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete();

        return redirect()->route('solicitantes.index')
                ->with('success', 'Solicitante eliminado correctamente.');
    }
}
