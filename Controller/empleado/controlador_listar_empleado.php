<?php
    require '../../Model/model_empleado.php';
    $MU= new Modelo_Empleado();
    $consulta= $MU->Listar_Empleado(); 
    if($consulta){
        echo json_encode($consulta);
        
    }else{
        echo '{
            "sEcho":1,
            "iTotalRecords":"0",
            "iTotalDisplayRecords":"0",
            "aaData":[]
        }';
    }



?>