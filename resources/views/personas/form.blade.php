@php($p = $persona ?? null)
<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror"
                 id="nombres" placeholder="Nombres" value="{{ old('nombres', $p->nombres ?? '') }}">
          <label for="nombres">Nombres</label>
          @error('nombres') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror"
                 id="apellidos" placeholder="Apellidos" value="{{ old('apellidos', $p->apellidos ?? '') }}">
          <label for="apellidos">Apellidos</label>
          @error('apellidos') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating">
          <input type="text" name="documento_unico" class="form-control @error('documento_unico') is-invalid @enderror"
                 id="dui" placeholder="DUI" value="{{ old('documento_unico', $p->documento_unico ?? '') }}">
          <label for="dui">DNI</label>
          @error('documento_unico') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating">
          <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                 id="fnac" placeholder="Fecha nacimiento" value="{{ old('fecha_nacimiento', $p->fecha_nacimiento ?? '') }}">
          <label for="fnac">Fecha nacimiento</label>
          @error('fecha_nacimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating">
          <input type="text" name="lugar_nacimiento" class="form-control @error('lugar_nacimiento') is-invalid @enderror"
                 id="lnac" placeholder="Lugar nacimiento" value="{{ old('lugar_nacimiento', $p->lugar_nacimiento ?? '') }}">
          <label for="lnac">Lugar nacimiento</label>
          @error('lugar_nacimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating">
          <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                 id="tel" placeholder="Teléfono" value="{{ old('telefono', $p->telefono ?? '') }}">
          <label for="tel">Teléfono</label>
          @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 id="email" placeholder="Email" value="{{ old('email', $p->email ?? '') }}">
          <label for="email">Email</label>
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-floating">
          <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                 id="dir" placeholder="Dirección" value="{{ old('direccion', $p->direccion ?? '') }}">
          <label for="dir">Dirección</label>
          @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer bg-white d-flex gap-2">
    <button class="btn btn-success"><i class="bi bi-check2-circle"></i> Guardar</button>
    <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</div>
