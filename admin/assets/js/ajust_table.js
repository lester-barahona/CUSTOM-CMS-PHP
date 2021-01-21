$(document).ready( function() {
    $('#datatable').dataTable({
    "language": {
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
            },
        "info": "Mostrando _START_ hasta _END_ de _TOTAL_ datos",
        "search":"Buscar",
        "lengthMenu": `Mostrar <select>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="-1">Todo</option>
                    </select>`,
        "loadingRecords": "Porfavor Espere - Cargando...",
        "zeroRecords": "No hay coincidencias",
        "infoFiltered": "(filtrado de _MAX_ en total)",
        "infoEmpty": "Sin datos para mostar"
    },
    "pageLength": 5
    } );

    $('#datatable_length label select').addClass('form-control');
    $('#datatable_filter label input').addClass('form-control');
    $('#datatable').DataTable();
} );