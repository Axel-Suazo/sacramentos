<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Sacramentos')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #f6f8fb; }
    .navbar-brand { letter-spacing:.5px; font-weight:600; }
    .card { border: 0; box-shadow: 0 6px 18px rgba(0,0,0,.06); border-radius: 14px; }
    .btn { border-radius:10px; }
    .table thead th { font-weight:600; color:#344767; }
    footer { color:#6c757d; }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container-xl">
      <a class="navbar-brand" href="{{ url('/') }}"><i class="bi bi-journal-bookmark"></i> Sacramentos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topnav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="topnav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link {{ request()->is('personas*')?'active':'' }}" href="{{ route('personas.index') }}"><i class="bi bi-people"></i> Personas</a></li>
          {{-- Aquí luego agregamos Sacramentos, Certificados, etc. --}}
        </ul>
      </div>
    </div>
  </nav>

  <main class="container-xl py-4">
    {{-- Flash messages --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
        <div class="fw-semibold mb-1"><i class="bi bi-exclamation-triangle me-1"></i> Corrige los errores:</div>
        <ul class="mb-0">
          @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="py-4 text-center small">
    <div class="container-xl">Parroquia Nuestra Señora del Carmen – Sistema de Sacramentos</div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
