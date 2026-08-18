@extends('layouts.app') 
@section('title','Detalle de persona')

@section('content')

<style>
  /* 🎨 Fondo con imagen difuminada */
  body {
  background: 
    linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
    url("{{ asset('images/sacra.jpeg') }}") no-repeat center center fixed;
  background-size: cover;
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

/* Mantiene el contenido centrado y el footer abajo */
main {
  flex: 1;
}

  /* 🩶 Tarjetas */
  .card {
    border: none;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.93);
    box-shadow: 0 6px 25px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
  }

  /* 🧾 Títulos */
  h3 {
    font-weight: 700;
    color: #2b2b2b;
    text-shadow: 0 1px 1px rgba(255,255,255,0.8);
  }

  h5 {
    font-weight: 600;
    color: #3a3a3a;
  }

  /* 📋 Tabla */
  .table thead {
    background: linear-gradient(90deg, #4b6ef5, #6f8bff);
    color: white;
    border-radius: 10px;
  }

  .table thead th {
    border: none;
    padding: 12px;
  }

  .table tbody tr {
    background-color: #ffffff;
    transition: all 0.2s ease-in-out;
  }

  .table tbody tr:hover {
    background-color: #f3f6ff;
    transform: scale(1.01);
  }

  /* ✨ Botones */
  .btn {
    border-radius: 8px;
    transition: 0.2s;
  }

  .btn-outline-secondary:hover {
    background: #e7ebff;
  }

  .btn-primary {
    background: linear-gradient(90deg, #4b6ef5, #637bff);
    border: none;
  }

  .btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(75,110,245,0.3);
  }

  .btn-success {
    background: linear-gradient(90deg, #34c759, #60d97a);
    border: none;
  }

  .btn-success:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(52,199,89,0.3);
  }

  .btn-outline-danger:hover {
    background-color: #ff4d4d;
    color: #fff;
  }

  /* 👣 Footer */
  footer {
    background: rgba(255,255,255,0.9);
    border-top: 2px solid #dcdcdc;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    font-size: 0.95rem;
    color: #444;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
    position: relative;
  }

  footer span {
    color: #4b6ef5;
    font-weight: 700;
  }
</style>

<div class="d-flex align-items-center justify-content-between mb-4">
  <h3 class="mb-0"><i class="bi bi-person-badge"></i> {{ $persona->nombres }} {{ $persona->apellidos }}</h3>
  <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left-circle"></i> Volver
  </a>
</div>

{{-- 🪪 Datos personales --}}
<div class="card shadow-sm mb-4">
  <div class="card-body">
    <h5 class="card-title mb-3"><i class="bi bi-person-lines-fill text-primary"></i> Datos personales</h5>
    <div class="row g-3">
      <div class="col-md-6"><strong>DNI:</strong> {{ $persona->documento_unico ?? '—' }}</div>
      <div class="col-md-6"><strong>Fecha de nacimiento:</strong> {{ $persona->fecha_nacimiento ?? '—' }}</div>
      <div class="col-md-6"><strong>Lugar de nacimiento:</strong> {{ $persona->lugar_nacimiento ?? '—' }}</div>
      <div class="col-md-6"><strong>Teléfono:</strong> {{ $persona->telefono ?? '—' }}</div>
      <div class="col-md-6"><strong>Email:</strong> {{ $persona->email ?? '—' }}</div>
      <div class="col-md-12"><strong>Dirección:</strong> {{ $persona->direccion ?? '—' }}</div>
    </div>
  </div>
</div>

{{-- ✝️ Tabla de sacramentos --}}
<div class="card shadow-sm">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="card-title mb-0"><i class="bi bi-book text-primary"></i> Sacramentos</h5>
      <div>
        <a href="{{ route('personas.exportWord', $persona) }}" class="btn btn-success me-2">
          <i class="bi bi-file-earmark-word"></i> Descargar constancia general
        </a>
        <a href="{{ route('personas.sacramentos.create', $persona) }}" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Agregar sacramento
        </a>
      </div>
    </div>

    @if($persona->sacramentos->isEmpty())
      <p class="text-muted fst-italic">No tiene sacramentos registrados.</p>
    @else
      <div class="table-responsive">
        <table class="table align-middle text-center">
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Fecha</th>
              <th>Iglesia</th>
              <th class="text-end">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($persona->sacramentos as $s)
              <tr>
                <td>{{ $s->tipo?->nombre ?? '—' }}</td>
                <td>{{ \Carbon\Carbon::parse($s->fecha_sacramento)->format('d/m/Y') }}</td>
                <td>{{ $s->parroquia ?? '—' }}</td>
                <td class="text-end">

                  {{-- 📜 BOTÓN AUTOMÁTICO PARA CADA TIPO DE SACRAMENTO --}}
                  @if($s->tipo?->nombre === 'Bautismo')
                    <a href="{{ route('sacramentos.constancia.bautismo', $s->id) }}" class="btn btn-sm btn-outline-success" title="Constancia de Bautismo">
                      <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                  @elseif($s->tipo?->nombre === 'Confirmación')
                    <a href="{{ route('sacramentos.constancia.confirmacion', $s->id) }}" class="btn btn-sm btn-outline-success" title="Constancia de Confirmación">
                      <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                  @elseif($s->tipo?->nombre === 'Primera Comunión')
                    <a href="{{ route('sacramentos.constancia.comunion', $s->id) }}" class="btn btn-sm btn-outline-success" title="Constancia de Primera Comunión">
                      <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                  @elseif($s->tipo?->nombre === 'Matrimonio')
                    <a href="{{ route('sacramentos.constancia.matrimonio', $s->id) }}" class="btn btn-sm btn-outline-success" title="Constancia de Matrimonio">
                      <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                  @endif

                  {{-- ✏️ Botón editar --}}
                  <a href="{{ route('sacramentos.edit', $s) }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-pencil"></i>
                  </a>

                  {{-- 🗑️ Botón eliminar --}}
                  <form action="{{ route('sacramentos.destroy', $s) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este sacramento?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </form>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</div>
@endsection
