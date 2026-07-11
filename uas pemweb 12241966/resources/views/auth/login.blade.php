<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
 rel="stylesheet">

    <style>

        body {

            background: #343a40;

            height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

        }

        .login-card {

            width: 100%;

            max-width: 420px;

            border-radius: 20px;

        }

        .form-control {

            border-radius: 10px;

            padding: 12px;

        }

        .btn-login {

            border-radius: 10px;

            padding: 12px;

            font-weight: 600;

        }

    </style>

</head>

<body>

    <div class="card shadow-lg border-0 login-card">

        <div class="card-body p-5">

            <div class="text-center mb-4">

                <h2 class="fw-bold text-primary">📚 Perpustakaan Digital</h2>

                <p class="text-muted">Silakan masuk untuk melanjutkan</p>

            </div>

            @if(session('status'))

                <div class="alert alert-success">

                    {{ session('status') }}

                </div>

            @endif

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">Email</label>

                    <input type="email"

                           name="email"

                           value="{{ old('email') }}"

                           class="form-control @error('email') is-invalid @enderror"

                           required autofocus>

                    @error('email')

                        <div class="invalid-feedback">{{ $message }}</div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">Password</label>

                    <input type="password"

                           name="password"

                           class="form-control @error('password') is-invalid @enderror"

                           required>

                    @error('password')

                        <div class="invalid-feedback">{{ $message }}</div>

                    @enderror

                </div>

                <div class="form-check mb-4">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                    <label class="form-check-label" for="remember">

                        Ingat saya

                    </label>

                </div>

                <button type="submit" class="btn btn-primary w-100 btn-login">

                    Masuk

                </button>

            </form>

            <div class="text-center mt-4">

                <small class="text-muted">

                    © 2026 Sistem Informasi Perpustakaan

                </small>

            </div>

        </div>

    </div>

</body>

</html>