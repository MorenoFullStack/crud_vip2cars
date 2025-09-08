<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-4 col-sm-6 col-xs-10">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Iniciar Sesión</h2>

                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control input-custom" placeholder="demo@demo.com" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control input-custom" placeholder="demo123" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-custom">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>