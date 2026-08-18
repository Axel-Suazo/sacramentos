@extends('layouts.app') 
@section('title', 'Editar sacramento')

@section('content')

<style>
  /* 🎨 Fondo con imagen difuminada */
  body {
    background: 
      linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),
      url("{{ asset('images/edit.jpeg') }}") no-repeat center center fixed;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
  }

  /* 📦 Tarjeta principal */
  .card {
    border: none;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.93);
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease-in-out;
  }

  .card:hover {
    box-shadow: 0 8px 28px rgba(0,0,0,0.15);
  }

  /* 🧾 Títulos */
  h4 {
    font-weight: 700;
    color: #2c2c2c;
    text-shadow: 0 1px 1px rgba(255,255,255,0.7);
  }

  label {
    font-weight: 600;
    color: #333;
  }

  /* ✨ Inputs */
  input.form-control,
  select.form-select,
  textarea.form-control {
    border-radius: 10px;
    border: 1px solid #ccd4ff;
    padding: 10px;
    transition: 0.2s;
  }

  input:focus,
  select:focus,
  textarea:focus {
    border-color: #4b6ef5;
    box-shadow: 0 0 6px rgba(75,110,245,0.3);
  }

  /* 💾 Botones */
  .btn {
    border-radius: 10px;
    transition: all 0.2s ease;
  }

  .btn-success {
    background: linear-gradient(90deg, #28a745, #45c76e);
    border: none;
    box-shadow: 0 3px 10px rgba(40,167,69,0.3);
  }

  .btn-success:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(40,167,69,0.4);
  }

  .btn-secondary {
    background-color: #f0f0f0;
    border: none;
    color: #333;
  }

  .btn-secondary:hover {
    background-color: #e2e2e2;
  }

  .btn-outline-secondary {
    border-radius: 10px;
  }

  /* 👣 Footer fijo */
  html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  main {
    flex: 1;
  }

  footer {
    background: rgba(255,255,255,0.9);
    border-top: 2px solid #dcdcdc;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    font-size: 0.95rem;
    color: #444;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
    margin-top: auto;
  }

  footer span {
    color: #4b6ef5;
    font-weight: 700;
  }
</style>

