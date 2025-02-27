<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    @section('title', 'Register - Pustaka Nusa')
    <title>@yield('title', 'Pustaka Nusa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #B9E5E8;
        }
        .login-container {
            text-align: center;
            max-width: 400px;
            padding: 20px;
        }
        .login-container img {
            width: 300px;
        }
        .login-container .form-control {
            border-radius: 25px;
        }
        .login-container .btn-primary {
            background-color: #58c6bc;
            border: none;
            border-radius: 25px;
        }
        .footer-text {
            margin-top: 20px;
            color: #6c757d;
            font-size: 14px;
        }
        .footer-text a {
            color: #007bff;
            text-decoration: none;
        }
        h4 {
            font-family: 'Britannic', sans-serif;
            font-size: 30px;
        }
        .logo-container {
            background-color: #ffffff;
            border-radius: 0 0 60px 60px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            position: relative;
            z-index: 0;
            top: -71px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo -->
        <div class="logo-container">
            <!-- Title -->
            <img src="{{ asset('img/logo.png') }}" alt="Yarsi Logo">
            <h4 class="mt-3">Pustaka Nusa</h4>
        </div>

        <h3 class="mt-3">Pendaftaran Akun</h3>
        <p>Silakan isi informasi Anda untuk membuat akun</p>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Register Form -->
        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <!-- Fullname -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="fullname" placeholder="fullname" required>
            </div>

            <!-- Username -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>


            <!-- Email -->
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <!-- Password -->
            <div class="mb-3 input-group position-relative">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                <span class="position-absolute top-50 end-0 translate-middle-y me-3">
                    <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer; font-size: 1.2rem;"></i>
                </span>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3 input-group position-relative">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
                <span class="position-absolute top-50 end-0 translate-middle-y me-3">
                    <i class="bi bi-eye-slash" id="toggleConfirmPassword" style="cursor: pointer; font-size: 1.2rem;"></i>
                </span>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>

        <!-- Footer Text -->
        <div class="footer-text">
            <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
        </div>
        <div class="footer-text">
            <p>Kembali ke halaman <a href="{{ url('/') }}" style="color: #007bff;">Home</a></p>
        </div>
        <div class="footer-text">
            <p>&copy; 2024 <a href="#">Pustaka Nusa</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <script>
        // Password field toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the eye icon
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        // Confirm password field toggle
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordField = document.getElementById('password_confirmation');

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);

            // Toggle the eye icon
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>
