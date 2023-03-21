  <!-- Content Header (Page header) INICIOOOOOOOOOO -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">MANTENIMIENTO TRAMITE</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">TRAMITE</li>
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
                          <h5 class="card-title"> <b>Lista de Tramites </b></h5>
                          <button onclick="cargar_contenido('contenido_principal','tramite/view_tramite_registro.php')"
                              class="btn btn-danger btn-sm float-right"><i class=" fa fa-plus">Nuevo
                                  Registro</i></button>
                      </div>
                      <div class="card-body">
                          <table id="tabla_tramite" class="display compact" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Nro</th>
                                      <th>Nro Doc.</th>
                                      <th>Tipo Documento</th>
                                      <th>DNI Remi.</th>
                                      <th>Remitente</th>
                                      <th>Mas Datos</th>
                                      <th>Seguimiento</th>
                                      <th>Area Origen</th>
                                      <th>Area Localizada</th>
                                      <th>Estado</th>
                                      <th>Derivar</th>
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
  <div class="modal fade" id="modal_mostrar_seguimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="label_titu">SEGUIMIENTO TRAMITE</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-12">
                          <table id="tabla_seguimiento" class="display compact" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>PROCEDENCIA</th>
                                      <th>FECHA</th>
                                      <th>DESCRIPCION</th>
                                      <th>ARCHIVO ANEXADO</th>
                                  </tr>
                              </thead>

                          </table>
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
  <div class="modal fade" id="modal_mas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">MAS INFORMACION</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-12 ">
                          <div class="card card-primary card-tabs">
                              <div class="card-header p-0 pt-1">
                                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link active " id="custom-tabs-one-home-tab" data-toggle="pill"
                                              href="#custom-tabs-one-home" role="tab"
                                              aria-controls="custom-tabs-one-home" aria-selected="true">Informacion de
                                              Doc.</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                              href="#custom-tabs-one-profile" role="tab"
                                              aria-controls="custom-tabs-one-profile" aria-selected="false">Datos de
                                              Remitente</a>
                                      </li>

                                  </ul>
                              </div>
                              <div class="card-body">
                                  <div class="tab-content" id="custom-tabs-one-tabContent">
                                      <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                          aria-labelledby="custom-tabs-one-home-tab">
                                          <div class="row">
                                              <div class="col-12">
                                                  <label for="">PROCEDENCIA DE DOCUMENTO</label>
                                                  <input name="" id="select_area_p" class=" form-control"
                                                      style="width:100%" disabled></input>
                                              </div>
                                              <div class="col-12">
                                                  <label for="">AREA DESTINO </label>
                                                  <input name="" id="select_area_d" class=" form-control"
                                                      sytle="width:100%" disabled></input>
                                              </div>
                                              <div class="col-12">
                                                  <label for="">TIPO DOCUMENTO </label>
                                                  <input name="" id="select_tipo_doc" class=" form-control"
                                                      sytle="width:100% " disabled></input>
                                              </div>
                                              <div class="col-4">
                                                  <label for="">N° DOCUMENTO</label>
                                                  <input id="txt_ndoc" disabled class="form-control"
                                                      type="text"></input>
                                              </div>
                                              <div class="col-4">
                                                  <label for="">N° FOLIOS</label>
                                                  <input type="number" disabled class="form-control" id="txt_folios">
                                              </div>
                                              <div class="col-12">
                                                  <label for="">ASUNTO DEL TRAMITE</label>
                                                  <textarea name="" disabled id="txt_asunto" class="form-control"
                                                      sytle="resize:none" rows="3"></textarea>
                                              </div>
                                          </div>


                                      </div>
                                      <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                          aria-labelledby="custom-tabs-one-profile-tab">
                                          <div class="row">
                                              <div class="col-4">
                                                  <label for="">N°DNI</label>
                                                  <input type="text" class="form-control" disabled id="txt_dni">
                                              </div>
                                              <div class="col-4">
                                                  <label for="">NOMBRE</label>
                                                  <input type="text" class="form-control" disabled id="txt_nombre">
                                              </div>
                                              <div class="col-4">
                                                  <label for="">APELLIDO PATERNO</label>
                                                  <input type="text" class="form-control" disabled id="txt_apa">
                                              </div>
                                              <div class="col-4">
                                                  <label for="">APELLIDO MATERNO</label>
                                                  <input type="text" class="form-control" disabled id="txt_ama">
                                              </div>
                                              <div class="col-4">
                                                  <label for="">EMAIL</label>
                                                  <input type="text" class="form-control" disabled id="txt_email">
                                              </div>
                                              <div class="col-4">
                                                  <label for="">CELULAR</label>
                                                  <input type="text" class="form-control" disabled id="txt_celular">
                                              </div>
                                              <div class="col-12">
                                                  <label for="">DIRECCION</label>
                                                  <input type="text" class="form-control" disabled id="txt_dir">
                                              </div>
                                              <div class="col-12">
                                                  <label for="">EN REPRESENTACION</label>
                                                  <div class="form-group clearfix" disabled>
                                                      <div class="icheck-success d-inline">
                                                          <input type="radio" id="radioPrimary1" name="r1" checked=""
                                                              disabled>
                                                          <label for="radioPrimary1">A Nombre Propio
                                                          </label>
                                                      </div>
                                                      <div id="checked_natural" class="icheck-success d-inline">
                                                          <input type="radio" id="radioPrimary2" name="r1" disabled>
                                                          <label for="radioPrimary2">A Otra Persona Natural
                                                          </label>
                                                      </div>
                                                      <div class="icheck-success d-inline">
                                                          <input type="radio" id="radioPrimary3" name="r1" disabled>
                                                          <label for="radioPrimary3">
                                                              Persona Juridica
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12 row" id="div_juridico" style="display:none;">
                                                  <div class="col-4">
                                                      <label for="">RUC</label>
                                                      <input id="txt_ruc" type="text" class="form-control">
                                                  </div>
                                                  <div class="col-6">
                                                      <label for="">RAZON SOCIAL</label>
                                                      <input id="txt_razon" type="text" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                              </div>

                          </div>
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
  <!-- Modal EDITAR -->
  <div class="modal fade" id="modal_derivar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">DERIVACION DE TRAMITE</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-6">
                          <label for="">Fecha de Registro:</label>
                          <input type="text" id='txt_fecha_registro' disabled class='form-control'>
                      </div>
                      <div class="col-6">
                          <label for="">ACCION: </label>
                          <select class='form-control' name="" id="select_accion">
                              <option value="DERIVAR">DERIVAR</option>
                              <option value="FINALIZAR">FINALIZAR</option>
                          </select>
                      </div>
                      <div class="col-6" id='1'>
                          <label for="">AREA ORIGEN: </label>
                          <input type='text' disabled onlyread class='form-control' name="" id="select_origen">

                          </input>
                      </div>
                      <div class="col-6" id='2'>
                          <label for="">AREA DESTINO: </label>
                          <select class='form-control' name="" id="select_destino">
                          </select>
                      </div>
                      <div class="col-6">
                          <label for="">DOCUMENTO: </label>
                          <input class='form-control' disabled type="text" name="" id="txt_id_doc">
                      </div>
                      <div class="col-6">
                          <label for="">ANEXAR DOCUMENTO: </label>
                          <input class='form-control' type="file" name="" id="txt_documento">
                      </div>
                      <div class="col-12">
                          <label for="">DESCRIPCION: </label>
                          <textarea class='form-control' name="" id="txt_descripcion" rows="2"></textarea>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                  <button type="button" class="btn btn-success" onclick="Registrar_derivacion()">DERIVAR</button>
              </div>
          </div>
      </div>
  </div>
  </div>
  <!-- /.content-wrapper FINALLLLLLLLLLLLLLLLLLL -->
  <script src="../utilitarios/DataTables/datatables.min.js"></script>

  <script>
$(document).ready(function() {
    listar_tramite_area();
});

$('#modal_registro_Fdoc').on('shown.bs.modal', function() {
    $('#txt_area').trigger('focus')
})
$('#modal_editar_Fdoc').on('shown.bs.modal', function() {
    $('#txt_area').trigger('focus')
})
$('#select_accion').change(function() {
    let a = document.getElementById("select_accion").value;
    if (a == 'FINALIZAR') {
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "none"
    } else {
        document.getElementById("1").style.display = "block";
        document.getElementById("2").style.display = "block"
    }

})
  </script>
  <script src="../../js/console_tramite_area.js?rev=<?php echo time();?>"></script>
  <script src="../../js/console_tramite_area.js"></script>