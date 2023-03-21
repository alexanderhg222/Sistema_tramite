    <!-- Content Header (Page header) INICIOOOOOOOOOO -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">USUARIO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">USUARIO</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h5 class="card-title"> <b>Lista de Usuario </b></h5>
                <button onclick="AbrirRegistro_usuario()" class="btn btn-danger btn-sm float-right"><i class=" fa fa-plus">Nuevo Registro</i></button>
              </div>
              <div class="card-body">
              <table id="tabla_usuario" class="display" style="width:100%">
             <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Area</th>
                <th>Rol</th>
                <th>Empleado</th>
                <th>Estatus</th>
                <th>Accion</th>
            </tr>
            </thead>
        
    </table>
              </div>
            </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper FINALLLLLLLLLLLLLLLLLLL -->



  <!-- /.content-wrapper MODALESSSSSSSSSSSSSSSSS -->
  <div class="modal fade" id="modal_registro_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-12">
        <div class="col-12">
            <label for="">Empleado</label>
           <select onchange="onchange_u()" class="js-example-basic-single form-control" name="state" id="selec_empleado" style="width:100%">
          </select>
          </div>
            <label for="">Usuario</label>
            <input type="text" class="form-control" id="txt_usuario" disabled>
          </div>
          <div class="col-12">
            <label for="">Contraseña</label>
            <input type="password" class="form-control" id="txt_contra">
          </div>
                 
          <div class="col-12">
            <label for="">Area</label>
           <select class="js-example-basic-single2 form-control" name="state" id="selec_area" style="width:100%">
          </select>
          </div>
         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-success" onclick="Registrarusuario()">REGISTRAR</button>
      </div>
    </div>
  </div>
</div>
  </div>
  <script src="../utilitarios/DataTables/datatables.min.js"></script>
      <!-- Modal EDITAR -->
      <div class="modal fade" id="modal_editar_Usu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR TIPO DE DOCUMENTOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="12">
                    <input type="text" id="usuario_id" hidden>
                  </div>
                    <div class="col-12">
                    <label for="">Area</label>
                    <select class="js-example-basic-single2 form-control" name="state" id="selec_area_edit" style="width:100%">
                    </select>
                  </div>
                  <div class="col-12" >
                      <label for="">Estado</label>
                      <select name="" id="txt_status" class="form-control">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-success" onclick="Editar_Usuario()">EDITAR</button>
              </div>
            </div>
          </div>
        </div>
  </div>
<script>
    $(document).ready(function () {
        listar_usuario();  
        Select_empleado();
        Select_area()
        //$('.js-example-basic-single').select2();  
});
$('#modal_registro_usuario').on('shown.bs.modal', function () {
  $('#txt_area').trigger('focus')
})
$('#modal_editar_Usu').on('shown.bs.modal', function () {
  $('#txt_area').trigger('focus')
})

</script>

<script src="../../js/console_usuario.js?rev=<?php echo time();?>"></script>
