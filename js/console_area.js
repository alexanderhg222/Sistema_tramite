var tbl_area;
function listar_area() {
  tbl_area = $("#tabla_area").DataTable({
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
      url: "../Controller/area/controlador_listar_area.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "area_nombre" },
      { data: "area_fecha_registro" },
      {
        data: "area_estado",
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
          "<button onclick='prueba1()' id='prueba' class='editar1  btn btn-primary'><i class='fa fa-edit'></i></button> ",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json",
    },
    select: true,
  });
  tbl_area.on("draw.td", function () {
    var PageInfo = $("#tabla_area").DataTable().page.info();
    tbl_area
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
//AbrirRegistroedit();
/*$("#tabla_area").ready(function () {
  $("#tabla_area").on("click", ".editar", function () {
    alert("entre oe cpp");
  });
});*/
function prueba1() {
  $("#tabla_area").on("click", ".editar1", function () {
    var data = tbl_area.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_area.row(this).child.isShown()) {
      var data = tbl_area.row(this).data();
    }
    $("#modal_editar_area").modal("show");
    document.getElementById("txt_area_edit").value = data.area_nombre;
    document.getElementById("txt_idarea").value = data.area_cod;
    document.getElementById("txt_status").value = data.area_estado;
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
          tbl_area.ajax.reload();
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
          tbl_area.ajax.reload();
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
