<?php
require '../../Model/model_empleado.php';
     $MU= new Modelo_Empleado();
    $txt_ndoc=strtoupper(htmlspecialchars($_POST['txt_ndoc_edit'],ENT_QUOTES,'UTF-8'));
    $txt_nombre=strtoupper(htmlspecialchars($_POST['txt_nombre_edit'],ENT_QUOTES,'UTF-8'));
    $txt_apat=strtoupper(htmlspecialchars($_POST['txt_apat_edit'],ENT_QUOTES,'UTF-8'));
    $txt_amat=strtoupper(htmlspecialchars($_POST['txt_amat_edit'],ENT_QUOTES,'UTF-8'));
    $txt_cel=strtoupper(htmlspecialchars($_POST['txt_cel_edit'],ENT_QUOTES,'UTF-8'));
    $txt_correo=strtoupper(htmlspecialchars($_POST['txt_correo_edit'],ENT_QUOTES,'UTF-8'));
    $txt_status=strtoupper(htmlspecialchars($_POST['txt_status'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Editar_Empleado($txt_ndoc,$txt_nombre,$txt_apat,$txt_amat,$txt_cel,$txt_correo,$txt_status); 
    echo json_encode($consulta);
?>