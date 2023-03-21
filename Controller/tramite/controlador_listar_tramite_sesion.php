<?php
    require '../../Model/model_tramite.php';
    $MU= new Modelo_Tramite();
    $idusaurio = strtoupper(htmlspecialchars($_POST['idusaurio'],ENT_QUOTES,'UTF-8'));
    $consulta= $MU->Listar_Tramite_Area($idusaurio); 
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