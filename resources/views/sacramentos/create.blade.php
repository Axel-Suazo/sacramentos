@extends('layouts.app')

@section('title', 'Agregar sacramento')

@section('content')

<style>
  /* 🎨 Fondo elegante */
  body {
    background: 
      linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),
      url("{{ asset('images/sacrament.jpeg') }}") no-repeat center center fixed;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
  }

  /* 📦 Contenedor */
  .card {
    border: none;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
    transition: 0.3s ease;
    padding: 25px;
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
    padding: 10px 12px;
    transition: 0.2s;
    margin-bottom: 8px;
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

  .form-row {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
  }

  .form-group {
    flex: 1;
    min-width: 250px;
  }

</style>

<div class="d-flex align-items-center justify-content-between mb-4">
  <h4 class="mb-0"><i class="bi bi-bookmark-plus text-primary"></i> Registrar sacramento de {{ $persona->nombres }} {{ $persona->apellidos }}</h4>
  <a href="{{ route('personas.show', $persona) }}" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left-circle"></i> Volver
  </a>
</div>

<div class="card shadow-sm">
  <form action="{{ route('personas.sacramentos.store', $persona) }}" method="POST" id="sacramentoForm">
    @csrf

    <div class="form-row">
      <div class="form-group">
        <label for="sacramento_tipo_id" class="form-label">Tipo de sacramento</label>
        <select name="sacramento_tipo_id" id="sacramento_tipo_id" class="form-select" required>
          <option value="">Seleccione...</option>
          @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" data-nombre="{{ $tipo->nombre }}">
              {{ $tipo->nombre }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="fecha_sacramento" class="form-label">Fecha</label>
        <input type="date" name="fecha_sacramento" id="fecha_sacramento" class="form-control" required>
      </div>
    </div>

    <div id="camposContainer" style="display: none; margin-top: 15px;">
      <div class="form-row">
        <div class="form-group">
          <label for="lugar" class="form-label">Lugar</label>
          <input type="text" name="lugar" id="lugar" class="form-control">
        </div>

        <div class="form-group">
          <label for="parroquia" class="form-label">Parroquia</label>
          <input type="text" name="parroquia" id="parroquia" class="form-control">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="padre" class="form-label">Nombre del Papá</label>
          <input type="text" name="padre" id="padre" class="form-control">
        </div>

        <div class="form-group">
          <label for="madre" class="form-label">Nombre de la Mamá</label>
          <input type="text" name="madre" id="madre" class="form-control">
        </div>
      </div>

      <div class="form-row padrinos-row">
        <div class="form-group">
          <label for="padrino1" class="form-label">Padrino</label>
          <input type="text" name="padrino1" id="padrino1" class="form-control">
        </div>

        <div class="form-group">
          <label for="padrino2" class="form-label">Madrina</label>
          <input type="text" name="padrino2" id="padrino2" class="form-control">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="ministro" class="form-label">Ministro</label>
          <input type="text" name="ministro" id="ministro" class="form-control">
        </div>

        <div class="form-group">
          <label for="libro" class="form-label">Libro N°</label>
          <input type="text" name="libro" id="libro" class="form-control">
        </div>

        <div class="form-group">
          <label for="folio" class="form-label">Folio N°</label>
          <input type="text" name="folio" id="folio" class="form-control">
        </div>

        <div class="form-group">
          <label for="partida" class="form-label">N°</label>
          <input type="text" name="partida" id="partida" class="form-control">
        </div>
      </div>

      <!-- Campos de matrimonio -->
      <div id="camposMatrimonio" style="display: none; margin-top: 10px;">
        <div class="form-row">
          <div class="form-group">
            <label for="conyuge1" class="form-label">Nombre del Cónyuge 1</label>
            <input type="text" name="conyuge1" id="conyuge1" class="form-control">
          </div>

          <div class="form-group">
            <label for="conyuge2" class="form-label">Nombre del Cónyuge 2</label>
            <input type="text" name="conyuge2" id="conyuge2" class="form-control">
          </div>
        </div>
      </div>

      <div class="form-group" style="margin-top: 10px;">
        <label for="notas" class="form-label">Notas marginales</label>
        <textarea name="notas" id="notas" class="form-control" rows="2"></textarea>
      </div>
    </div>

    <div class="d-flex justify-content-start mt-3">
      <button class="btn btn-success me-2">
        <i class="bi bi-check-circle"></i> Guardar
      </button>
      <a href="{{ route('personas.show', $persona) }}" class="btn btn-secondary">
        <i class="bi bi-x-circle"></i> Cancelar
      </a>
    </div>
  </form>
</div>

{{-- Script dinámico --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tipoSelect = document.getElementById('sacramento_tipo_id');
  const camposContainer = document.getElementById('camposContainer');
  const camposMatrimonio = document.getElementById('camposMatrimonio');
  const padrinosRow = document.querySelector('.padrinos-row');

  tipoSelect.addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    const tipoNombre = selectedOption.getAttribute('data-nombre');

    if (this.value) {
      camposContainer.style.display = 'block';
    } else {
      camposContainer.style.display = 'none';
    }

    // 💍 Mostrar campos de matrimonio
    if (tipoNombre === 'Matrimonio') {
      camposMatrimonio.style.display = 'block';
      padrinosRow.style.display = 'flex';
    } 
    // ✝️ Ocultar padrinos en Primera Comunión
    else if (tipoNombre === 'Primera Comunión') {
      camposMatrimonio.style.display = 'none';
      padrinosRow.style.display = 'none';
    } 
    // 🔹 Cualquier otro sacramento
    else {
      camposMatrimonio.style.display = 'none';
      padrinosRow.style.display = 'flex';
    }
  });
});
</script>

@endsection
