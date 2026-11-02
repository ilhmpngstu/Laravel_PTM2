<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projects')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #ffffff;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background-color: #0d6efd;
            padding: 12px 0;
        }

        .navbar-custom .navbar-brand {
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.85);
            font-size: 14px;
            padding: 8px 14px;
            transition: color 0.2s;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #ffffff;
            font-weight: 500;
        }

        .project-card {
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
        }

        .project-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .project-img-wrapper {
            height: 190px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        .project-img-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- Top Blue Navbar (Matching Video Frontend) -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                MyProfile
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#frontendNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="frontendNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/projects') }}" class="nav-link {{ request()->is('projects*') || request()->is('project*') ? 'active' : '' }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about*') ? 'active' : '' }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ url('/admin/projects') }}" class="nav-link text-warning fw-semibold">
                            Admin Panel
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4 text-center text-muted small border-top mt-auto">
        &copy; {{ date('Y') }} MyProfile. All rights reserved.
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
