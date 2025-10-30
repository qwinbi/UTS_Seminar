<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BincangKlasik - @yield('title')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Cormorant:wght@300;400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
    :root {
        --vintage-brown: #37342D;      /* Dark brown from 37342D */
        --cream: #EACEA7;               /* Cream from EACEA7 */
        --dark-green: #BB322C;          /* Dark red from BB322C */
        --pastel-pink: #DD5746;         /* Coral red from DD5746 */
        --pastel-blue: #BFA784;         /* Beige from BFA784 */
        --light-gold: #DD5746;          /* Using coral for accents */
        --route-accent: #BB322C;        /* Route 66 red */
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--cream);
        color: #333;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%2337342D' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    
    .vintage-header {
        font-family: 'Playfair Display', serif;
        color: var(--vintage-brown);
        font-weight: 700;
    }
    
    .vintage-card {
        background: white;
        border: 3px solid var(--vintage-brown);
        border-radius: 8px;
        box-shadow: 6px 6px 0px var(--pastel-pink);
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .vintage-card:hover {
        transform: translateY(-3px);
        box-shadow: 8px 8px 0px var(--dark-green);
    }
    
    .btn-vintage {
        background: var(--dark-green);
        color: white;
        border: 2px solid var(--vintage-brown);
        border-radius: 4px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-vintage:hover {
        background: var(--pastel-pink);
        color: var(--vintage-brown);
        transform: translateY(-2px);
        box-shadow: 3px 3px 0px var(--vintage-brown);
    }
    
    .btn-vintage-outline {
        background: transparent;
        color: var(--vintage-brown);
        border: 2px solid var(--vintage-brown);
        border-radius: 4px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-vintage-outline:hover {
        background: var(--pastel-blue);
        color: var(--vintage-brown);
        transform: translateY(-2px);
        box-shadow: 3px 3px 0px var(--vintage-brown);
    }
    
    .navbar-custom {
        background: linear-gradient(135deg, var(--dark-green), var(--pastel-pink));
        font-family: 'Cormorant', serif;
        box-shadow: 0 4px 12px rgba(55, 52, 45, 0.2);
        border-bottom: 3px solid var(--vintage-brown);
    }
    
    .footer-custom {
        background: var(--vintage-brown);
        color: var(--cream);
        border-top: 3px solid var(--pastel-pink);
        margin-top: auto;
    }
    
    .seminar-image {
        height: 200px;
        object-fit: cover;
        width: 100%;
        border-bottom: 3px solid var(--vintage-brown);
    }
    
    .profile-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border: 3px solid var(--vintage-brown);
        box-shadow: 4px 4px 0px var(--pastel-pink);
    }
    
    .stat-card {
        background: linear-gradient(135deg, var(--pastel-blue), var(--cream));
        border: 2px solid var(--vintage-brown);
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        color: var(--vintage-brown);
        box-shadow: 4px 4px 0px var(--pastel-pink);
    }
    
    .alert-vintage {
        background: var(--pastel-blue);
        border: 2px solid var(--vintage-brown);
        border-radius: 8px;
        color: var(--vintage-brown);
        box-shadow: 3px 3px 0px var(--pastel-pink);
    }
    
    /* Route 66 Inspired Elements */
    .route-badge {
        background: var(--route-accent);
        color: white;
        padding: 4px 12px;
        border-radius: 3px;
        font-weight: bold;
        font-size: 0.8em;
        border: 1px solid var(--vintage-brown);
    }
    
    .retro-border {
        border: 3px solid var(--vintage-brown);
        position: relative;
    }
    
    .retro-border::before {
        content: '';
        position: absolute;
        top: -6px;
        left: -6px;
        right: -6px;
        bottom: -6px;
        border: 2px solid var(--pastel-pink);
        z-index: -1;
    }
    
    /* Tree Shop Inspired Typography */
    .retro-title {
        font-family: 'Courier New', monospace;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--vintage-brown);
    }
    
    .retro-subtitle {
        font-family: 'Courier New', monospace;
        font-size: 0.9em;
        color: var(--dark-green);
        text-transform: uppercase;
    }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom" style="background: linear-gradient(135deg, var(--dark-green), var(--vintage-brown));">
    <div class="container">
        <a class="navbar-brand vintage-header" href="{{ route('home') }}" style="color: var(--cream) !important;">
            <h3 class="mb-0">🏛️ <strong>BINCANGKLASIK</strong></h3>
            <small class="retro-subtitle" style="color: var(--pastel-blue); font-size: 0.7em;">VINTAGE SEMINARS</small>
        </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">🏠 Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seminars') }}">📚 Seminar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">👤 Tentang</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">⚙️ Dashboard Admin</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('guest.dashboard') }}">📊 Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('guest.my-registrations') }}">📝 Pendaftaran Saya</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">🚪 Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">🔑 Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">📝 Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show vintage-card" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show vintage-card" role="alert">
                    ❌ {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-custom text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2024 BincangKlasik. Dibuat dengan ❤ oleh Syarifatul Azkiya Alganjari</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    
    @stack('scripts')
</body>
</html>