<div class="d-flex align-items-center justify-content-between mb-3">
  <h4 class="mb-0"><i class="bi bi-pencil-square text-primary"></i> Editar sacramento de {{ $sacramento->persona->nombres }} {{ $sacramento->persona->apellidos }}</h4>
  <a href="{{ route('personas.show', $sacramento->persona) }}" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left-circle"></i> Volver
  </a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('sacramentos.update', $sacramento) }}" method="POST" id="sacramentoForm" class="row g-3">
      @csrf
      @method('PUT')

      <!-- Tipo de Sacramento -->
      <div class="col-md-6">
        <label for="sacramento_tipo_id" class="form-label">Tipo de sacramento</label>
        <select name="sacramento_tipo_id" id="sacramento_tipo_id" class="form-select" required>
          <option value="">Seleccione...</option>
          @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" data-nombre="{{ $tipo->nombre }}"
              {{ $tipo->id == $sacramento->sacramento_tipo_id ? 'selected' : '' }}>
              {{ $tipo->nombre }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Fecha -->
      <div class="col-md-6">
        <label for="fecha_sacramento" class="form-label">Fecha</label>
        <input 
          type="date" 
          name="fecha_sacramento" 
          id="fecha_sacramento" 
          class="form-control" 
          value="{{ old('fecha_sacramento', \Carbon\Carbon::parse($sacramento->fecha_sacramento)->format('Y-m-d')) }}" 
          required>
      </div>

      <!-- Campos dinámicos -->
      <div id="camposContainer" style="display: none;">
        <div class="col-md-6">
          <label for="lugar" class="form-label">Lugar</label>
          <input type="text" name="lugar" id="lugar" class="form-control" value="{{ old('lugar', $sacramento->lugar) }}">
        </div>

        <div class="col-md-6">
          <label for="parroquia" class="form-label">Parroquia</label>
          <input type="text" name="parroquia" id="parroquia" class="form-control" value="{{ old('parroquia', $sacramento->parroquia) }}">
        </div>

        <div class="col-md-6">
          <label for="padre" class="form-label">Nombre del Papá</label>
          <input type="text" name="padre" id="padre" class="form-control" value="{{ old('padre', $sacramento->padre) }}">
        </div>

        <div class="col-md-6">
          <label for="madre" class="form-label">Nombre de la Mamá</label>
          <input type="text" name="madre" id="madre" class="form-control" value="{{ old('madre', $sacramento->madre) }}">
        </div>

        <div class="col-md-6">
          <label for="padrino1" class="form-label">Padrino</label>
          <input type="text" name="padrino1" id="padrino1" class="form-control" value="{{ old('padrino1', $sacramento->padrino1) }}">
        </div>

        <div class="col-md-6">
          <label for="padrino2" class="form-label">Madrina</label>
          <input type="text" name="padrino2" id="padrino2" class="form-control" value="{{ old('padrino2', $sacramento->padrino2) }}">
        </div>

        <div class="col-md-6">
          <label for="ministro" class="form-label">Ministro</label>
          <input type="text" name="ministro" id="ministro" class="form-control" value="{{ old('ministro', $sacramento->ministro) }}">
        </div>

        <div class="col-md-4">
          <label for="libro" class="form-label">Libro N°</label>
          <input type="text" name="libro" id="libro" class="form-control" value="{{ old('libro', $sacramento->libro) }}">
        </div>

        <div class="col-md-4">
          <label for="folio" class="form-label">Folio N°</label>
          <input type="text" name="folio" id="folio" class="form-control" value="{{ old('folio', $sacramento->folio) }}">
        </div>

        <div class="col-md-4">
          <label for="partida" class="form-label">N°</label>
          <input type="text" name="partida" id="partida" class="form-control" value="{{ old('partida', $sacramento->partida) }}">
        </div>

        <!-- Campos de matrimonio -->
        <div id="camposMatrimonio" style="display: none;">
          <div class="col-md-6">
            <label for="conyuge1" class="form-label">Nombre del Cónyuge 1</label>
            <input type="text" name="conyuge1" id="conyuge1" class="form-control" value="{{ old('conyuge1', $sacramento->conyuge1 ?? '') }}">
          </div>

          <div class="col-md-6">
            <label for="conyuge2" class="form-label">Nombre del Cónyuge 2</label>
            <input type="text" name="conyuge2" id="conyuge2" class="form-control" value="{{ old('conyuge2', $sacramento->conyuge2 ?? '') }}">
          </div>
        </div>

        <div class="col-md-12">
          <label for="notas" class="form-label">Notas marginales</label>
          <textarea name="notas" id="notas" class="form-control" rows="2">{{ old('notas', $sacramento->notas) }}</textarea>
        </div>
      </div>

      <!-- Botones -->
      <div class="col-12 d-flex justify-content-start mt-3">
        <button class="btn btn-success me-2">
          <i class="bi bi-check-circle"></i> Actualizar
        </button>
        <a href="{{ route('personas.show', $sacramento->persona) }}" class="btn btn-secondary me-2">
          <i class="bi bi-x-circle"></i> Cancelar
        </a>
      </div>
    </form>
  </div>
</div>



{{-- Script dinámico --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tipoSelect = document.getElementById('sacramento_tipo_id');
  const camposContainer = document.getElementById('camposContainer');
  const camposMatrimonio = document.getElementById('camposMatrimonio');

  function toggleCampos() {
    const selectedOption = tipoSelect.options[tipoSelect.selectedIndex];
    const tipoNombre = selectedOption.getAttribute('data-nombre');

    if (tipoSelect.value) {
      camposContainer.style.display = 'flex';
      camposContainer.style.flexWrap = 'wrap';
    } else {
      camposContainer.style.display = 'none';
    }

    if (tipoNombre === 'Matrimonio') {
      camposMatrimonio.style.display = 'flex';
      camposMatrimonio.style.flexWrap = 'wrap';
    } else {
      camposMatrimonio.style.display = 'none';
    }
  }

  tipoSelect.addEventListener('change', toggleCampos);
  toggleCampos(); // Ejecutar al cargar
});
</script>

@endsection
