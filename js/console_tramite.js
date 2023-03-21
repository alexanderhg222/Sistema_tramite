var tbl_tramite;
function listar_tramite() {
  tbl_tramite = $("#tabla_tramite").DataTable({
    ordering: false,
    bLengthChange: true,
    searching: false,
    paging: false,
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    detroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../Controller/tramite/controlador_listar_tramite.php",
      type: "POST",
    },
    columns: [
      { data: "idocumento_id" },
      { data: "doc_nrodocumento" },
      { data: "tipodo_descripcion" },
      { data: "doc_dniremitente" },
      { data: "remitente" },
      {
        defaultContent:
          "<button onclick='pruebas_mas()' id='mas_datos' class='mas_datos btn btn-warning btn-sm'><i class=' fa fa-search-plus'></i></button> ",
      },
      {
        defaultContent:
          "<button onclick='pruebaseguimineto()' id='prueba' class='seguimiento  btn btn-danger btn-sm'><i class='fa fa-search'></i></button> ",
      },
      { data: "origen" },
      { data: "destino" },
      {
        data: "doc_status",
        render: function (data) {
          if (data == "PENDIENTE") {
            return '<span class="badge editar bg-success">PENDIENTE</span> ';
          }
          if (data == "RECHAZADO") {
            return '<span class="badge bg-warning">INACTIVO</span> ';
          }
          if (data == "FINALIZADO") {
            return '<span class="badge bg-danger">INACTIVO</span> ';
          }
        },
      },
      {
        defaultContent:
          "<button onclick='pruebasderivacion()' id='mas_datos' class='derivacion btn btn-info btn-sm'><i class='fa fa-edit'></i></button> ",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json",
    },
    select: true,
  });
}
//AbrirRegistroedit();
/*$("#tabla_tramite").ready(function () {
  $("#tabla_tramite").on("click", ".editar", function () {
    alert("entre oe cpp");
  });
});*/
function pruebaseguimineto() {
  $("#tabla_tramite").on("click", ".seguimiento", function () {
    var data = tbl_tramite.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_tramite.row(this).child.isShown()) {
      var data = tbl_tramite.row(this).data();
    }
    $("#modal_mostrar_seguimiento").modal("show");
    document.getElementById("label_titu").textContent =
      "SEGUIMIENTO TRAMITE " + data.idocumento_id;
    $("#tabla_seguimiento").dataTable().fnDestroy();
    listar_seguimiento(data.idocumento_id);
  });
}
function pruebasderivacion() {
  $("#tabla_tramite").on("click", ".derivacion", function () {
    var data = tbl_tramite.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_tramite.row(this).child.isShown()) {
      var data = tbl_tramite.row(this).data();
    }
    $("#modal_derivar").modal("show");

    Select_area2();

    document.getElementById("txt_fecha_registro").value =
      data.doc_fecharegistro;
    document.getElementById("select_origen").value = data.origen;
  });
}
function pruebas_mas() {
  $("#tabla_tramite").on("click", ".mas_datos", function () {
    var data = tbl_tramite.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_tramite.row(this).child.isShown()) {
      var data = tbl_tramite.row(this).data();
    }
    $("#modal_mas").modal("show");
    document.getElementById("txt_ndoc").value = data.doc_nrodocumento;
    document.getElementById("txt_folios").value = data.doc_folio;
    document.getElementById("txt_asunto").value = data.doc_asunto;
    document.getElementById("select_area_p").value = data.origen;
    document.getElementById("select_area_d").value = data.destino;
    document.getElementById("select_tipo_doc").value = data.tipodo_descripcion;

    document.getElementById("txt_dni").value = data.doc_dniremitente;
    document.getElementById("txt_nombre").value = data.doc_nombreremitente;
    document.getElementById("txt_apa").value = data.doc_apematremitente;
    document.getElementById("txt_ama").value = data.doc_apematremitente;
    document.getElementById("txt_email").value = data.doc_emailremitente;
    document.getElementById("txt_celular").value = data.doc_celularremitente;
    document.getElementById("txt_dir").value = data.doc_direccionremitente;
  });
}

