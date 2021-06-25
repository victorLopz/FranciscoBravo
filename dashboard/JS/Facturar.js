//Fecha actual del sistema
let totalglobal = 0;

n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
//Día
d = n.getDate();

//Lo ordenas a gusto.
document.getElementById("date").innerHTML = "Fecha: "+d + "/" + m + "/" + y;

// Colocar el Usuario registrado --->
// Numero 5 corresponde a la consulta 5 que es sacar el tipo de usuario que existe

verrol();

function verrol(){
    
    correousuario = document.getElementById("Correo").innerHTML;

    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 5,
            correousuario: correousuario
        }, 
        success:function(data){
            let inv = JSON.parse(data)[0].RolUsuario;
            $('#nombreUsuario').html(inv);
        }
    });

    //Nombre de la variable invoiceable
    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 6,
        }, 
        success:function(data){
            console.log(data);
            let inv = 1234;
            //let inv = JSON.parse(data)[0].RolUsuario;
            $('#invoiceable').html("N° Factura: " + inv);
        }
    });
} 

// Funcion del Buscador
$(function () {
    $('.select2').select2()
})


// Para sacar los productos

var $select = $('#prodi');

$.ajax({
    url: '../dashboard/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 7, 
    }, 
    success: function(data) {
        $.each(JSON.parse(data), function(Nivel, name) {
            let union = name.NombreArticulo + " - " + name.Codigo1;
            $select.append('<option value=' + name.IDCodigoAlmacen + '>' + union + '</option>');
        });
    }
});


$(document).ready(function(){

    let valor, id, valorporUnidad, valorporcantidadunidad;

    //Leer el valor de las cantidades
    $("#cantidad").on({
		change:function(){
            valor = $('#cantidad').val();
            id = $('#prodi').val();
            actualizar(id);
        }
	});

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
                valordeConsulta: 8,
                id: id
            }, 
            success: function(data) {
                $.each(JSON.parse(data), function(Nivel, name) {
                    valorporUnidad = name.precioVenta;
                    valorporcantidadunidad = name.precioVenta * valor;                    

                    $('#precioUnidad').val(valorporUnidad);
                    $('#Subtotal').val(valorporcantidadunidad);
                
                });
            }
        });
    }
});

function añadircarrito(){
    
    //Añadimos al carrito
    var cantidad = document.getElementById("cantidad").value;
    var id = document.getElementById("prodi").value;
    var Subtotal = document.getElementById("Subtotal").value;

    let Descripcion;
    let NombreArticulo;
    let fila;

    let sumatotaltodo = 0;


    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 8,
            id: id
        }, 
        success: function(data) {

            let dataparse = parseFloat(Subtotal)
            sumatotaltodo = dataparse + sumatotaltodo;    
            

            $.each(JSON.parse(data), function(Nivel, name) {
                NombreArticulo = name.NombreArticulo;
                marca = name.Marca;                
                Modelo = name.Modelopresentacion;
                Descripcion = marca + ', ' + Modelo;  

                //Armamos la Tabla 
                fila="<tr>" +
                        "<td class='txt' hidden>"+name.IDCodigoAlmacen+"</td>"+
                        "<td class='txt'>"+cantidad+"</td>"+
                        "<td class='txt' >"+NombreArticulo+"</td>"+
                        "<td class='txt'>"+Descripcion+"</td>"+
                        "<td class='txt total'>"+Subtotal+"</td>"+
                        "<td><button type='button' class='btn btn-danger btnEditar'>Eliminar</button></td>"+
                    "</tr>";   

                var btn = document.createElement("TR");
                btn.innerHTML=fila;
                document.getElementById("tablita").appendChild(btn);

                
            });   
            
            totalglobal = sumatotaltodo + totalglobal;
            //$('#total').val(totalglobal);
            $('.total > td:eq(0)').html("NIO: "+ totalglobal);
        }        
    }); 
    

    //Limpieza de los valores
    document.getElementById("cantidad").value = "";                
    document.getElementById("precioUnidad").value = "";
    document.getElementById("Subtotal").value = "";
}

//Elimar registro
$(document).on("click", ".btnEditar", function(){
    event.preventDefault();
    valorprecio = parseInt($(this).closest("tr").find('td:eq(4)').text());
    
    totalglobal = totalglobal - valorprecio;
    $('.total > td:eq(0)').html("NIO: "+ totalglobal);

    $(this).closest('tr').remove();
});


function facturar(){
    // Guardamos la Factura

}
