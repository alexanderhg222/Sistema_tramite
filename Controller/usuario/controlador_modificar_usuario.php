<?php
    require '../../Model/model_usuario.php';
    $MU= new Modelo_Usuario();
    $id=strtoupper(htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8'));
    $area=strtoupper(htmlspecialchars($_POST['area'],ENT_QUOTES,'UTF-8'));
    $estado=strtoupper(htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Editar_Usuario($id,$area,$estado); 
    echo json_encode($consulta);
  
?>