<?php
  include_once "./Views/parte_superior.php"
?>

<?php 
  include_once 'bd/conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();
?>
<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Resumen de Tiendas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reportes</a></li>
              <li class="breadcrumb-item active">Resumen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tienda-tab" data-toggle="tab" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Tienda 1</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tienda2-tab" data-toggle="tab" href="#dos" role="tab" aria-controls="dos" aria-selected="false">Tienda 2</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tienda3-tab" data-toggle="tab" href="#tres" role="tab" aria-controls="tres" aria-selected="false">Tienda 3</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tienda4-tab" data-toggle="tab" href="#cuatro" role="tab" aria-controls="cuatro" aria-selected="false">Tienda 4</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno-tab">
            <!-- Inicio 1-->
            <div class="row">

                <div class="col-12 col-sm-5 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cash-register"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Ventas del Dia</span>
                        <span class="info-box-number" id="Ventasdeldiauno" name="Ventasdeldiauno"></span>
                    </div>
                    </div>
                </div>

                <div class="col-12 col-sm-5 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Dinero en caja</span>
                        <span class="info-box-number" id="dineroencajauno" name="dineroencajauno"></span>
                    </div>
                    </div>
                </div>
            </div>

            <?php
                $consul = "SELECT IDFactura, cliente, codigoRUCcedula, fechaEmision, Total, montopagado, cambio FROM factura WHERE AlmacenNumero = 1";

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
                                    <th>Cliente</th>
                                    <th>Codigo RUC / Cedula</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Opcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                    <tr>
                                    <td hidden><?php echo $dat['IDFactura'] ?></td>
                                    <td><?php echo $dat['cliente'] ?></td>
                                    <td ><?php echo $dat['codigoRUCcedula'] ?></td>
                                    <td><?php echo $dat['Total'] ?></td>
                                    <td><?php echo $dat['fechaEmision'] ?></td>
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
                <!-- final 1-->
        </div>

        <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos-tab">
            <!-- Inicio 2-->
            <div class="row">

                <div class="col-12 col-sm-5 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cash-register"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Ventas del Dia</span>
                    <span class="info-box-number" id="Ventasdeldiados" name="Ventasdeldiados"></span>
                    </div>
                </div>
                </div>

                <div class="col-12 col-sm-5 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Dinero en caja</span>
                    <span class="info-box-number" id="dineroencajados" name="dineroencajados"></span>
                    </div>
                </div>
                </div>
            </div>
            <!-- final 2-->
        </div>

        <div class="tab-pane fade" id="tres" role="tabpanel" aria-labelledby="tres-tab">
            <!-- Inicio 3-->
            <div class="row">

                <div class="col-12 col-sm-5 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cash-register"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Ventas del Dia</span>
                    <span class="info-box-number" id="Ventasdeldiatres" name="Ventasdeldiatres"></span>
                    </div>
                </div>
                </div>

                <div class="col-12 col-sm-5 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Dinero en caja</span>
                    <span class="info-box-number" id="dineroencajatres" name="dineroencajatres"></span>
                    </div>
                </div>
                </div>
            </div>
            <!-- final 3-->
        </div>

        <div class="tab-pane fade" id="cuatro" role="tabpanel" aria-labelledby="cuatro-tab">
            <!-- Inicio 4-->
            <div class="row">

                <div class="col-12 col-sm-5 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cash-register"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Ventas del Dia</span>
                    <span class="info-box-number" id="Ventasdeldiacuatro" name="Ventasdeldiacuatro"></span>
                    </div>
                </div>
                </div>

                <div class="col-12 col-sm-5 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Dinero en caja</span>
                    <span class="info-box-number" id="dineroencajacuatro" name="dineroencajacuatro"></span>
                    </div>
                </div>
                </div>
            </div>
            <!-- final 4-->
        </div>

    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="JS/tiendas.js"></script>

  
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


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-success {
  margin-right: 137px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/almacenes.php */


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/verProductosCRUD.php */

.card {
  margin-left: -1px;
  margin-right: 0px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/tiendas.php */

#myTabContent {
  margin-left: 8px;
  margin-right: 8px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/tiendas.php */

#myTab {
  margin-left: 8px;
  margin-right: 8px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/tiendas.php */

#myTabContent {
  margin-top: 7px;
}

</style>