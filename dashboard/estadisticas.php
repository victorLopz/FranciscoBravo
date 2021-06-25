<?php
  include_once "./Views/parte_superior.php"
?>

  <!-- daterange picker -->
  <link rel="stylesheet" href="Views/plugins/daterangepicker/daterangepicker.css">
<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: 0px; min-height: 242px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Estadisticas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tablero</a></li>
              <li class="breadcrumb-item active">Estadisticas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card text-center">
      <div class="card-header">
        Ganancias por Dias
      </div>
      <div class="card-body">
        <div class = "row">
        <div class='col-sm-6'>
        <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
      </div><div>
                </div>
        </div>
      </div>
      <div class="card-footer text-muted"><div>
    </div>
  
<?php
  include_once "./Views/parte_inferior.php"
?>

<!-- date-range-picker -->
<script src="Views/plugins/daterangepicker/daterangepicker.js"></script>


<script>
$(function () {
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
})
</script>

<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/estadisticas.php */

.card {
  margin-left: 16px;
  margin-right: 15px;
}

</style>
