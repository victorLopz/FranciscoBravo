
//Llenar el select para verficiar que tipo de Usuarios sera dentro del sistema
//valor de la consulta es 3 que corresponde a la opcion 3 llenado de los roles.


var $select = $('#rolesdetrabajadores');

$.ajax({
    url: '../dashboard/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 3, 
    }, 
    success: function(data3) {
        $.each(JSON.parse(data3), function(Nivel, name) {
          $select.append('<option value=' + name.Nivel + '>' + name.RolUsuario + '</option>');
        });
    }
});


function guardarUsuario(){
    //Indice 3 pero en agregar Usuarios

    var nombreUsuario = $.trim($("#nombre").val());    
    var contra =$.trim($("#contra").val());    
    var rolesdetrabajadores =$.trim($("#rolesdetrabajadores").val());

    $.ajax({
        url: '../dashboard/bd/agregarUsuarios.php',
        type:"POST",
        datatype: "json",
        data: {
            nombreUsuario:nombreUsuario, 
            contra:contra,
            rolesdetrabajadores:rolesdetrabajadores,
            agregarproducto: 3,
        }, 
        success: function(data3) {
            if(data = "LISTO"){
                
                document.getElementById("nombre").value = "";
                document.getElementById("contra").value = "";

                Swal.fire(
                    'EXITO',
                    'USUARIOS GUARDADO',
                    'success'
                  )  
            }else{
                Swal.fire({
                    title: 'ERROR',
                    text: "NO SE GUARDO EL USUARIO",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                });  
            }
        }
    });
    
}