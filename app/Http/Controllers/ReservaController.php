<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\Solicitante;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['espacio', 'solicitante'])->paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $espacios = Espacio::all();
        $solicitantes = Solicitante::all();
        $reserva = new Reserva();

        return view('reservas.create', compact('espacios', 'solicitantes', 'reserva'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'espacio_id' => 'required',
            'solicitante_id' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'estado' => 'required'
        ]);

        // Validación de solapamiento
        $hora_inicio = Carbon::parse($request->hora_inicio);
        $hora_fin = Carbon::parse($request->hora_fin);

        $conflicto = Reserva::where('espacio_id', $request->espacio_id)
            ->where('fecha', $request->fecha)
            ->where(function($query) use ($hora_inicio, $hora_fin) {
                $query->whereBetween('hora_inicio', [$hora_inicio, $hora_fin])
                      ->orWhereBetween('hora_fin', [$hora_inicio, $hora_fin])
                      ->orWhere(function($q) use ($hora_inicio, $hora_fin) {
                          $q->where('hora_inicio', '<=', $hora_inicio)
                            ->where('hora_fin', '>=', $hora_fin);
                      });
            })->exists();

        if ($conflicto) {
            return back()->with('error', 'Este espacio ya está reservado en ese horario.');
        }

        Reserva::create($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva creada correctamente.');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $espacios = Espacio::all();
        $solicitantes = Solicitante::all();

        return view('reservas.edit', compact('reserva', 'espacios', 'solicitantes'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'espacio_id' => 'required',
            'solicitante_id' => 'required',
            'fecha' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'estado' => 'required'
        ]);

        // Validación de solapamiento, excluyendo la reserva actual
        $hora_inicio = Carbon::parse($request->hora_inicio);
        $hora_fin = Carbon::parse($request->hora_fin);

        $conflicto = Reserva::where('espacio_id', $request->espacio_id)
            ->where('fecha', $request->fecha)
            ->where('id', '<>', $reserva->id) // excluye la reserva actual
            ->where(function($query) use ($hora_inicio, $hora_fin) {
                $query->whereBetween('hora_inicio', [$hora_inicio, $hora_fin])
                      ->orWhereBetween('hora_fin', [$hora_inicio, $hora_fin])
                      ->orWhere(function($q) use ($hora_inicio, $hora_fin) {
                          $q->where('hora_inicio', '<=', $hora_inicio)
                            ->where('hora_fin', '>=', $hora_fin);
                      });
            })->exists();

        if ($conflicto) {
            return back()->with('error', 'Este espacio ya está reservado en ese horario.');
        }

        $reserva->update($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva actualizada.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva eliminada.');
    }
}
