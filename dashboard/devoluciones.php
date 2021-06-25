<?php
  include_once "./Views/parte_superior.php"
?>

<!-- Tienda 1 -->

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consul = "SELECT IDFactura, codigoRUCcedula, fechaEmision, Total ,montopagado, cambio FROM factura where isVisible = 1 and AlmacenNumero = 1";

    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- EL MERO INDEX -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Devoluciones de Facturas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Facturas</a></li>
              <li class="breadcrumb-item active">Devoluciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-uno" role="tab" aria-controls="pills-uno" aria-selected="true">Almacen 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-dos" role="tab" aria-controls="pills-dos" aria-selected="false">Almacen 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-tres" role="tab" aria-controls="pills-tres" aria-selected="false">Almacen 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-cuatro" role="tab" aria-controls="pills-cuatro" aria-selected="false">Almacen 4</a>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-uno" role="tabpanel" aria-labelledby="pills-uno-tab">
        <!--Aqui comienza el primer almacen-->
            <div class="card">
                <div class="card-header">
                    Almacen 1
                </div>
                <div class="card-body">
                    <table class="table" id = "tablauno">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Codigo Ruc / cliente</th>
                                <th>Fecha</th>
                                <th style="width: 10px">Total</th>
                                <th style="width: 10px">Monto Pagado</th>
                                <th style="width: 10px">Cambio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>                      
                        <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['IDFactura'] ?></td>
                                    <td><?php echo $dat['codigoRUCcedula'] ?></td>
                                    <td><?php echo $dat['fechaEmision'] ?></td>
                                    <td><?php echo $dat['Total'] ?></td>
                                    <td><?php echo $dat['montopagado'] ?></td>
                                    <td><?php echo $dat['cambio'] ?></td>
                                    <td></td>                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        <!--Aqui termina el primer almacen-->
        </div>
        <div class="tab-pane fade" id="pills-dos" role="tabpanel" aria-labelledby="pills-dos-tab">
        <!--Aqui comienza el segundo almacen-->
        <?php
            $consul = "SELECT IDFactura, codigoRUCcedula, fechaEmision, Total ,montopagado, cambio FROM factura where isVisible = 1 and AlmacenNumero = 2";

            $consulta = $consul;
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data1 = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="card">
                <div class="card-header">
                    Almacen 2
                </div>
                <div class="card-body">
                    <table class="table" id = "tablados">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Codigo Ruc / cliente</th>
                                <th>Fecha</th>
                                <th style="width: 10px">Total</th>
                                <th style="width: 10px">Monto Pagado</th>
                                <th style="width: 10px">Cambio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>                      
                        <?php
                            foreach ($data1 as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['IDFactura'] ?></td>
                                    <td><?php echo $dat['codigoRUCcedula'] ?></td>
                                    <td><?php echo $dat['fechaEmision'] ?></td>
                                    <td><?php echo $dat['Total'] ?></td>
                                    <td><?php echo $dat['montopagado'] ?></td>
                                    <td><?php echo $dat['cambio'] ?></td>
                                    <td></td>                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
        </div>
        <!--Aqui termina el segundo almacen-->
        </div>
        <div class="tab-pane fade" id="pills-tres" role="tabpanel" aria-labelledby="pills-tres-tab">
        <!--Aqui comienza el tercer almacen-->
        <?php
            $consul = "SELECT IDFactura, codigoRUCcedula, fechaEmision, Total ,montopagado, cambio FROM factura where isVisible = 1 and AlmacenNumero = 3";

            $consulta = $consul;
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data1 = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="card">
                <div class="card-header">
                    Almacen 3
                </div>
                <div class="card-body">
                    <table class="table" id = "tablatres">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Codigo Ruc / cliente</th>
                                <th>Fecha</th>
                                <th style="width: 10px">Total</th>
                                <th style="width: 10px">Monto Pagado</th>
                                <th style="width: 10px">Cambio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>                      
                        <?php
                            foreach ($data1 as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['IDFactura'] ?></td>
                                    <td><?php echo $dat['codigoRUCcedula'] ?></td>
                                    <td><?php echo $dat['fechaEmision'] ?></td>
                                    <td><?php echo $dat['Total'] ?></td>
                                    <td><?php echo $dat['montopagado'] ?></td>
                                    <td><?php echo $dat['cambio'] ?></td>
                                    <td></td>                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
        </div>
        <!--Aqui termina el tercer almacen-->
        </div>
        <div class="tab-pane fade" id="pills-cuatro" role="tabpanel" aria-labelledby="pills-cuatro-tab">
        <!--Aqui comienza el cuarto almacen-->
        <?php
            $consul = "SELECT IDFactura, codigoRUCcedula, fechaEmision, Total ,montopagado, cambio FROM factura where isVisible = 1 and AlmacenNumero = 4";

            $consulta = $consul;
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data1 = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="card">
                <div class="card-header">
                    Almacen 4
                </div>
                <div class="card-body">
                    <table class="table" id = "tablacuatro">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Codigo Ruc / cliente</th>
                                <th>Fecha</th>
                                <th style="width: 10px">Total</th>
                                <th style="width: 10px">Monto Pagado</th>
                                <th style="width: 10px">Cambio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>                      
                        <?php
                            foreach ($data1 as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['IDFactura'] ?></td>
                                    <td><?php echo $dat['codigoRUCcedula'] ?></td>
                                    <td><?php echo $dat['fechaEmision'] ?></td>
                                    <td><?php echo $dat['Total'] ?></td>
                                    <td><?php echo $dat['montopagado'] ?></td>
                                    <td><?php echo $dat['cambio'] ?></td>
                                    <td></td>                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
        </div>
        <!--Aqui termina el cuarto almacen-->
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" id = "modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                  <tbody id="tablita" name = "tablita">
                  </tbody>
                </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-warning btnsalir" data-dismiss="modal">Salir</button>
                    
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/devoluciones.js"></script>
  
<?php
  include_once "./Views/parte_inferior.php"
?>
<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.card-header {
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


/* En línea #11 | http://localhost/administracion/Virtual_Innova/level/level1/HisFacturas.php */

@media (min-width: 576px) {
  .modal-sm {
    /* max-width: 0; */
    max-width: 500px;
  }
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

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/devoluciones.php */

.btn-warning {
  margin-left: 163px;
  margin-top: 0px;
  border-bottom-width: 0px;
  border-top-width: 0px;
}

</style>