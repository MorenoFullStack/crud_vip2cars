<!DOCTYPE html>
<html lang="es">
@include('includes.head')
<body>
    <!-- Header -->
    @include('layouts.header')

    <!-- Mensaje de éxito -->
    @include('includes.success-message')

    <div class="container mt-4 p-4 border rounded-3 shadow-sm">
        <h1 class="text-center mb-4">Listado de contactos</h1>
        <div class="d-flex justify-content-center mb-4">
            <a href="{{ route('contactos.create') }}" class="btn btn-success mx-2">Agregar Contacto</a>
        </div>
        <div class="table-responsive">
            <table id="contactosTable" class="table table-striped table-hover table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                    <tr data-id="{{ $contacto->id }}">
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->apellido }}</td>
                        <td>{{ $contacto->documento_identidad }}</td>
                        <td>{{ $contacto->correo }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td class="text-center">
                            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="d-inline delete-form" data-id="{{ $contacto->id }}">
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
    <script src="{{ asset('js/contactos.js') }}"></script>
</body>
</html>