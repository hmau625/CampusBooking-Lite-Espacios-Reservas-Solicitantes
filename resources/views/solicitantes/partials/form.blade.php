<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $solicitante->nombre) }}">
</div>

<div class="mb-3">
    <label class="form-label">Apellido</label>
    <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $solicitante->apellido) }}">
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $solicitante->email) }}">
</div>

<div class="mb-3">
    <label class="form-label">Teléfono</label>
    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $solicitante->telefono) }}">
</div>
