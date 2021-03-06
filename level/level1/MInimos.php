<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT almacenuno.IDAlmacenuno, al.NombreArticulo, al.Codigo1, almacenuno.Stock from almacenuno INNER JOIN almacen as al ON al.IDCodigoAlmacen = almacenuno.IDAlmacenuno where almacenuno.Stock < 10 and al.IsVisible = 1";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventario</a></li>
              <li class="breadcrumb-item active">Stock MINIMOS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <div class="card">
    <h5 class="card-header">Stock MINIMOS</h5>
    <div class="card-body">
      <div class="table-responsive" style="margin-end:10px">
                      <table id="tablaproductos" class="ui celled table" style="width:100%">
                          <thead class="text-center">
                              <tr>
                                  <th hidden>id</th>
                                  <th>Nombre</th>
                                  <th>Codigo 1</th>
                                  <th>Stock</th>
                                  <th hidden></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              foreach ($data as $dat) {
                              ?>
                                  <tr>
                                      <td hidden><?php echo $dat['IDAlmacenuno'] ?></td>
                                      <td><?php echo $dat['NombreArticulo'] ?></td>
                                      <td ><?php echo $dat['Codigo1'] ?></td>
                                      <td><?php echo $dat['Stock'] ?></td>
                                      <th hidden></th>
                                  </tr>
                              <?php
                              }
                              ?>
                          </tbody>
                      </table>
        </div>

        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">A??adir Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input type="text" hidden class="form-control" id="idvalor" >
      <input type="text" hidden class="form-control" id="stockAntiguo" >


        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Cantidad de Producto</span>
          </div>
          <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id ="stocknew">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="guadarStock();" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
  include_once "./Views/parte_inferior.php"
?>

<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/level/level1/InsertarProductos.php */

.content-wrapper {
  margin-top: 0px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/level/level1/InsertarProductos.php */

.card-header {
  background: #9ca2aa;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/level/level1/InsertarProductos.php */

.card {
  margin-left: 13px;
  margin-right: 11px;
}


/* adminlte.min.css | http://localhost/administracion/Virtual_Innova/level/level1/Views/dist/css/adminlte.min.css */

.layout-navbar-fixed .wrapper .content-wrapper {
  /* margin-top: calc(3.5rem + 1px); */
  margin-top: 0;
}


</style>

<script>
        tablaproductos = $("#tablaproductos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": ""
        }],

        "order": [
            [1, 'asc']
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
                "sLast": "??ltimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });
</script>