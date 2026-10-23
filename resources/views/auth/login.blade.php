
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | SIMON SRL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: #f3f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 35px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .brand {
            color: #1d3557;
            font-weight: 700;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <main class="login-card">
        <div class="text-center mb-4">
            <h2 class="brand">SIMON SRL</h2>
            <p class="text-secondary mb-0">Sistema de gestión de pedidos</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    autocomplete="current-password"
                    required
                >
            </div>

            <div class="form-check mb-4">
                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    value="1"
                    class="form-check-input"
                >
                <label for="remember" class="form-check-label">
                    Recordarme
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Iniciar sesión
            </button>
        </form>
    </main>

</body>
</html>

