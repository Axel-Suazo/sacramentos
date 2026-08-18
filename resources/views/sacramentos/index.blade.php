@extends('layouts.app')

@section('title','Editar sacramento')

@section('content')
<h4>Editar sacramento</h4>

<form action="{{ route('sacramentos.update', $sacramento) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label class="form-label">Tipo</label>
    <select name="sacramento_tipo_id" class="form-select">
      @foreach($tipos as $t)
        <option value="{{ $t->id }}" @selected($sacramento->sacramento_tipo_id == $t->id)>
          {{ $t->nombre }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Fecha</label>
    <input type="date" name="fecha_sacramento" class="form-control"
           value="{{ $sacramento->fecha_sacramento }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Lugar</label>
    <input type="text" name="lugar" class="form-control" value="{{ $sacramento->lugar }}">
  </div>

  <button class="btn btn-success">Actualizar</button>
  <a href="{{ route('personas.show', $sacramento->persona_id) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
