<?php
    require '../../Model/model_tramite.php';
    $MU= new Modelo_Tramite();
    $consulta= $MU->Listar_Tramite(); 
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