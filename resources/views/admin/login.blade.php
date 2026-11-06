<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 15px;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #3b4249;
            background-image: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('https://unpam.ac.id/_nuxt/kampus2.B0WqicWG.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .login-card {
            width: 100%;
            max-width: 390px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            background-color: #ffffff;
            border: none;
        }

        .login-header {
            background-color: #ffc107;
            padding: 18px 24px;
            text-align: center;
        }

        .login-header h5 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 600;
            color: #212529;
            letter-spacing: 0.3px;
        }

        .login-body {
            padding: 28px 26px 24px;
        }

        .form-label {
            font-size: 14px;
            color: #333333;
            margin-bottom: 6px;
            font-weight: 400;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 9px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .btn-login {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            font-weight: 600;
            font-size: 14px;
            padding: 9px;
            border-radius: 5px;
            transition: all 0.2s ease-in-out;
        }

        .btn-login:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #212529;
        }

        .demo-text {
            font-size: 12px;
            color: #6c757d;
            text-align: center;
            margin-top: 22px;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <!-- Header Kuning -->
        <div class="login-header">
            <h5>Admin Login</h5>
        </div>

        <!-- Form Body -->
        <div class="login-body">
            @if(session('success'))
                <div class="alert alert-success py-2 px-3 small mb-3">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 small mb-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           id="password"
                           name="password"
                           required>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="btn btn-login w-100 mt-2">
                    Login
                </button>

                <!-- Demo Login Info -->
                <div class="demo-text">
                    Demo Login : ilhampangestu612@gmail.com / Admin123
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

