<div class="mb-3">
    <label class="form-label">Espacio</label>
    <select name="espacio_id" class="form-control">
        @foreach ($espacios as $e)
            <option value="{{ $e->id }}" 
                @selected(old('espacio_id', $reserva->espacio_id) == $e->id)>
                {{ $e->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Solicitante</label>
    <select name="solicitante_id" class="form-control">
        @foreach ($solicitantes as $s)
            <option value="{{ $s->id }}"
                @selected(old('solicitante_id', $reserva->solicitante_id) == $s->id)>
                {{ $s->nombre }} {{ $s->apellido }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Fecha</label>
    <input type="date" name="fecha" class="form-control"
           value="{{ old('fecha', $reserva->fecha) }}">
</div>

<div class="mb-3">
    <label class="form-label">Hora Inicio</label>
    <input type="time" name="hora_inicio" class="form-control"
           value="{{ old('hora_inicio', $reserva->hora_inicio) }}">
</div>

<div class="mb-3">
    <label class="form-label">Hora Fin</label>
    <input type="time" name="hora_fin" class="form-control"
           value="{{ old('hora_fin', $reserva->hora_fin) }}">
</div>

<div class="mb-3">
    <label class="form-label">Estado</label>
    <select name="estado" class="form-control">
        @foreach (['pendiente','confirmada','cancelada'] as $estado)
            <option value="{{ $estado }}"
                @selected(old('estado', $reserva->estado) == $estado)>
                {{ ucfirst($estado) }}
            </option>
        @endforeach
    </select>
</div>
