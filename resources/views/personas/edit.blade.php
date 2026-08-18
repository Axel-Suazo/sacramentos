@extends('layouts.app')
@section('title','Editar persona')

@section('content')

<style>
  /* 🎨 Fondo con imagen y filtro suave */
  body {
    background: 
      linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)),
      url("{{ asset('images/cato.jpeg') }}") no-repeat center center fixed;
    background-size: cover;
    backdrop-filter: blur(4px);
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
  }

  /* 🩵 Contenedor principal del formulario */
  .form-container {
    background: rgba(255, 255, 255, 0.93);
    border-radius: 20px;
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
    max-width: 850px;
    margin: 60px auto;
    padding: 40px;
    transition: 0.3s;
  }

  .form-container:hover {
    box-shadow: 0 8px 28px rgba(0,0,0,0.15);
  }

  /* 🔠 Título */
  h3 {
    font-weight: 700;
    color: #2c2c2c;
    text-align: center;
    margin-bottom: 25px;
    text-shadow: 0 1px 2px rgba(255,255,255,0.7);
  }

  /* 📋 Campos del formulario */
  label {
    font-weight: 600;
    color: #333;
  }

  input.form-control, textarea.form-control {
    border-radius: 10px;
    border: 1px solid #ccd4ff;
    padding: 10px;
    transition: all 0.2s;
  }

  input.form-control:focus, textarea.form-control:focus {
    border-color: #4b6ef5;
    box-shadow: 0 0 6px rgba(75,110,245,0.3);
  }

  /* ✨ Botones */
  .btn {
    border-radius: 10px;
    padding: 10px 20px;
    transition: 0.2s;
  }

  .btn-primary {
    background: linear-gradient(90deg, #4b6ef5, #637bff);
    border: none;
    box-shadow: 0 3px 10px rgba(75,110,245,0.3);
  }

  .btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(75,110,245,0.4);
  }

  .btn-secondary {
    background: #f0f0f0;
    color: #333;
  }

  .btn-secondary:hover {
    background: #e2e2e2;
  }

  /* 🚨 Mensajes de error */
  .alert-danger {
    border-radius: 10px;
    background: rgba(255, 235, 235, 0.9);
    color: #b10000;
    font-weight: 500;
  }

  /* 👣 Footer fijo */
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

<div class="form-container">
  <h3><i class="bi bi-person-gear"></i> Editar persona</h3>

  {{-- Mostrar errores de validación --}}
  @if ($errors->any())
    <div class="alert alert-danger mb-4">
      <strong>Por favor corrige los siguientes errores:</strong>
      <ul class="mt-2 mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('personas.update', $persona) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')
    @include('personas.form', ['persona'=>$persona])

    

@endsection