function AbrirRegistro1() {
  $("#modal_registro_area").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_area").modal("show");
}
function RegistrarArea() {
  let area = document.getElementById("txt_area").value;
  if (area.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/area/controlador_registro_area.php",
    type: "POST",
    data: {
      a: area,
    },
  }).done(function (resp) {
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva Area Registrado",
          "success"
        ).then((value) => {
          document.getElementById("txt_area").value = " ";
          tbl_tramite.ajax.reload();
          $("#modal_registro_area").modal("hide");
        });
      } else {
        return Swal.fire(
          "Mensaje de Advertencia",
          "Dato ingresado ya se encuentra en la Base de datos",
          "warning"
        );
      }
    } else {
      return Swal.fire("Mensaje de ERROR", "Fallo de Registro", "error");
    }
  });
}
function Editar_area() {
  let id = document.getElementById("txt_idarea").value;
  let area = document.getElementById("txt_area_edit").value;
  let estado = document.getElementById("txt_status").value;
  if (area.length == 0 || id.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/area/controlador_modificar_area.php",
    type: "POST",
    data: {
      id: id,
      a: area,
      estado: estado,
    },
  }).done(function (resp) {
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Registro Actualizado",
          "success"
        ).then((value) => {
          document.getElementById("txt_idarea").value = " ";
          document.getElementById("txt_area_edit").value = " ";
          document.getElementById("txt_status").value = " ";
          tbl_tramite.ajax.reload();
          $("#modal_editar_area").modal("hide");
        });
      } else {
        return Swal.fire(
          "Mensaje de Advertencia",
          "Dato ingresado ya se encuentra en la Base de datos",
          "warning"
        );
      }
    } else {
      return Swal.fire("Mensaje de ERROR", "Fallo de Registro", "error");
    }
  });
}
function Select_tramite() {
  $.ajax({
    url: "../Controller/usuario/controlador_cargar_select_area.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      let cadena = "";
      for (let i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }
      document.getElementById("select_area_p").innerHTML = cadena;
      document.getElementById("select_area_d").innerHTML = cadena;
    } else {
      cadena += "<option '>NO DATOS'</option>";
    }
  });
}
function Select_tdoc() {
  $.ajax({
    url: "../Controller/tramite/controlador_cargar_select_tdoc.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      let cadena = "";
      for (let i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }
      document.getElementById("select_tipo_doc").innerHTML = cadena;
    } else {
      cadena += "<option '>NO DATOS'</option>";
    }
  });
}
function Registrar_tramite() {
  let txt_dni = document.getElementById("txt_dni").value;
  let txt_nombre = document.getElementById("txt_nombre").value;
  let txt_apa = document.getElementById("txt_apa").value;
  let txt_ama = document.getElementById("txt_ama").value;
  let txt_email = document.getElementById("txt_email").value;
  let txt_celular = document.getElementById("txt_celular").value;
  let txt_dir = document.getElementById("txt_dir").value;
  let idusu = document.getElementById("txt_id_sesion_usu").value;
  console.log(idusu);
  let presentacion = document.getElementsByName("r1");
  let vpresentacion = "";
  for (let i = 0; i < presentacion.length; i++) {
    if (presentacion[i].checked) {
      vpresentacion = presentacion[i].value;
    }
  }
  let ruc = document.getElementById("txt_ruc").value;
  let raz = document.getElementById("txt_razon").value;

  //DATOS DOCUMENTO
  let arp = document.getElementById("select_area_p").value;
  let ard = document.getElementById("select_area_d").value;
  let tip = document.getElementById("select_tipo_doc").value;
  let ndo = document.getElementById("txt_ndoc").value;
  let asu = document.getElementById("txt_asunto").value;
  let arc = document.getElementById("txt_archivo").value;
  let fol = document.getElementById("txt_folios").value;

  if (arc.length == 0) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Seleccine algun tipo de documento",
      "warning"
    );
  }
  let extension = arc.split(".").pop(); //DOCUMENTO.PPT
  let nombrearchivo = "";
  let f = new Date();
  if (arc.length > 0) {
    nombrearchivo =
      "ARCH" +
      f.getDate() +
      "" +
      (f.getMonth() + 1) +
      "" +
      f.getFullYear() +
      "" +
      f.getHours() +
      "" +
      f.getMilliseconds() +
      "." +
      extension;
  }

  if (
    txt_dni.length == 0 ||
    txt_nombre.length == 0 ||
    txt_apa.length == 0 ||
    txt_ama.length == 0 ||
    txt_email.length == 0 ||
    txt_celular.length == 0 ||
    txt_dir.length == 0
  ) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Llene todos los datos del remitente",
      "warning"
    );
  }

  if (
    arp.length == 0 ||
    tip.length == 0 ||
    ndo.length == 0 ||
    asu.length == 0 ||
    ard.length == 0 ||
    fol.length == 0
  ) {
    return Swal.fire(
      "Mensaje de Advertencia",
      "Llene todos los datos del documento",
      "warning"
    );
  }

  let formData = new FormData();
  let archivoobj = $("#txt_archivo")[0].files[0]; //El objeto del archivo adjuntado
  //////DATOS DEL REMITENTE
  formData.append("dni", txt_dni);
  formData.append("nom", txt_nombre);
  formData.append("apt", txt_apa);
  formData.append("apm", txt_ama);
  formData.append("cel", txt_email);
  formData.append("ema", txt_celular);
  formData.append("dir", txt_dir);
  formData.append("vpresentacion", vpresentacion);
  formData.append("ruc", ruc);
  formData.append("raz", raz);
  //////DATOS DEL DOCUMENTO
  formData.append("arp", arp);
  formData.append("ard", ard);
  formData.append("tip", tip);
  formData.append("ndo", ndo);
  formData.append("asu", asu);
  formData.append("nombrearchivo", nombrearchivo);
  formData.append("fol", fol);
  formData.append("idusu", idusu);
  formData.append("archivoobj", archivoobj);
  $.ajax({
    url: "../controller/tramite/controlador_registro_tramite.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (resp) {
      return Swal.fire(
        "Mensaje de Confirmacion",
        "Nuevo tramite registrado " + resp,
        "success",
        "warning"
      ).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        cargar_contenido("contenido_principal", "tramite/view_tramite.php");
      });
    },
  });
  return false;
}

