<?php
     require '../../Model/model_area.php';
     $MU= new Modelo_Area();
    $id=strtoupper(htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8'));
    $area=strtoupper(htmlspecialchars($_POST['a'],ENT_QUOTES,'UTF-8'));
    $estado=strtoupper(htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Editar_Area($id,$area,$estado); 
    echo json_encode($consulta);
  

?>