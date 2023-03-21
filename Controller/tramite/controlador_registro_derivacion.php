<?php
      require '../../model/model_tramite.php';
      $MU = new Modelo_Tramite();//Instaciamos
    //DATOS DEL REMIENTE
    $select_origen = strtoupper(htmlspecialchars($_POST['select_origen'],ENT_QUOTES,'UTF-8'));
    $select_destino = strtoupper(htmlspecialchars($_POST['select_destino'],ENT_QUOTES,'UTF-8'));
    $txt_id_doc = strtoupper(htmlspecialchars($_POST['txt_id_doc'],ENT_QUOTES,'UTF-8'));
    $txt_descripcion = strtoupper(htmlspecialchars($_POST['txt_descripcion'],ENT_QUOTES,'UTF-8'));
    $idusaurio = strtoupper(htmlspecialchars($_POST['idusaurio'],ENT_QUOTES,'UTF-8'));
    $nombrearchivo = strtoupper(htmlspecialchars($_POST['nombrearchivo'],ENT_QUOTES,'UTF-8'));

    $ruta='controller/tramite/documentos/'.$nombrearchivo;
    $consulta = $MU->Registrar_Derivado($select_origen
    ,$select_destino
    ,$txt_id_doc
    ,$txt_descripcion
    ,$idusaurio,$nombrearchivo);
    echo $consulta;
    if($consulta==1){
        if(move_uploaded_file($_FILES['archivoobj']['tmp_name'],"documentos/".$nombrearchivo));
    }

?>