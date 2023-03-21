<?php
    require '../../Model/model_tdoc.php';
    $MU= new Modelo_Tdoc();
    $tdoc=strtoupper(htmlspecialchars($_POST['a'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Registro_Tdoc($tdoc); 
    echo json_encode($consulta);
  

?>

