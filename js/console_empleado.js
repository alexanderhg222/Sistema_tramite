var tbl_empleado;
function listar_Empleado() {
  tbl_empleado = $("#tabla_empleado").DataTable({
    ordering: false,
    bLengthChange: true,
    searching: { regex: false },
    lengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    pageLength: 10,
    detroy: true,
    async: false,
    processing: true,
    ajax: {
      url: "../Controller/empleado/controlador_listar_empleado.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "emple_nrodocumento" },
      { data: "emple" },
      { data: "emple_feccreacion" },
      { data: "emple_movil" },
      { data: "emple_email" },
      {
        data: "emple_status",
        render: function (data) {
          if (data == "ACTIVO") {
            return '<span class="badge editar bg-success">ACTIVO</span> ';
          } else {
            return '<span class="badge bg-danger">INACTIVO</span> ';
          }
        },
      },
      {
        defaultContent:
          "<button onclick='prueba()' id='prueba' class='editar  btn btn-primary'><i class='fa fa-edit'></i></button> ",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json",
    },
    select: true,
  });
  tbl_empleado.on("draw.td", function () {
    var PageInfo = $("#tabla_empleado").DataTable().page.info();
    tbl_empleado
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
//AbrirRegistroedit();
/*$("#tabla_empleado").ready(function () {
  $("#tabla_empleado").on("click", ".editar", function () {
    alert("entre oe cpp");
  });
});*/
function prueba() {
  $("#tabla_empleado").on("click", ".editar", function () {
    var data = tbl_empleado.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_empleado.row(this).child.isShown()) {
      var data = tbl_empleado.row(this).data();
    }
    $("#modal_editar_Fdoc").modal("show");
    document.getElementById("txt_ndoc_edit").value = data.emple_nrodocumento;
    document.getElementById("txt_nombre_edit").value = data.emple_nombre;
    document.getElementById("txt_apat_edit").value = data.emple_apepat;
    document.getElementById("txt_amat_edit").value = data.emple_apemat;
    document.getElementById("txt_cel_edit").value = data.emple_movil;
    document.getElementById("txt_correo_edit").value = data.emple_email;
    document.getElementById("txt_status").value = data.emple_status;
  });
}
/////////////////////////////////REGISTRO
function AbrirRegistro() {
  $("#modal_registro_empleado").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_empleado").modal("show");
}

/////////////////////////////////REGISTRO
function RegistrarEmpleado() {
  let txt_ndoc = document.getElementById("txt_ndoc").value;
  let txt_nombre = document.getElementById("txt_nombre").value;
  let txt_apat = document.getElementById("txt_apat").value;
  let txt_amat = document.getElementById("txt_amat").value;
  let txt_cel = document.getElementById("txt_cel").value;
  let txt_correo = document.getElementById("txt_correo").value;
  if (txt_ndoc.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/empleado/controlador_registro_empleado.php",
    type: "POST",
    data: {
      txt_ndoc: txt_ndoc,
      txt_nombre: txt_nombre,
      txt_apat: txt_apat,
      txt_amat: txt_amat,
      txt_cel: txt_cel,
      txt_correo: txt_correo,
    },
  }).done(function (resp) {
    alert(resp);
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva Tipo Documento Registrado",
          "success"
        ).then((value) => {
          document.getElementById("txt_ndoc").value = " ";
          document.getElementById("txt_nombre").value = " ";
          document.getElementById("txt_apat").value = " ";
          document.getElementById("txt_amat").value = " ";
          document.getElementById("txt_cel").value = " ";
          document.getElementById("txt_correo").value = " ";
          tbl_empleado.ajax.reload();
          $("#modal_registro_empleado").modal("hide");
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
/////////////////////////////////////////EDITAR//////////////////
function Editar_Empleado() {
  let txt_ndoc_edit = document.getElementById("txt_ndoc_edit").value;
  let txt_nombre_edit = document.getElementById("txt_nombre_edit").value;
  let txt_apat_edit = document.getElementById("txt_apat_edit").value;
  let txt_amat_edit = document.getElementById("txt_amat_edit").value;
  let txt_cel_edit = document.getElementById("txt_cel_edit").value;
  let txt_correo_edit = document.getElementById("txt_correo_edit").value;
  let txt_status = document.getElementById("txt_status").value;
  if (txt_ndoc_edit.length == 0 || txt_nombre_edit.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/empleado/controlador_modificar_empleado.php",
    type: "POST",
    data: {
      txt_ndoc_edit: txt_ndoc_edit,
      txt_nombre_edit: txt_nombre_edit,
      txt_apat_edit: txt_apat_edit,
      txt_amat_edit: txt_amat_edit,
      txt_cel_edit: txt_cel_edit,
      txt_correo_edit: txt_correo_edit,
      txt_status: txt_status,
    },
  }).done(function (resp) {
    alert(resp);
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Registro Actualizado",
          "success"
        ).then((value) => {
          document.getElementById("txt_ndoc_edit").value = " ";
          document.getElementById("txt_nombre_edit").value = " ";
          document.getElementById("txt_apat_edit").value = " ";
          document.getElementById("txt_amat_edit").value = " ";
          document.getElementById("txt_cel_edit").value = " ";
          document.getElementById("txt_correo_edit").value = " ";
          document.getElementById("txt_status").value = " ";
          tbl_empleado.ajax.reload();
          $("#modal_editar_Fdoc").modal("hide");
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
