<!DOCTYPE html>
<html lang="es">
@include('includes.head')
<body>
    <!-- Header -->
    @include('layouts.header')
    <!-- Mensaje de éxito -->
    @include('includes.success-message')

    <div class="container mt-4 p-4 border rounded-3 shadow-sm">
        <h1 class="text-center mb-4">Listado de Vehículos</h1>
        <div class="d-flex justify-content-center mb-4">
            <a href="{{ route('vehiculos.create') }}" class="btn btn-success mx-2">Agregar Vehículo</a>
        </div>
        <div class="table-responsive">
            <table id="vehiculosTable" class="table table-hover table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehiculos as $vehiculo)
                    <tr data-id="{{ $vehiculo->id }}">
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->year_fabricacion }}</td>
                        <td>{{ $vehiculo->cliente->nombre }}</td>
                        <td>{{ $vehiculo->cliente->apellido }}</td>
                        <td>{{ $vehiculo->cliente->documento_identidad }}</td>
                        <td>{{ $vehiculo->cliente->correo }}</td>
                        <td>{{ $vehiculo->cliente->telefono }}</td>
                        <td class="text-center">
                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="d-inline delete-form" data-id="{{ $vehiculo->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--Scripts JS -->
    @include('includes.scripts')
    <script src="{{ asset('js/vehiculos.js') }}"></script>
</body>
</html>