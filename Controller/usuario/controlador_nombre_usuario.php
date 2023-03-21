<?php
    require '../../Model/model_usuario.php';
    $MU= new Modelo_Usuario();
    $cap=strtoupper(htmlspecialchars($_POST['cap'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Select_usuario_nombre($cap); 
     echo json_encode($consulta);


?>