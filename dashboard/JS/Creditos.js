$(document).ready(function() {
    var table = $('#tablaproductos').DataTable( {
        "ajax": "../dashboard/bd/consultas2.php?valordeConsulta=1",
        "columns": [
                { "data": "IDFactura" },
                { "data": "fechaEmision" },
                { "data": "cliente" },
                { "data": "total" },
                { "data": "total" },
                { "data": null },
        ],
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><button class='btn btn-primary btneditar' data-toggle='modal' data-target='#exampleModalCenter'>Editar</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger' onclick = 'eliminar()'>Eliminar</button>&nbsp;<button class='btn btn-success'  data-toggle='modal' data-target='#abonos'>Abonar</button></div>"
        }],
    });

});

//Metodo de abonos para guardar en la BD

const enviarabono = () => {
    var valor = $.trim($("#valor").val());
    var concepto = $.trim($("#concepto").val());
    var metodopago = $.trim($("#metodopago").val());
    var idfactura = $.trim($("#idfac").val());

    $.ajax({
        url: "../dashboard/bd/insercciones.php",
        type: "POST",
        dataType: "json",
        data: {
            valordeConsulta: 7, 
            valor: valor,
            concepto: concepto,
            metodopago: metodopago,
            idfactura: idfactura
        },
        success: function(){
            Swal.fire(
                'Abono Generado',
                'Listo',
                'success'
            )           
        }
    });  
    document.getElementById("valor").value = "";
    document.getElementById("concepto").val = "";
    document.getElementById("metodopago").val = "";  
    document.getElementById("idfac").val = "";   
    //$('#abonos').modal('hide');  
    $('#abonos')[0].reset()
}