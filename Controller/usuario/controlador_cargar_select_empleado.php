<?php
    require '../../Model/model_usuario.php';
    $MU= new Modelo_Usuario();
    $consulta= $MU->Select_Empleado(); 
     echo json_encode($consulta);


?>