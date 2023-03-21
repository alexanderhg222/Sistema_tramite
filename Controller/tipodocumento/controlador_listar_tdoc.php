<?php
    require '../../Model/model_tdoc.php';
    $MU= new Modelo_Tdoc();
    $consulta= $MU->Listar_Tdoc(); 
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