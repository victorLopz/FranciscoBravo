<?php
  include_once "./Views/parte_superior.php"
?>

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consul = "SELECT deta.IDFacturaDetalle, 
                      deta.Unidades, 
                      al.NombreArticulo, 
                      deta.Precio, 
                      (deta.Unidades * al.PrecioCompra) as preciototalcompra, 
                      (deta.precio - (deta.Unidades * al.PrecioCompra)) as Ganancias, 
                      deta.TimeSpace from detalledefactura as deta 
                      INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto
                      WHERE al.IsVisible = 1 ";
    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">RESUMEN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tablero</a></li>
              <li class="breadcrumb-item active">Resumen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
      <div class="card-header color">
          Ventas / Ganancias
      </div>
      
      <div class="card-body">
        <div class="table-responsive"  style="margin-end:10px">
          <table id="tablaproductos" class="ui celled table" style="width:100%">
            <thead class="text-center">
              <tr>
                <th hidden>id</th>
                <th>Unidades</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th >Ganancias</th>
                <th >fecha</th>
                <th hidden>Comentario</th>                  
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($data as $dat) {
              ?>
                <tr>
                  <td hidden><?php echo $dat['IDFacturaDetalle'] ?></td>
                  <td><?php echo $dat['Unidades'] ?></td>
                  <td><?php echo $dat['NombreArticulo'] ?></td>
                  <td><?php echo $dat['Precio'] ?></td>
                  <td><?php echo $dat['Ganancias'] ?></td>
                  <td><?php echo $dat['TimeSpace'] ?></td>
                  <td hidden><?php echo $dat['Notas'] ?></td>
                                      
                </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>  
    </div>

    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tienda 1</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">TIenda 2</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tienda 3</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-tienda3" role="tab" aria-controls="nav-contact" aria-selected="false">Tienda 4</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">

<!-- Finalizamos las tablas de contenido -->


  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <!-- Tablas de contenido -->
    <div class="container">
      <div class="row">
                
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos menos Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tavle1">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "menosvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">          
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos mas Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tab2">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "masvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
      </div>
    </div>
    <?php
        $consul = "SELECT IDFactura, fechaEmision, Total, montopagado, cambio FROM factura WHERE AlmacenNumero = 1";

        $consulta = $consul;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>    
    <div class="card">
        <h5 class="card-header">Historial de Factura</h5>
        <div class="card-body">
          <div class="table-responsive" style="margin-end:10px">
            <table id="tablaproducts" class="ui celled table" style="width:100%">
              <thead class="text-center">
                <tr>
                  <th hidden>id</th>
                  <th>Fecha</th>
                  <th>Total</th>
                  <th>Monto</th>
                  <th>Cambio</th>
                  <th>Opcion</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $dat) {
                ?>
                <tr>
                  <td hidden><?php echo $dat['IDFactura'] ?></td>
                  <td><?php echo $dat['fechaEmision'] ?></td>
                  <td ><?php echo $dat['Total'] ?></td>
                  <td><?php echo $dat['montopagado'] ?></td>
                  <td><?php echo $dat['cambio'] ?></td>
                  <th></th>
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

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container">
      <div class="row">
                
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos menos Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tavle1">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "menosvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">          
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos mas Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tab2">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "masvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
      </div>
    </div>

    <?php
        $consul = "SELECT IDFactura, fechaEmision, Total, montopagado, cambio FROM factura WHERE AlmacenNumero = 2";

        $consulta = $consul;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>    
    <div class="card">
        <h5 class="card-header">Historial de Factura</h5>
        <div class="card-body">
          <div class="table-responsive" style="margin-end:10px">
            <table id="tablaproducts" class="ui celled table" style="width:100%">
              <thead class="text-center">
                <tr>
                  <th hidden>id</th>
                  <th>Fecha</th>
                  <th>Total</th>
                  <th>Monto</th>
                  <th>Cambio</th>
                  <th>Opcion</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $dat) {
                ?>
                <tr>
                  <td hidden><?php echo $dat['IDFactura'] ?></td>
                  <td><?php echo $dat['fechaEmision'] ?></td>
                  <td ><?php echo $dat['Total'] ?></td>
                  <td><?php echo $dat['montopagado'] ?></td>
                  <td><?php echo $dat['cambio'] ?></td>
                  <th></th>
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

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="container">
      <div class="row">
                
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos menos Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tavle1">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "menosvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">          
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos mas Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tab2">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "masvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
      </div>
    </div>

    <?php
        $consul = "SELECT IDFactura, fechaEmision, Total, montopagado, cambio FROM factura WHERE AlmacenNumero = 3";

        $consulta = $consul;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>    
    <div class="card">
        <h5 class="card-header">Historial de Factura</h5>
        <div class="card-body">
          <div class="table-responsive" style="margin-end:10px">
            <table id="tablaproducts" class="ui celled table" style="width:100%">
              <thead class="text-center">
                <tr>
                  <th hidden>id</th>
                  <th>Fecha</th>
                  <th>Total</th>
                  <th>Monto</th>
                  <th>Cambio</th>
                  <th>Opcion</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $dat) {
                ?>
                <tr>
                  <td hidden><?php echo $dat['IDFactura'] ?></td>
                  <td><?php echo $dat['fechaEmision'] ?></td>
                  <td ><?php echo $dat['Total'] ?></td>
                  <td><?php echo $dat['montopagado'] ?></td>
                  <td><?php echo $dat['cambio'] ?></td>
                  <th></th>
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

  <div class="tab-pane fade" id="nav-tienda3" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="container">
      <div class="row">
                
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos menos Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tavle1">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "menosvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">          
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Productos mas Vendidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table" id = "tab2">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Codigo 1</th>
                            <th style="width: 10px">Cant.</th>
                          </tr>
                        </thead>
                        <tbody id = "masvendido">                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
      </div>
    </div>

    <?php
        $consul = "SELECT IDFactura, fechaEmision, Total, montopagado, cambio FROM factura WHERE AlmacenNumero = 4";

        $consulta = $consul;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>    
    <div class="card">
        <h5 class="card-header">Historial de Factura</h5>
        <div class="card-body">
          <div class="table-responsive" style="margin-end:10px">
            <table id="tablaproducts" class="ui celled table" style="width:100%">
              <thead class="text-center">
                <tr>
                  <th hidden>id</th>
                  <th>Fecha</th>
                  <th>Total</th>
                  <th>Monto</th>
                  <th>Cambio</th>
                  <th>Opcion</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $dat) {
                ?>
                <tr>
                  <td hidden><?php echo $dat['IDFactura'] ?></td>
                  <td><?php echo $dat['fechaEmision'] ?></td>
                  <td ><?php echo $dat['Total'] ?></td>
                  <td><?php echo $dat['montopagado'] ?></td>
                  <td><?php echo $dat['cambio'] ?></td>
                  <th></th>
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

</div>


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    Detalles
                </div>
                <div class="card-body">
                <table id="detalles" class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Cant.</th>
                      <th>Nombre Articulo</th>
                      <th>Codigo 1</th>
                      <th style="width: 40px">Precio</th>
                    </tr>
                  </thead>
                  <tbody id="tablita">
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>


<script src="JS/Resumen.js"></script>
  
<?php
  include_once "./Views/parte_inferior.php"
?>


<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.color {
  background: #9ca2aa;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-warning {
  margin-top: 32px;
}


/* adminlte.min.css | http://localhost/administracion/Virtual_Innova/dashboard/Views/dist/css/adminlte.min.css */

.layout-navbar-fixed .wrapper .content-wrapper {
  /* margin-top: calc(3.5rem + 1px); */
  /* margin-top: calc\(3.5rem +; */
  /* margin-top: calc\(3.5rem; */
  /* margin-top: calc\(3.5re; */
  /* margin-top: calc\(3.5r; */
  /* margin-top: calc\(3.5; */
  /* margin-top: calc\(3.; */
  /* margin-top: calc\(3; */
  /* margin-top: calc\(; */
  margin-top: 0px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-success {
  margin-right: 137px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.callout {
  /* border-left-width: 19px; */
  border-left-width: 0px;
  margin-left: 17px;
  margin-right: 15px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Resumen.php */

#nav-tabContent {
  margin-left: 25px;
  margin-right: 25px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Resumen.php */

.content-wrapper > nav:nth-child(2) {
  margin-left: 25px;
  margin-right: 25px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Resumen.php */

#nav-home {
  margin-top: 17px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Resumen.php */

.container > div:nth-child(1) {
  margin-top: 12px;
}

@media (min-width: 576px) {
  .modal-sm {
    /* max-width: 0; */
    max-width: 500px;
  }
}

</style>
