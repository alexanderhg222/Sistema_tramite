<?php
     require '../../Model/model_empleado.php';
     $MU= new Modelo_Empleado();
    $txt_ndoc=strtoupper(htmlspecialchars($_POST['txt_ndoc'],ENT_QUOTES,'UTF-8'));
    $txt_nombre=strtoupper(htmlspecialchars($_POST['txt_nombre'],ENT_QUOTES,'UTF-8'));
    $txt_apat=strtoupper(htmlspecialchars($_POST['txt_apat'],ENT_QUOTES,'UTF-8'));
    $txt_amat=strtoupper(htmlspecialchars($_POST['txt_amat'],ENT_QUOTES,'UTF-8'));
    $txt_cel=strtoupper(htmlspecialchars($_POST['txt_cel'],ENT_QUOTES,'UTF-8'));
    $txt_correo=strtoupper(htmlspecialchars($_POST['txt_correo'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Registro_Empleado($txt_ndoc,$txt_nombre,$txt_apat,$txt_amat,$txt_cel,$txt_correo); 
    echo json_encode($consulta);
  

?>