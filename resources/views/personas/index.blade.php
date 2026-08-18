@extends('layouts.app')
@section('title','Personas')

@section('content')
<style>
  /* 🎨 Fondo con imagen cálida y filtro elegante */
  body {
    background: 
      linear-gradient(rgba(255, 245, 230, 0.75), rgba(255, 255, 255, 0.85)),
      url("{{ asset('images/rosario.jpeg') }}") no-repeat center center fixed;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  main {
    flex: 1;
  }

  /* 🩵 Tarjeta principal */
  .card {
    border: none;
    border-radius: 25px;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
    backdrop-filter: blur(6px);
  }

  .card:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
  }

  /* 📋 Tabla */
  .table {
    border-collapse: separate;
    border-spacing: 0 10px;
  }

  .table thead {
    background: linear-gradient(90deg, #4b6ef5, #637bff);
    color: white;
  }

  .table thead th {
    border: none;
    padding: 12px;
    font-weight: 600;
  }

  .table tbody tr {
    background: #ffffff;
    border-radius: 12px;
    transition: 0.2s ease-in-out;
  }

  .table tbody tr:hover {
    background-color: #f3f6ff;
    transform: scale(1.01);
  }

  /* ✨ Botones generales */
  .btn {
    border-radius: 8px;
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

  .btn-outline-danger:hover {
    background-color: #ff4d4d;
    color: #fff;
  }

  /* 🔍 Buscador */
  .input-group-text {
    border-radius: 8px 0 0 8px;
    background-color: #f7f9ff;
  }

  input.form-control {
    border-radius: 0 8px 8px 0;
  }

  /* 🔠 Título con ícono animado */
  h3 {
    font-weight: 800;
    font-size: 2rem;
    color: #2c2c2c;
    display: flex;
    align-items: center;
    gap: 10px;
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.7);
  }

  h3 i {
    color: #4b6ef5;
    font-size: 1.8rem;
    animation: glow 2s ease-in-out infinite alternate;
  }

  @keyframes glow {
    from { text-shadow: 0 0 5px #a3b1ff; }
    to { text-shadow: 0 0 15px #4b6ef5; }
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

  /* 🔒 Botón flotante de cerrar sesión */
  .logout-btn {
    position: fixed;
    top: 15px;
    right: 25px;
    z-index: 1100;
  }

  /* ✨ Estilo visual mejorado del botón */
  .logout-btn button {
    background: linear-gradient(135deg, #ff6b6b, #ff4b2b);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 50px;
    padding: 8px 18px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(255, 75, 43, 0.4);
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.35s ease;
    font-size: 0.9rem;
    letter-spacing: 0.3px;
  }

  .logout-btn button:hover {
    transform: translateY(-2px) scale(1.07);
    box-shadow: 0 6px 15px rgba(255, 75, 43, 0.55);
    background: linear-gradient(135deg, #ff4b2b, #ff7676);
  }

  .logout-btn i {
    font-size: 1rem;
    transition: transform 0.3s ease;
  }

  .logout-btn button:hover i {
    transform: rotate(-25deg);
  }

  /* 🧭 Espaciado menú superior */
  .navbar .nav-link {
    margin-right: 90px !important;
  }
</style>

<main class="container my-5">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h3><i class="bi bi-people-fill"></i> Personas registradas</h3>
    <a href="{{ route('personas.create') }}" class="btn btn-primary shadow-sm">
      <i class="bi bi-person-plus"></i> Nueva persona
    </a>
  </div>
  
  <!-- 🔒 Botón flotante de cerrar sesión -->
  @if(Auth::check())
    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="logout-btn">
      @csrf
      <button type="button" id="logoutBtn" title="Cerrar sesión">
        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
      </button>
    </form>
  @endif

  <!-- 📋 Tarjeta con tabla -->
  <div class="card p-4">
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-md-4">
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
          <input id="q" type="search" class="form-control" placeholder="Buscar por nombre, DNI o email…">
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead>
          <tr>
            <th>Nombre completo</th>
            <th>DNI</th>
            <th>Email</th>
            <th class="text-end">Acciones</th>
          </tr>
        </thead>
        <tbody id="rows">
          @forelse($personas->sortBy('nombres') as $p)
            <tr>
              <td>{{ $p->nombres }} {{ $p->apellidos }}</td>
              <td>{{ $p->documento_unico }}</td>
              <td>{{ $p->email }}</td>
              <td class="text-end">
                <a href="{{ route('personas.show', $p) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
                <a href="{{ route('personas.edit', $p) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                <form action="{{ route('personas.destroy',$p) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('¿Eliminar a {{ $p->nombres }}?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center text-muted py-4">Sin registros aún.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- ✅ SWEETALERT2 SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // 🔍 Filtro de búsqueda instantáneo
  const q = document.getElementById('q');
  const rows = [...document.querySelectorAll('#rows tr')];
  q?.addEventListener('input', e => {
    const v = e.target.value.toLowerCase();
    rows.forEach(tr => tr.style.display =
      tr.innerText.toLowerCase().includes(v) ? '' : 'none');
  });

  // 🔒 SweetAlert para confirmar cierre de sesión con bendición final
  const logoutBtn = document.getElementById('logoutBtn');
  const logoutForm = document.getElementById('logoutForm');

  logoutBtn?.addEventListener('click', () => {
    Swal.fire({
      title: '🔒 ¿Deseas cerrar sesión?',
      text: 'Tu sesión se cerrará de forma segura.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#ff4b2b',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Sí, salir',
      cancelButtonText: 'Cancelar',
      background: '#fff',
      backdrop: `rgba(0,0,0,0.4)`,
      customClass: { popup: 'rounded-4 shadow-lg' }
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: '👋 Adios',
          text: '¡Dios te bendiga y te acompañe siempre!',
          icon: 'success',
          confirmButtonColor: '#4b6ef5',
          background: '#fff',
          timer: 2000,
          showConfirmButton: false,
          willClose: () => {
            logoutForm.submit();
          }
        });
      }
    });
  });
</script>
@endsection
