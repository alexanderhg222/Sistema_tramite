  <!-- Content Header (Page header) INICIOOOOOOOOOO -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MANTENIMIENTO TIPO DE DOCUMENTO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">TIPO DE DOCUMENTO</li>
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
                <h5 class="card-title"> <b>Lista de Tipo de Documento </b></h5>
                <button onclick="AbrirRegistro2()" class="btn btn-danger btn-sm float-right"><i class=" fa fa-plus">Nuevo Registro</i></button>
              </div>
              <div class="card-body">
              <table id="tabla_tdoc" class="display" style="width:100%">
             <thead>
            <tr>
                <th>#</th>
                <th>Tipo Documento</th>
                <th>Fecha Registro</th>
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
<div class="modal fade" id="modal_registro_Fdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE TIPO DE DOCUMENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <label for="">Tipo Documento</label>
            <input type="text" class="form-control" id="txt_tdoc">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-success" onclick="RegistrarTdoc()">REGISTRAR</button>
      </div>
    </div>
  </div>
</div>
  </div>
      <!-- Modal EDITAR -->
<div class="modal fade" id="modal_editar_Fdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <div class="col-12">
            <label for="">TIPO DOCUMENTO</label>
            <input type="text" class="form-control" id="txt_tdoc_edit">
            <input type="text" name="" id="txt_idtdoc" hidden >
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
        <button type="button" class="btn btn-success" onclick="Editar_area()">EDITAR</button>
      </div>
    </div>
  </div>
</div>
  </div>
  <!-- /.content-wrapper FINALLLLLLLLLLLLLLLLLLL -->
  <script src="../utilitarios/DataTables/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        listar_Fdoc();    
});

$('#modal_registro_Fdoc').on('shown.bs.modal', function () {
  $('#txt_area').trigger('focus')
})
$('#modal_editar_Fdoc').on('shown.bs.modal', function () {
  $('#txt_area').trigger('focus')
})
</script>
<script src="../../js/console_tdoc.js?rev=<?php echo time();?>"></script>
<script src="../../js/console_tdoc.js"></script>