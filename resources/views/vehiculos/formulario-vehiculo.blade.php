<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($vehiculo) ? 'Editar Vehículo' : 'Registrar Vehículo' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh; margin: 0;">
    <div class="container" style="max-width: 700px;">
        <div class="card shadow-lg" style="border-radius: 15px;">
            <div class="card-body p-4">
                <h1 class="text-center mb-4">{{ isset($vehiculo) ? 'Editar Vehículo' : 'Registrar Vehículo' }}</h1>
    <form id="formVehiculo" action="{{ isset($vehiculo) ? route('vehiculos.update', $vehiculo->id) : route('vehiculos.store') }}" method="POST">
        @csrf
            @if(isset($vehiculo))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="placa" class="form-label">Placa:</label>
            <input type="text" name="placa" id="placa" class="form-control @error('placa') is-invalid @enderror"
                value="{{ $vehiculo->placa ?? old('placa') }}" placeholder="Ingrese la placa del vehículo, ej. GHI-9101" required>
            @error('placa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror"
                value="{{ $vehiculo->marca ?? old('marca') }}" placeholder="Ingrese la marca del vehículo" required>
            @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control @error('modelo') is-invalid @enderror"
                value="{{ $vehiculo->modelo ?? old('modelo') }}" placeholder="Ingrese el modelo del vehículo" required>
            @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year_fabricacion" class="form-label">Año de fabricación:</label>
            <input type="number" name="year_fabricacion" id="year_fabricacion" class="form-control @error('year_fabricacion') is-invalid @enderror"
                value="{{ $vehiculo->year_fabricacion ?? old('year_fabricacion') }}" placeholder="Ingrese el año de fabricación" required>
            @error('year_fabricacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

<div class="mb-3">
    <label for="cliente_id" class="form-label">Cliente:</label>
    <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
        <option selected disabled>Seleccionar contacto</option>
        @foreach ($contactos as $contacto)
            <option value="{{ $contacto->id }}"
                {{ (isset($vehiculo) && $vehiculo->cliente_id == $contacto->id) || old('cliente_id') == $contacto->id ? 'selected' : '' }}>
                {{ $contacto->nombre }} {{ $contacto->apellido }}
            </option>
        @endforeach
    </select>
    @error('cliente_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
        <div class="d-flex justify-content-between">
            <button id="btnSubmitVehiculo" type="submit" class="btn btn-primary">
                {{ isset($vehiculo) ? 'Actualizar Vehículo' : 'Registrar Vehículo' }}
            </button>
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Regresar</a>
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