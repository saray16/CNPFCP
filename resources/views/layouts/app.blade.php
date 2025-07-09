<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CNPFCP')</title>
    
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
   
    <!-- En layouts/app.blade.php dentro del <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
    <!-- Fuente Poppins desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-book-half"></i>CNPFCP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('historia') ? 'active' : '' }}" href="{{ url('historia') }}">Quiénes Somos</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <span class="nav-link">Bienvenido, {{ Auth::user()->name }}</span>
                        </li>
                        @if (Auth::user()->rol === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin') }}">Panel Admin</a>
                            </li>
                             @elseif (Auth::user()->rol === 'facilitador')
                             <li class="nav-item">
                                    <a class="nav-link" href="{{ url('facilitador/dashboard') }}">Panel Facilitador</a>
                             </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('usuario') }}">Mi Panel</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registro') }}">Registrarse</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>





    <main class="py-4">
        @yield('content')
    </main>
    
     <!-- Footer con logo -->
     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="#">
                        <img src="cenamec.jpeg" alt="Logo CENAMEC" class="footer-logo">
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Dirección</h5>
                    <ul class="footer-links">
                        <li>Parroquia Altagracia, Esquina de Salas, Edificio</li>
                        <li>Sede MPPE - piso 5 Zona Postal 1010, Municipio</li>
                        <li>Libertador Caracas-Venezuela</li>
                        <li>RIF: G-200087854</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contacto</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-telephone"></i> +58 212 5638244</li>
                        <li><i class="bi bi-telephone"></i> +58 212 5648030</li>
                        <li><i class="bi bi-telephone"></i> +58 212 5640232</li>
                        <li><i class="bi bi-envelope"></i> @fundacioncenamec</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Redes Sociales</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-twitter"></i> @CenamecFormaeInforma</li>
                        <li><i class="bi bi-twitter"></i> @Funda_cenamec1</li>
                        <li><i class="bi bi-facebook"></i> @FundacionCename</li>
                        <li><i class="bi bi-instagram"></i> @FundaCenamec</li>
                    </ul>
                </div>
                    
                </div>
                <div class="copyright text-center">
                    <p>© <?= date('Y') ?> CENAMEC. Todos los derechos reservados</p>
                </div>
        </div>
    </footer>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Éxito</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage"></div>
    </div>
</div>

    <!-- Bootstrap JS (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    @yield('script')
   
</body>
</html>
