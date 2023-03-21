<!-- Content Header (Page header) INICIOOOOOOOOOO -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">REGISTRO DE TRAMITE</h1>
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

<div class="col-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title"> <b>DATOS REMITENTE</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="">N°DNI</label>
                            <input type="text" class="form-control" id="txt_dni">
                        </div>
                        <div class="col-6">
                            <label for="">NOMBRE</label>
                            <input type="text" class="form-control" id="txt_nombre">
                        </div>
                        <div class="col-6">
                            <label for="">APELLIDO PATERNO</label>
                            <input type="text" class="form-control" id="txt_apa">
                        </div>
                        <div class="col-6">
                            <label for="">APELLIDO MATERNO</label>
                            <input type="text" class="form-control" id="txt_ama">
                        </div>
                        <div class="col-6">
                            <label for="">EMAIL</label>
                            <input type="text" class="form-control" id="txt_email">
                        </div>
                        <div class="col-6">
                            <label for="">CELULAR</label>
                            <input type="text" class="form-control" id="txt_celular">
                        </div>
                        <div class="col-12">
                            <label for="">DIRECCION</label>
                            <input type="text" class="form-control" id="txt_dir">
                        </div>
                        <div class="col-12">
                            <label for="">EN REPRESENTACION</label>
                            <div class="form-group clearfix">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="radioPrimary1" name="r1" checked="">
                                    <label for="radioPrimary1">A Nombre Propio
                                    </label>
                                </div>
                                <div id="checked_natural" class="icheck-success d-inline">
                                    <input type="radio" id="radioPrimary2" name="r1">
                                    <label for="radioPrimary2">A Otra Persona Natural
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="radioPrimary3" name="r1">
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
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>DATOS REMITENTE</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="">PROCEDENCIA DE DOCUMENTO</label>
                            <select name="" id="select_area_p" class="js-example-basic-single form-control"
                                style="width:100%"></select>
                        </div>
                        <div class="col-12">
                            <label for="">AREA DESTINO </label>
                            <select name="" id="select_area_d" class="js-example-basic-single form-control"
                                sytle="width:100%"></select>
                        </div>
                        <div class="col-12">
                            <label for="">TIPO DOCUMENTO </label>
                            <select name="" id="select_tipo_doc" class="js-example-basic-single form-control"
                                sytle="width:100%"></select>
                        </div>
                        <div class="col-12">
                            <label for="">N° DOCUMENTO</label>
                            <input id="txt_ndoc" class="form-control" type="text"></input>
                        </div>
                        <div class="col-12">
                            <label for="">ASUNTO DEL TRAMITE</label>
                            <textarea name="" id="txt_asunto" class="form-control" sytle="resize:none"
                                rows="3"></textarea>
                        </div>
                        <div class="col-8">
                            <label for="">ADJUNTAR DOCUMENTO</label>
                            <input type="file" class="form-control" id="txt_archivo">
                        </div>
                        <div class="col-4">
                            <label for="">N° FOLIOS</label>
                            <input type="number" class="form-control" id="txt_folios">
                        </div>

                        <div class="icheck-success px-1 py-1 " style="display:flex; padding-top: 1rem;">
                            <input onclick='validar_informacion()' type="checkbox" id="chekeado" name="r2"
                                style="margin-right: 1rem;">
                            <label for="radioPrimary1">Declaro bajo penalidad de perjurio, que toda la
                                informacion
                                de proporcionalidad es correcta y verdidica.
                            </label>
                        </div>
                        <div class="col-12" style="text-align:center;">
                            <button onclick="Registrar_tramite()" id="btn_registro" class="btn btn-success btn-lg">
                                REGISTRAR TRAMITE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="../../js/console_tramite.js?rev=<?php echo time();?>"></script>
<script src="../../js/console_tramite.js"></script>

<script>
$(document).ready(function() {
    Select_tramite();
    Select_tdoc();
    validar_informacion();
});
$('#radioPrimary1').on('click', function() {
    document.getElementById('div_juridico').style.display = "none";
});
$('#radioPrimary2').on('click', function() {
    document.getElementById('div_juridico').style.display = "none";
});
$('#radioPrimary3').on('click', function() {
    document.getElementById('div_juridico').style.display = "flex";
});

$('#txt_archivo').on('change', function() {
    var ext = $(this).val().split('.').pop();
    console.log(ext);
    if ($(this).val() != '') {
        if (ext == "PDF" || ext == "pdf" || ext == "docx" || ext == "DOCX" || ext == "zip" || ext == "png" ||
            ext == "PNG" || ext == "jpg" || ext == "JPG" || ext == "jpeg" || ext == "JPEG" || ext == "rar" ||
            ext == "xlsx" || ext == "xls") {
            if ($(this)[0].files[0].size > 31457280) { //---- 30 MB 
                //if($(this)[0].files[0].size > 1048576){ // 1 MB
                //if($(this)[0].files[0].size > 10485760){ // ---> 10 MB
                Swal.fire("El archivo selecionado es demasiado pesado",
                    "<label style='color:#9B0000;'>seleccionar un archivo mas liviano</label>", "warning");
                $("#txt_archivo").val("");
                return;
                //$("#btn_subir").prop("disabled",true);
            } else {
                //$("#btn_subir").attr("disabled",false);
            }
            $("#txtformato").val(ext);
        } else {
            $("#txt_archivo").val("");
            Swal.fire("Mensaje de Error", "Extensión no permitida: " + ext, "", "error");
        }
    }
});
</script>