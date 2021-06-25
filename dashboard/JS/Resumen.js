tienda1();

function tienda1(){
    $(document).ready(function() {
        tablaproductos = $("#tablaproductos").DataTable({
            "columnDefs": [{
                "targets": -1,
                "data": null
            }],
          
            "order": [
                [1, 'desc']
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            }
        });
    
        $("#tablaproducts").DataTable({
            "columnDefs": [{
                "targets": -1,
                "data": null,
                "defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' class='btn btn-primary btnver' data-toggle='modal' data-target='.bd-example-modal-sm'>Ver Detalles</button>"
            }],
      
            "order": [
                [1, 'desc']
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            }
        });
    
    });
    vermenosvendidos();
    verpoc();
    
    function verpoc(){
    
        $.ajax({
                 url: '../dashboard/bd/Consultas.php',
                 type: "POST",
                 dataType: "json",
                 data: {
                  valordeConsulta: 17
                 },
                 success: function(data){
     
                     data.forEach(function(dato) {
     
                         fila="<tr>" +
                                 "<td class='txt'>"+dato.NombreArticulo+"</td>"+
                                 "<td class='txt' >"+dato.Marca+"</td>"+
                                 "<td class='txt'>"+dato.Codigo1+"</td>"+
                                 "<td class='txt total'>"+dato.Cantidades+"</td>"
                             "</tr>";
     
                         var btn = document.createElement("TR");
                         btn.innerHTML=fila;
                         document.getElementById("masvendido").appendChild(btn);
                     });
                 }        
             });
           
    
    }
    
    function vermenosvendidos(){
              
         $.ajax({
            url: '../dashboard/bd/Consultas.php',
            type: "POST",
            dataType: "json",
            data: {
                valordeConsulta: 16
            },
            success: function(data){
     
                data.forEach(function(dato) {        
                    fila="<tr>" +
                            "<td class='txt'>"+dato.NombreArticulo+"</td>"+
                            "<td class='txt' >"+dato.Marca+"</td>"+
                            "<td class='txt'>"+dato.Codigo1+"</td>"+
                            "<td class='txt total'>"+dato.Cantidades+"</td>"
                        "</tr>";
        
                    var btn = document.createElement("TR");
                    btn.innerHTML=fila;
                    document.getElementById("menosvendido").appendChild(btn);
                });
            }        
        });      
    }
    
    $(document).on("click", ".btnver", function(){    
          fila = $(this).closest("tr");
          id = fila.find('td:eq(0)').text();
          verdate(id);
    })
    
    function verdate(id){    
             
          $.ajax({
              url: "../dashboard/bd/Consultas.php",
              type: "POST",
              dataType: "json",
              data: {
                  id: id,
                  valordeConsulta: 18
              },
              success: function(data){
    
                  data.forEach(function(dato) {
    
                      fila="<tr>" +
                              "<td class='txt'>"+dato.Unidades+"</td>"+
                              "<td class='txt' >"+dato.NombreArticulo+"</td>"+
                              "<td class='txt'>"+dato.Codigo1+"</td>"+
                              "<td class='txt total'>"+dato.Precio+"</td>"
                          "</tr>";
    
                      var btn = document.createElement("TR");
                      btn.innerHTML=fila;
                      document.getElementById("tablita").appendChild(btn);
                  });
              }        
          });
          
    }

    $(document).ready(function() {
        $('#tavle1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    } );

    $(document).ready(function() {
        $('#tab2').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    } );
}
