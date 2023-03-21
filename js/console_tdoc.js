var tbl_tdoc;
function listar_Fdoc() {
  tbl_tdoc = $("#tabla_tdoc").DataTable({
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
      url: "../Controller/tipodocumento/controlador_listar_tdoc.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "tipodo_descripcion" },
      { data: "tipo_documentofecha" },
      {
        data: "tipodo_estado",
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
          "<button onclick='prueba3()' id='prueba' class='editar3  btn btn-primary'><i class='fa fa-edit'></i></button> ",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json",
    },
    select: true,
  });
  tbl_tdoc.on("draw.td", function () {
    var PageInfo = $("#tabla_tdoc").DataTable().page.info();
    tbl_tdoc
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
//AbrirRegistroedit();
/*$("#tabla_tdoc").ready(function () {
  $("#tabla_tdoc").on("click", ".editar", function () {
    alert("entre oe cpp");
  });
});*/
function prueba3() {
  $("#tabla_tdoc").on("click", ".editar3", function () {
    var data = tbl_tdoc.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_tdoc.row(this).child.isShown()) {
      var data = tbl_tdoc.row(this).data();
    }
    $("#modal_editar_Fdoc").modal("show");

    document.getElementById("txt_tdoc_edit").value = data.tipodo_descripcion;
    document.getElementById("txt_idtdoc").value = data.tipodocumento_id;
    document.getElementById("txt_status").value = data.tipodo_estado;
  });
}
/////////////////////////////////REGISTRO
function AbrirRegistro2() {
  $("#modal_registro_Fdoc").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_Fdoc").modal("show");
}

/////////////////////////////////REGISTRO
function RegistrarTdoc() {
  let tdoc = document.getElementById("txt_tdoc").value;
  if (tdoc.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/tipodocumento/controlador_registro_tdoc.php",
    type: "POST",
    data: {
      a: tdoc,
    },
  }).done(function (resp) {
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva Tipo Documento Registrado",
          "success"
        ).then((value) => {
          document.getElementById("txt_tdoc").value = " ";
          tbl_tdoc.ajax.reload();
          $("#modal_registro_Fdoc").modal("hide");
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
function Editar_area() {
  let tdoc = document.getElementById("txt_tdoc_edit").value;
  let id = document.getElementById("txt_idtdoc").value;
  let estado = document.getElementById("txt_status").value;
  if (tdoc.length == 0 || id.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/tipodocumento/controlador_modificar_tdoc.php",
    type: "POST",
    data: {
      id: id,
      a: tdoc,
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
          document.getElementById("txt_tdoc_edit").value = " ";
          document.getElementById("txt_idtdoc").value = " ";
          document.getElementById("txt_status").value = " ";
          tbl_tdoc.ajax.reload();
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
