<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Añadir Usuarios al Sistema</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Clientes</a></li>
              <li class="breadcrumb-item active">Añadir Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Añadir Usuarios</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="inputCity">Usuario</label>
                          <input type="text" class="form-control" id="nombre" required>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="inputState">Contraseña</label>
                          <input type="password" class="form-control" id="contra" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">Tipo de Usuario</label>
                        <select class="form-control" id="rolesdetrabajadores" name="rolesdetrabajadores">
                          <option>Seleccione una Rol...</option>
                        </select>
                      </div>
                      </div>
            <div class="form-row btn-sm">
              <button type="button" onclick="guardarUsuario()" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
        <!-- /.card -->

        </section>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="JS/rolesusuarios.js"></script>

  
<?php
  include_once "./Views/parte_inferior.php"
?>