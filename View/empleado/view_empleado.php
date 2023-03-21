 <!-- Content Header (Page header) INICIOOOOOOOOOO -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MANTENIMIENTO EMPLEADO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">EMPLEADO</li>
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
                <h5 class="card-title"> <b>Lista Empleado </b></h5>
                <button onclick="AbrirRegistro()" class="btn btn-danger btn-sm float-right"><i class=" fa fa-plus">Nuevo Registro</i></button>
              </div>
              <div class="card-body">
              <table id="tabla_empleado" class="display" style="width:100%">
             <thead>
            <tr>
                <th>#</th>
                <th>Nro Documento</th>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Movil</th>
                <th>Correo</th>
                <th>Estatus</th>
                <th>Accion</th>
            </tr>
            </thead>
        
             </table>    
            </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- MOOOOOOOOOOOOOOOOOOOOOOOOOOOOODALESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS -->
    <!-- Modal -->
<div class="modal fade" id="modal_registro_empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <label for="">Nro Documento</label>
            <input type="text" class="form-control" id="txt_ndoc">
          </div>
          <div class="col-6">
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="txt_nombre">
          </div>
          <div class="col-4">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" id="txt_apat">
          </div>
          <div class="col-4">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" id="txt_amat">
          </div>
          <div class="col-4">
            <label for="">Movil</label>
            <input type="number" class="form-control" id="txt_cel">
          </div>
          <div class="col-8">
            <label for="">Correo</label>
            <input type="email" class="form-control" id="txt_correo">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-success" onclick="RegistrarEmpleado()">REGISTRAR</button>
      </div>
    </div>
  </div>
</div>
  </div>
      <!-- Modal EDITAR -->
<div class="modal fade " id="modal_editar_Fdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR EMPLEADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-4">
            <label for="">Nro Documento</label>
            <input type="text" class="form-control" id="txt_ndoc_edit">
          </div>
          <div class="col-6">
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="txt_nombre_edit">
          </div>
          <div class="col-4">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" id="txt_apat_edit">
          </div>
          <div class="col-4">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" id="txt_amat_edit">
          </div>
          <div class="col-4">
            <label for="">Movil</label>
            <input type="number" class="form-control" id="txt_cel_edit">
          </div>
          <div class="col-8">
            <label for="">Correo</label>
            <input type="email" class="form-control" id="txt_correo_edit">
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
        <button type="button" class="btn btn-success" onclick="Editar_Empleado()">EDITAR</button>
      </div>
    </div>
  </div>
</div>
  </div>
  <!-- /.content-wrapper FINALLLLLLLLLLLLLLLLLLL -->
  <script src="../utilitarios/DataTables/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        listar_Empleado();   
});

$('#modal_registro_Fdoc').on('shown.bs.modal', function () {
  $('#txt_area').trigger('focus')
})
$('#modal_editar_Fdoc').on('shown.bs.modal', function () {
  $('#txt_area').trigger('focus')
})
</script>
<script src="../../js/console_empleado.js?rev=<?php echo time();?>"></script>
<script src="../../js/console_empleado.js"></script>