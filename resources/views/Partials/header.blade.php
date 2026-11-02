<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ url('/') }}">
            MyProfile
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active fw-semibold' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/projects') }}" class="nav-link {{ request()->is('projects*') || request()->is('project*') ? 'active fw-semibold' : '' }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link {{ request()->is('about*') ? 'active fw-semibold' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/profile') }}" class="nav-link {{ request()->is('profile*') ? 'active fw-semibold' : '' }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/projects') }}" class="btn btn-outline-light btn-sm ms-lg-2 px-3">Admin Panel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
