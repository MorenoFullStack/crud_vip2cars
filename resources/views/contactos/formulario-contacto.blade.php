<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($contacto) ? 'Editar Cliente' : 'Registrar Cliente' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head> 
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">

    <div class="container" style="max-width: 700px;">
        <div class="card shadow-lg" style="border-radius: 15px;">
            <div class="card-body p-4">
                <h1 class="text-center mb-4">{{ isset($contacto) ? 'Editar Cliente' : 'Registrar Cliente' }}</h1>
        <form id="formContacto" action="{{ isset($contacto) ? route('contactos.update', $contacto->id) : route('contactos.store') }}" method="POST">
            @csrf
            @if(isset($contacto))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $contacto->nombre ?? old('nombre') }}" placeholder="Ingrese su nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $contacto->apellido ?? old('apellido') }}" placeholder="Ingrese su apellido" required>
            </div>

            <div class="mb-3">
                <label for="documento_identidad" class="form-label">Documento de Identidad:</label>
                <input type="text" name="documento_identidad" id="documento_identidad" class="form-control @error('documento_identidad') is-invalid @enderror" value="{{ $contacto->documento_identidad ?? old('documento_identidad') }}" maxlength="8" pattern="\d{8}" title="El DNI debe tener 8 dígitos numéricos" placeholder="Ingrese su DNI (8 dígitos)" required>
                @error('documento_identidad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{ $contacto->correo ?? old('correo') }}" placeholder="Ingrese su correo electrónico" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $contacto->telefono ?? old('telefono') }}" maxlength="9" pattern="\d{9}" title="El teléfono debe tener 9 dígitos numéricos" placeholder="Ingrese su número de teléfono" required>
            </div>

            <div class="d-flex justify-content-between">
                <button id="btnSubmit" type="submit" class="btn btn-primary">{{ isset($contacto) ? 'Actualizar Cliente' : 'Registrar Cliente' }}</button>
                <a href="{{ route('contactos.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>

            </div>
        </div>
    </div>
    <!--Scripts JS -->
    @include('includes.scripts')
    <script src="{{ asset('js/SubmitControl.js') }}"></script>
</body>
</html>