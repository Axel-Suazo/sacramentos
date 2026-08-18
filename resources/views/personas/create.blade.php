@extends('layouts.app')
@section('title','Nueva persona')

@section('content')
<style>
  /* 🌸 Fondo con imagen y filtro cálido */
  body {
    background: 
      linear-gradient(rgba(255, 240, 250, 0.6), rgba(255, 255, 255, 0.8)),
      url("{{ asset('images/rosacato.jpeg') }}") no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
  }

  /* 🌷 Contenedor principal del formulario */
  .card {
    border: none;
    border-radius: 25px;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
    padding: 40px;
    backdrop-filter: blur(6px);
    transition: all 0.3s ease-in-out;
  }

  .card:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
  }

  /* 🩵 Encabezado */
  h3 {
    font-weight: 800;
    font-size: 2rem;
    color: #3b3b3b;
    text-shadow: 0 1px 2px rgba(255,255,255,0.7);
    display: flex;
    align-items: center;
    gap: 8px;
  }

  h3::before {
    content: "\f4da";
    font-family: "bootstrap-icons";
    color: #2d0671;
    font-size: 1.8rem;
  }

  /* ✍️ Campos del formulario */
  label {
    font-weight: 600;
    color: #444;
  }

  input.form-control, select.form-select, textarea.form-control {
    border-radius: 10px;
    border: 1px solid #ddd;
    transition: 0.2s;
    background-color: #fffdfd;
  }

  input.form-control:focus, select.form-select:focus, textarea.form-control:focus {
    border-color: #a678e2;
    box-shadow: 0 0 0 0.25rem rgba(226, 120, 178, 0.25);
  }

  /* 💖 Botones */
  .btn {
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 600;
    transition: 0.2s;
  }

 .btn-success {
  background-color: #43c4e7;
  border: none;
  box-shadow: 0 3px 10px rgba(25, 135, 84, 0.3);
  color: white;
}

.btn-success:hover {
  background-color: #2e9e1d;
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(25, 135, 84, 0.4);
}


  .btn-secondary {
    background: #ddd;
    color: #333;
    border: none;
  }

  .btn-secondary:hover {
    background: #ccc;
  }

  /* ✝️ Footer */
  footer {
    margin-top: 40px;
    text-align: center;
    color: #555;
    font-size: 0.95rem;
    font-weight: 500;
    background: rgba(255,255,255,0.8);
    border-top: 2px solid #eab0c4;
    border-radius: 12px 12px 0 0;
    padding: 15px;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
  }

  footer span {
    color: #e278b2;
    font-weight: 600;
  }
</style>

<div class="container my-5">
  <div class="card mx-auto col-lg-8 col-md-10">
    <h3 class="mb-4">Nueva persona</h3>
    <form action="{{ route('personas.store') }}" method="POST" class="mt-3">
      @csrf
      @include('personas.form')
    </form>
  </div>
</div>


@endsection
