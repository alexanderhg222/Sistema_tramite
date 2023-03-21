<?php
    require '../../Model/model_tramite.php';
    $MU= new Modelo_Tramite();
    $consulta= $MU->Select_Tdoc(); 
    echo json_encode($consulta);

?>