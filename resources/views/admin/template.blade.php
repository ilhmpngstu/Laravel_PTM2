<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Web Profile')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Yellow Navbar (Khas UNPAM) */
        .top-navbar {
            background-color: #f7b928;
            padding: 10px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .unpam-logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .unpam-title-sub {
            font-size: 11px;
            font-weight: 700;
            color: #0b3954;
            letter-spacing: 0.5px;
            line-height: 1.1;
        }

        .unpam-title-main {
            font-size: 18px;
            font-weight: 900;
            color: #0b3954;
            letter-spacing: 0.5px;
            line-height: 1.1;
        }

        .top-nav-links a {
            color: #fff9e6;
            font-weight: 400;
            font-size: 14px;
            text-decoration: none;
            margin-left: 18px;
            transition: color 0.2s ease;
        }

        .top-nav-links a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Layout Admin */
        .admin-wrapper {
            display: flex;
            flex: 1;
        }

        .admin-sidebar {
            width: 220px;
            min-height: calc(100vh - 65px);
            background-color: #282e38;
            color: #ffffff;
            flex-shrink: 0;
        }

        .admin-sidebar-header {
            padding: 16px 20px;
            font-size: 15px;
            font-weight: 500;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .admin-sidebar .nav-link {
            color: #d1d5db;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 400;
            display: block;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .admin-sidebar .nav-link:hover {
            background-color: #353c48;
            color: #ffffff;
        }

        .admin-sidebar .nav-link.active {
            background-color: #1e2229;
            color: #ffffff;
            font-weight: 600;
        }

        .admin-main-content {
            flex: 1;
            padding: 30px 40px;
            background-color: #f8f9fa;
        }

        /* Card Konten */
        .card-custom {
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border: 1px solid #e9ecef;
            padding: 24px;
        }

        /* Label & Input Form (Persis Screenshot 1) */
        .form-label-custom {
            font-size: 14px;
            font-weight: 400;
            color: #212529;
            margin-bottom: 6px;
        }

        .form-control-custom,
        .form-select-custom {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        /* Footer */
        .admin-footer {
            text-align: center;
            font-size: 13px;
            color: #6c757d;
            padding: 30px 0 10px;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <!-- Top Yellow Navbar (Khas UNPAM) -->
    <header class="top-navbar">
        <a href="{{ route('admin.dashboard') }}" class="unpam-logo-container">
            <!-- Logo Emblem SVG -->
            <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="47" fill="#F7B928" stroke="#0B3954" stroke-width="5"/>
                <polygon points="50,14 62,38 88,38 67,54 75,78 50,63 25,78 33,54 12,38 38,38" fill="#0B3954"/>
                <circle cx="50" cy="50" r="14" fill="#F7B928"/>
                <circle cx="50" cy="50" r="8" fill="#0B3954"/>
            </svg>
            <div>
                <div class="unpam-title-sub">UNIVERSITAS PAMULANG</div>
                <div class="unpam-title-main">SISTEM INFORMASI</div>
            </div>
        </a>

        <div class="top-nav-links">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('home') }}">Logout</a>
        </div>
    </header>

    <!-- Layout Container -->
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="admin-sidebar-header">
                Admin Menu
            </div>
            <nav class="nav flex-column mt-2">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('admin.projects.*') || request()->routeIs('admin.project.*') ? 'active' : '' }}"
                   href="{{ route('admin.projects.index') }}">
                    Data Project
                </a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="admin-main-content">
            <!-- Flash Alert (Persis Screenshot 2: Project updated successfully.) -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background-color: #d1e7dd; border-color: #badbcc; color: #0f5132; border-radius: 4px; padding: 10px 16px;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 12px;"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Konten Halaman -->
            @yield('content')

            <!-- Footer (Persis Screenshot 1) -->
            <footer class="admin-footer">
                &copy; {{ date('Y') }} MyProfile. All rights reserved.
            </footer>
        </main>
    </div>

    <!-- Scripts: jQuery, Bootstrap 5, DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    @stack('scripts')
</body>

</html>
