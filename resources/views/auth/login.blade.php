@extends('layouts.app')
@section('title', 'Iniciar sesión')

@section('content')
<style>
  /* 🌄 Fondo con iluminación cálida */
  body {
    background: radial-gradient(
        circle at center,
        rgba(255, 230, 180, 0.35) 0%,   
        rgba(255, 255, 255, 0.05) 35%,  
        rgba(240, 240, 240, 0.4) 100%   
      ),
      url("{{ asset('images/virgen_hd.jpeg') }}") no-repeat center top;
    background-size: 33%;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-color: #f6f6f6;
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
  }

  /* ✨ Resplandor dorado suave */
  body::before {
    content: "";
    position: fixed;
    inset: 0;
    background: radial-gradient(
      circle at center,
      rgba(255, 215, 100, 0.15) 0%,
      rgba(255, 255, 255, 0.05) 70%,
      rgba(0,0,0,0.1) 100%
    );
    z-index: 0;
  }

  /* 🩵 Cuadro flotante estilo vidrio */
  .login-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 420px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(8px);
    border-radius: 20px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.35);
    padding: 40px 40px 30px;
    text-align: center;
    animation: fadeIn 1s ease;
    z-index: 1;
  }

  @keyframes fadeIn {
    from {opacity: 0; transform: translate(-50%, -45%);}
    to {opacity: 1; transform: translate(-50%, -50%);}
  }

  /* 🕊️ Logo */
  .logo-parroquia {
    width: 75px;
    height: auto;
    margin-bottom: 10px;
    filter: drop-shadow(0 4px 6px rgba(0,0,0,0.25));
  }

  /* 🕊️ Encabezado */
  .login-header h2 {
    font-weight: 800;
    color: #2b2b2b;
    margin-bottom: 5px;
    font-size: 1.3rem;
  }

  .login-header p {
    color: #4b6ef5;
    font-weight: 500;
    margin-bottom: 20px;
    font-size: 0.95rem;
  }

  .login-container h3 {
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
    font-size: 1.2rem;
  }

  .login-container h3::before {
    content: "\f333";
    font-family: "bootstrap-icons";
    color: #4b6ef5;
    margin-right: 8px;
    font-size: 1.3rem;
  }

  /* ✏️ Campos */
  .form-control {
    border-radius: 10px;
    border: 1px solid #ccc;
    margin-bottom: 15px;
    padding: 10px;
  }

  .form-control:focus {
    border-color: #4b6ef5;
    box-shadow: 0 0 0 0.2rem rgba(75,110,245,0.25);
  }

  /* 👁️ Campo de contraseña con botón de mostrar/ocultar */
  .password-wrapper {
    position: relative;
  }

  .toggle-password {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #555;
    cursor: pointer;
    font-size: 1.1rem;
    transition: color 0.3s ease;
  }

  .toggle-password:hover {
    color: #4b6ef5;
  }

  /* 🔘 Botón */
  .btn-login {
    background: linear-gradient(90deg, #4b6ef5, #637bff);
    border: none;
    border-radius: 10px;
    color: #fff;
    font-weight: 600;
    width: 100%;
    padding: 10px;
    transition: 0.3s;
  }

  .btn-login:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(75,110,245,0.4);
  }

  /* ⚠️ Error */
  .alert-danger {
    border-radius: 10px;
    text-align: left;
  }

  /* 📜 Footer actualizado */
  footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    text-align: center;
    background: rgba(255,255,255,0.8);
    padding: 10px;
    color: #333;
    font-weight: 500;
    font-size: 0.9rem;
    border-top: 1px solid #ddd;
  }

  footer span {
    color: #4b6ef5;
    font-weight: 600;
  }
</style>

<div class="login-container shadow-lg">
  <div class="login-header">
    <img src="{{ asset('images/escudo.jpeg') }}" alt="Escudo Parroquia" class="logo-parroquia">
    <h2>Parroquia Nuestra Señora del Carmen</h2>
    <p>Sistema de Sacramentos</p>
  </div>

  <h3>Iniciar sesión</h3>

  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('login.attempt') }}">
    @csrf
    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>

    <div class="password-wrapper">
      <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
      <button type="button" id="togglePassword" class="toggle-password" title="Mostrar u ocultar contraseña">
        <i class="bi bi-eye"></i>
      </button>
    </div>

    <button class="btn-login mt-2">Entrar</button>
  </form>
</div>


<script>
  // 👁️ Alternar visibilidad de contraseña
  const passwordInput = document.getElementById('password');
  const togglePassword = document.getElementById('togglePassword');
  togglePassword.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
  });
</script>
@endsection
