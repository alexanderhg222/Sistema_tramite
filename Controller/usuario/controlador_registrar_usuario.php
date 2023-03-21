<?php
    require '../../Model/model_usuario.php';
    $MU= new Modelo_Usuario();
    $txt_usuario=strtoupper(htmlspecialchars($_POST['txt_usuario'],ENT_QUOTES,'UTF-8'));
    $txt_contra=strtoupper(htmlspecialchars($_POST['txt_contra'],ENT_QUOTES,'UTF-8'));
    $txt_area=strtoupper(htmlspecialchars($_POST['txt_area'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Registro_Usuario($txt_usuario,$txt_contra,$txt_area); 
    echo json_encode($consulta);
  

?>