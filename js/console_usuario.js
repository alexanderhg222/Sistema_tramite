function iniciar_sesion() {
  recuerdame();
  let usu = document.getElementById("txt_usuario").value;
  let contra = document.getElementById("txt_contra").value;
  if (usu.length == 0 || contra.length == 0) {
    return Swal.fire({
      icon: "error",
      title: "Mensaje de advertencia",
      text: "datos vacios",
      heightAuto: false,
    });
  }
  $.ajax({
    url: "Controller/usuario/controlador_iniciar_sesion.php",
    type: "POST",
    data: {
      u: usu,
      c: contra,
    },
  }).done(function (resp) {
    let data = JSON.parse(resp);

    if (data.length > 0) {
      if (data[0][10] == "INACTIVO") {
        Swal.fire({
          icon: "success",
          title: "Mensaje de advertencia",
          text: "cuenta inactiva",
          heightAuto: false,
        });
      }

      $.ajax({
        url: "Controller/usuario/controlador_crear_sesion.php",
        type: "POST",
        data: {
          idusuario: data[0][0],
          idarea: data[0][6],
          usuario: data[0][1],
          rol: data[0][9],
        },
      }).done(function (r) {
        let timerInterval;
        Swal.fire({
          title: "Bienvenido al sistema",
          html: "Seras redireccionado en <b></b> milliseconds.",
          timer: 2000,
          heightAuto: false,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft();
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            location.reload();
          }
        });
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Mensaje de advertencia",
        text: "datos incorrestos",
        heightAuto: false,
      });
    }
  });
}
function recuerdame() {
  if (rmcheck.checked && usuarioInput.value != "" && passInput.value != "") {
    localStorage.usuario = usuarioInput.value;
    localStorage.pass = passInput.value;
    localStorage.checkbox = rmcheck.value;
  } else {
    localStorage.usuario = "";
    localStorage.pass = "";
    localStorage.checkbox = "";
  }
}

var tbl_usuario;
function listar_usuario() {
  tbl_usuario = $("#tabla_usuario").DataTable({
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
      url: "../Controller/usuario/controlador_listar_usuario.php",
      type: "POST",
    },
    columns: [
      { defaultContent: "" },
      { data: "usu_usuario" },
      { data: "area_nombre" },
      { data: "usu_rol" },
      { data: "empleado" },
      {
        data: "usu_estatus",
        render: function (data) {
          if (data === "ACTIVO") {
            return '<span class="badge bg-success">ACTIVO</span> ';
          } else {
            return '<span class="badge bg-danger">INACTIVO</span> ';
          }
        },
      },
      {
        defaultContent:
          "<button onclick='pruebau()' id='pruebau' class='editaru  btn btn-primary'><i class='fa fa-edit'></i></button> ",
      },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.13.3/i18n/es-ES.json",
    },
    select: true,
  });
  tbl_usuario.on("draw.td", function () {
    var PageInfo = $("#tabla_usuario").DataTable().page.info();
    tbl_usuario
      .column(0, { page: "current" })
      .nodes()
      .each(function (cell, i) {
        cell.innerHTML = i + 1 + PageInfo.start;
      });
  });
}
function pruebau() {
  $("#tabla_usuario").on("click", ".editaru", function () {
    var data = tbl_usuario.row($(this).parents("tr")).data();
    //en tamaño escritorio
    if (tbl_usuario.row(this).child.isShown()) {
      var data = tbl_usuario.row(this).data();
    }
    $("#modal_editar_Usu").modal("show");
    document.getElementById("usuario_id").value = data.usu_id;
    document.getElementById("selec_area_edit").value = data.area_id;
    document.getElementById("txt_status").value = data.usu_estatus;
  });
}
function AbrirRegistro_usuario() {
  $("#modal_registro_usuario").modal({ backdrop: "static", keyboard: false });
  $("#modal_registro_usuario").modal("show");
}

/////////////////////////////////REGISTRO
function Registrarusuario() {
  let txt_usuario = document.getElementById("txt_usuario").value;
  let txt_contra = document.getElementById("txt_contra").value;
  let txt_area = document.getElementById("selec_area").value;
  console.log(document.getElementById("selec_area").value);

  if (
    txt_usuario.length == 0 ||
    txt_contra.length == 0 ||
    txt_area.length == 0
  ) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/usuario/controlador_registrar_usuario.php",
    type: "POST",
    data: {
      txt_usuario,
      txt_contra,
      txt_area,
    },
  }).done(function (resp) {
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Nueva Usuario Registrado",
          "success"
        ).then((value) => {
          tbl_usuario.ajax.reload();
          $("#modal_registro_usuario").modal("hide");
          document.getElementById("txt_usuario").value = "";
          document.getElementById("txt_contra").value = "";
          document.getElementById("selec_area").value = "";
          document.getElementById("selec_empleado").value = "";
          tbl_usuario.ajax.reload();
          $("#modal_registro_usuario").modal("hide");
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
/////////////////////////////////REGISTRO
function Select_empleado() {
  $.ajax({
    url: "../Controller/usuario/controlador_cargar_select_empleado.php",
    type: "POST",
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      let cadena = "";
      for (let i = 0; i < data.length; i++) {
        cadena +=
          "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
      }
      document.getElementById("selec_empleado").innerHTML = cadena;
    } else {
      cadena += "<option '>NO DATOS'</option>";
    }
  });
}
function Select_area() {
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
      document.getElementById("selec_area").innerHTML = cadena;
      document.getElementById("selec_area_edit").innerHTML = cadena;
    } else {
      cadena += "<option '>NO DATOS'</option>";
    }
  });
}

function onchange_u() {
  let cap = document.getElementById("selec_empleado").value;

  $.ajax({
    url: "../Controller/usuario/controlador_nombre_usuario.php",
    type: "POST",
    data: {
      cap,
    },
  }).done(function (resp) {
    let data = JSON.parse(resp);
    if (data.length > 0) {
      document.getElementById("txt_usuario").innerHTML = data[0].emple_nombre;
      document.getElementById("txt_usuario").value = data[0].emple_nombre;
    } else {
      document.getElementById("txt_usuario").innerHTML = "ERROR";
    }
  });
}

/////////////////////////////////////////EDITAR//////////////////
function Editar_Usuario() {
  let id = document.getElementById("usuario_id").value;
  let area = document.getElementById("selec_area_edit").value;
  let estado = document.getElementById("txt_status").value;
  if (estado.length == 0 || id.length == 0) {
    return Swal.fire("Mensaje de Advertencia", "Campos Vacios", "warning");
  }
  $.ajax({
    url: "../Controller/usuario/controlador_modificar_usuario.php",
    type: "POST",
    data: {
      id,
      area,
      estado,
    },
  }).done(function (resp) {
    if (resp[1] > 0) {
      if (resp[1] == 1) {
        return Swal.fire(
          "Mensaje de Confirmacion",
          "Registro Actualizado",
          "success"
        ).then((value) => {
          document.getElementById("usuario_id").value = " ";
          document.getElementById("selec_area_edit").value = " ";
          document.getElementById("txt_status").value = " ";
          tbl_usuario.ajax.reload();
          $("#modal_editar_Usu").modal("hide");
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
