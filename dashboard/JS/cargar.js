// Funcion del Buscador
$(function () {
    $('.select2').select2()
})

var $select = $('#prodi');

$.ajax({
    url: '../dashboard/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 9, 
    }, 
    success: function(data) {
        $.each(JSON.parse(data), function(Nivel, name) {

            let union = name.NombreArticulo + " - " + name.Codigo1;
            $select.append('<option value=' + name.IDCodigoAlmacen + '>' + union + '</option>');

        });
    }
});


$(document).ready(function(){
    $("#tiendapar").on({
        change:function(){
            valor = $('#tiendapar').val();
            $("#prodi2").empty();
            cargar(valor);
        }
    });
});

var $select2 = $('#prodi2');
function cargar(numero){
    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 20,
            almacen: numero
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {
    
                let union = name.NombreArticulo + " - " + name.Codigo1;
                $select2.append('<option value=' + name.IDCodigoAlmacen + '>' + union + '</option>');
    
            });
        }
    });
}

let StockUNO = 0;
let cantidaddicha = 0;

$(document).ready(function(){
    $("#prodi").on({
		change:function(){
            id = $('#prodi').val();
            actualizar(id);
        }
	});

    function actualizar(id){
        $.ajax({
            url: '../dashboard/bd/Consultas.php',
            type:"POST",
            datatype: "json",
            data: {
                valordeConsulta: 11,
                id: id
            }, 
            success: function(data) {
                $.each(JSON.parse(data), function(Nivel, name) {
                    StockUNO = name.Stock;            

                    $('#aluno').val(StockUNO);
                
                });
            }
        });
    }

    $("#prodi2").on({
		change:function(){
            id = $('#prodi2').val();
            actualizar2(id);
        }
	});

    function actualizar2(id){
        $.ajax({
            url: '../dashboard/bd/Consultas.php',
            type:"POST",
            datatype: "json",
            data: {
                valordeConsulta: 11,
                id: id
            }, 
            success: function(data) {
                $.each(JSON.parse(data), function(Nivel, name) {
                    cantidaddicha = name.Stock;            

                    $('#existe').val(cantidaddicha);
                
                });
            }
        });
    }
})

function intercambio(){
    
    salida = $('#tiendapar').val();
    id = $('#prodi2').val();
    cantidad = document.getElementById("canti").value;
    destino = $('#tiendades').val();

    cantidad = parseInt(cantidad);
    cantidaddicha = parseInt(cantidaddicha);
    if((salida == "-- seleccione --") && (destino == "-- seleccione --") ){
        if(cantidad < cantidaddicha){
            $.ajax({
                url: '../dashboard/bd/insercciones.php',
                type:"POST",
                datatype: "json",
                data: {
                    valordeConsulta: 6,
                    salida: salida,
                    id: id,
                    cantidad: cantidad,
                    destino: destino
                }, 
                success: function(data) {   
                    Swal.fire({
                        title: 'Listo Productos Agregados y descontado',
                        confirmButtonText: `LISTO GRACIAS`,
                      }).then((result) => {
                        if (result.isConfirmed) {
                          location.reload();
                        }
                      })
        
                    }
                });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No hay Suficiente productos en el Almacen seleccionado'
              })
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'SELECCIONA UNA OPCION DE SALIDA'
          })
    }
}

function añadirstock(){

    let dos= 0;
    let tres = 0;
    let cuatro = 0;

    dos = document.getElementById("aldos").value;
    tres = document.getElementById("altres").value;
    cuatro = document.getElementById("alcuatro").value;

    if(dos==""){
        dos = 0;
    }
    
    if(tres==""){
        tres=0;
    }

    if(cuatro==""){
        cuatro=0;
    }

    let suma = parseInt(dos) + parseInt(tres) + parseInt(cuatro);

    let Stock = parseInt(StockUNO);
 
    if(suma < Stock){
        $.ajax({
        url: '../dashboard/bd/insercciones.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 1,
            dos: dos,
            tres: tres,
            cuatro:cuatro,
            id: id
        }, 
        success: function(data) {   
                
                Swal.fire(
                    'EXITO',
                    'ALMACENES CARGADOS',
                    'success'
                )
                document.getElementById("aluno").value = "";                
                document.getElementById("aldos").value = "";
                document.getElementById("altres").value = "";
                document.getElementById("alcuatro").value = "";
            }
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'NO hay Suficiente productos en el Almacen 1'
          })
    }

}