function validar_informacion() {
  if (document.getElementById("chekeado").checked == false) {
    $("#btn_registro").addClass("disabled");
  } else {
    $("#btn_registro").removeClass("disabled");
  }
}
function cargar_contenido(id, vista) {
  $("#" + id).load(vista);
}

///SEGUIMIENTO
var tbl_seguimiento;
function listar_seguimiento(id) {
  tbl_seguimiento = $("#tabla_seguimiento").DataTable({
    ordering: false,
    bLengthChange: true,
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    detroy: true,
    async: false,
    paging: false,
    searching: false,
    processing: true,
    ajax: {
      url: "../Controller/tramite/controlador_listar_seguimiento.php",
      type: "POST",
      data: {
        id,
      },
    },
    columns: [
      { data: "area_nombre" },
      { data: "mov_fecharegistro" },
      { data: "mov_descripcion" },
      {
        data: "mov_archivo",
        render: function (data, type, row) {
          if (data == "") {
            return "<button onclick='' id='prueba2' class='  btn btn-danger btn-sm'><i class='fa fa-file-pdf' disabled></i></button>";
          } else {
            return "<button onclick='pruebaarchivo()' id='prueba2' class='archivo  btn btn-danger btn-sm'><i class='fa fa-file-pdf'></i></button>";
          }
        },
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json",
    },
    select: true,
  });
  tbl_seguimiento.detroy();
}
function pruebaarchivo() {
  $("#tabla_seguimiento").on("click", ".archivo", function () {
    var data = tbl_seguimiento.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_seguimiento.row(this).child.isShown()) {
      var data = tbl_seguimiento.row(this).data();
    }
    window.open("../" + data.mov_archivo);
  });
}
function pruebamas() {
  $("#tabla_mas").on("click", ".mas_datos", function () {
    var data = tbl_tramite.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_tramite.row(this).child.isShown()) {
      var data = tbl_tramite.row(this).data();
    }
    $("#modal_mas").modal("show");
  });
}
function Select_area2() {
  $.ajax({
    url: "../Controller/usuario/controlador_cargar_select_area.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      let cadena = "";
      for (let i = 0; i < data.length; i++) {
        if (data[i][1] != document.getElementById("select_origen").value) {
          cadena +=
            "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
        }
      }
      document.getElementById("select_destino").innerHTML = cadena;
    } else {
      cadena += "<option '>NO DATOS'</option>";
    }
  });
}
