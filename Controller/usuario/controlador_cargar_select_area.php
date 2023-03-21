<?php
    require '../../Model/model_usuario.php';
    $MU= new Modelo_Usuario();
    $consulta= $MU->Select_Area(); 
     echo json_encode($consulta);


?>