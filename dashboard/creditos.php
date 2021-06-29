<?php
  include_once "./Views/parte_superior.php"
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creditos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Tablero</a></li>
             <li class="breadcrumb-item active">creditos</li>
           </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
 

    <div class="card">
        <div class="card-header">
            Deudas pendientes
        </div>
        <div class="card-body">
            <div class="table-responsive"  style="margin-end:10px">
                <table id="tablaproductos" class="ui celled table" style="width:100%">
                  <thead class="text-center">
                    <tr>
                      <th>id</th>
                      <th>Fecha</th>
                      <th>Contacto</th>
                      <th>Total</th>
                      <th>Abonado</th>
                      <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
      </div>
    </div>
    
<div class="modal fade bd-example-modal-lg" id="modaUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form id="formPersonas">    
            <div class="modal-body">
              <input type="text" hidden id="idalmacen" name="idalmacen">

              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="inputCity">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Codigo 1</label>
                      <input type="text" class="form-control" id="codigo1" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Stock</label>
                      <input type="text" class="form-control" id="Stock" required>
                  </div>

              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Marca</label>
                    <input type="text" class="form-control" id="marca" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Modelo / Presentacion</label>
                    <input type="text" class="form-control" id="modelopresentacion" required>
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Precio  de Venta</label>
                        <input type="number" class="form-control" id="pventa" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Precio de Compra</label>
                        <input type="number" class="form-control" id="pcompra" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Comentario</label>
                      <input type="text" class="form-control" id="comentario">
                    </div>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="JS/Creditos.js"></script>


<?php
  include_once "./Views/parte_inferior.php"
?>

<!-- Modal de abonos --->

<!-- Modal -->
<div class="modal fade" id="abonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Abono Global</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

            <input type="text" hidden id="idfac" name = "idfac" value = "2">

            <div class="form-group">
              <label for="formGroupExampleInput">Valor</label>
              <input type="number" class="form-control" id="valor" name = "valor" placeholder="Valor (Obligatorio)" required>
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">Concepto</label>
              <input type="text" class="form-control" id = "concepto" name = "concepto" placeholder="Concepto" required>
            </div>
            
            <div class="form-group">
              <label for="formGroupExampleInput">Metodo de Pago</label>
              <input type="text" class="form-control" id = "metodopago" name = "metodopago" placeholder="Metodo de pago" Value = "Efectivo" required>
            </div>

            <div class = "form-group">
              <button type="button" onclick = "enviarabono()" class="btn btn-primary">Guardar</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>

<!-- terminar de abonos -->


<style>
.card-header {
  background: #9ca2aa;
}
</style>