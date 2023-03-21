<?php
     require '../../Model/model_area.php';
     $MU= new Modelo_Area();
    $area=strtoupper(htmlspecialchars($_POST['a'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Registro_Area($area); 
    echo json_encode($consulta);
  

?>