$(document).ready(function() { 
    $('#vehiculosTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": true,
        "pageLength": 5,
        "lengthChange": true,
        "lengthMenu": [5, 10, 15, 20],
        "columnDefs": [
            { "className": "dt-center align-middle", "targets": "_all" }
        ],
        "language": {
            "search": "Buscar:",
            "paginate": {
                "previous": "<",
                "next": ">"
            },
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ vehículos",
            "infoEmpty": "Mostrando 0 a 0 de 0 vehículos",
            "infoFiltered": "(filtrado de _MAX_ totales)",
            "lengthMenu": "Mostrar _MENU_ filas"
        }
    });

    $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var vehiculoId = form.data('id');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        var table = $('#vehiculosTable').DataTable();
                        table.row($('tr[data-id="' + vehiculoId + '"]')).remove().draw();
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: 'El vehículo ha sido eliminado.',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr) {
                        Swal.fire('Error', 'No se pudo eliminar el vehículo.', 'error');
                    }
                });
            }
        });
    });
});