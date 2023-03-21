<?php
    session_start();
    if(!isset($_SESSION['S_ID'])){
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="../utilitarios/DataTables/datatables.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plantilla/plugins//fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../plantilla/dist//css/adminlte.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span><?php  echo $_SESSION['S_USU'];   ?></span>
                    </a>
                    <input type="text" id='txt_id_sesion_area' value='<?php echo $_SESSION['S_AREA']; ?>'>
                    <input type="text" id='txt_id_sesion_usu' value='<?php echo $_SESSION['S_ID']; ?>'>
                    <input type="text" id='txt_usu' value='<?php echo $_SESSION['S_USU']; ?>'>
                    <input type="text" id='txt_rol' value='<?php echo $_SESSION['S_ROL']; ?>'>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <div class="dropdown-divider"></div>
                        <a href="../Controller/usuario/controlador_cerrar_sesion.php" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> Cerrar Sesion
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../plantilla/dist//img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../plantilla/dist//img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <?php if( $_SESSION['S_ROL']=='ADMINISTRADOR'){ ?>
                            <a href="#" onclick="cargar_contenido('contenido_principal','tramite/view_tramite.php')  "
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tramite
                                </p>
                            </a>
                            <a href="#" onclick="cargar_contenido('contenido_principal','usuario/view_usuario.php')  "
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Usuario
                                </p>
                            </a>
                            <a href="#" onclick="cargar_contenido('contenido_principal','area/view_area.php')  "
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Area
                                </p>
                            </a>
                            <a href="#"
                                onclick="cargar_contenido('contenido_principal','tipo_documento/view_tipo_documento.php')  "
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tipo Documento
                                </p>
                            </a>
                            <a href="#" onclick="cargar_contenido('contenido_principal','empleado/view_empleado.php')  "
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Empleado
                                </p>
                            </a>
                            <?php };?>
                            <?php if( $_SESSION['S_ROL']=='TRABAJADOR'){ ?>
                            <a href="#"
                                onclick="cargar_contenido('contenido_principal','tramite_area/view_tramite_area.php')  "
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tramite Area
                                </p>
                            </a>

                            <?php };?>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="contenido_principal">
            <!-- Content Header (Page header) INICIOOOOOOOOOO -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
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
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">

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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script>
    function cargar_contenido(id, vista) {
        $("#" + id).load(vista);
    }
    </script>
    <!-- jQuery -->
    <script src="../plantilla/plugins//jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plantilla/plugins//bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plantilla/dist//js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../utilitarios/DataTables/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
        listar_usuario();
    });
    </script>
    <script src="../js/console_usuario.js?rev=<?php echo time();?>"></script>
    <script src="../js/console_area.js?rev=<?php echo time();?>"></script>
    <script src="../js/console_tdoc.js?rev=<?php echo time();?>"></script>
    <script src="../js/console_empleado.js?rev=<?php echo time();?>"></script>
    <script src="../js/console_tramite.js?rev=<?php echo time();?>"></script>
    <script src="../js/console_tramite_area.js?rev=<?php echo time();?>"></script>


</body>

</html>