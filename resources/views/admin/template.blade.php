<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
 
</head>
<style>
body {
    background-color: #f8f9fa;
}

.admin-sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #343a40;
    color: #fff;
    padding-top: 20px;
}

.admin-sidebar .nav-link {
    color: #fff;
    padding: 10px 20px;
    font-weight: 500;
}

.admin-sidebar .nav-link:hover {
    background-color: #495057;
    color: #fff;
}

.admin-content {
    margin-left: 250px;
    padding: 30px;
}

@media (max-width: 768px) {
    .admin-sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }

    .admin-content {
        margin-left: 0;
    }
}
</style>

<body>
    <div class="admin-sidebar shadow">
        <h4 class="text-center fw-bold text-white pb-3 border-bottom border-secondary">Admin Panel</h4>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.home') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Project</a>
            </li>
        </ul>
    </div>
    <div class="admin-content">
        <div
            class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom bg-white p-3 rounded shadow-sm">
            <h3 class="fw-bold mb-0">Dashboard</h3>
            <span class="text-muted fw-semibold">Halo, Administrator</span>
        </div>
        @yield('content')
    </div>
    @stack('scripts')
</body>

</html>