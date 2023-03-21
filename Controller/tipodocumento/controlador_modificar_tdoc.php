<?php
     require '../../Model/model_tdoc.php';
     $MU= new Modelo_Tdoc();
    $id=strtoupper(htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8'));
    $tdoc=strtoupper(htmlspecialchars($_POST['a'],ENT_QUOTES,'UTF-8'));
    $estado=strtoupper(htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Editar_Tdoc($id,$tdoc,$estado); 
    echo json_encode($consulta);
  
?>