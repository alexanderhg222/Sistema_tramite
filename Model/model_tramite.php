<?php 
       
       require 'conexionbd.php';
        
        class Modelo_Tramite extends conexionBD{
           
        public function Listar_Tramite(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_TRAMITE()";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
               $arreglo["data"][]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        
        public function Registro_Area($area){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRO_AREA(?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$area);
            $query->execute();
            if($row=$query->fetchColumn()){
                    return $row;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        public function Editar_Area($id,$area,$estado){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_EDITAR_AREA(?,?,?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$id);
            $query->bindParam(2,$area);
            $query->bindParam(3,$estado);
            $query->execute();
            if($row=$query->fetchColumn()){
                    return $row;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        public function Select_Tdoc(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_SELECT_TDOC()";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->execute();
            $resultado=$query->fetchAll();
            foreach($resultado as $resp){
               $arreglo[]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        public function Registrar_Tramite($dni,$nom,$apt,$apm,$cel,$ema,$dir,$vpresentacion,$ruc,$raz,$arp,$ard,$tip,$ndo,$asu,$ruta,$fol,$usu){
            $c = conexionBD::conexionPDO();
            $sql = "CALL SP_REGISTRAR_TRAMITE(?,?,?,
            ?,?,?
            ,?,?,?
            ,?,?,?
            ,?,?,?
            ,?,?,?)";
            $arreglo = array();
            $query  = $c->prepare($sql);
            $query -> bindParam(1,$dni);
            $query -> bindParam(2,$nom);
            $query -> bindParam(3,$apt);
            $query -> bindParam(4,$apm);
            $query -> bindParam(5,$cel);
            $query -> bindParam(6,$ema);
            $query -> bindParam(7,$dir);
            $query -> bindParam(8,$vpresentacion);
            $query -> bindParam(9,$ruc);
            $query -> bindParam(10,$raz);
            $query -> bindParam(11,$arp);
            $query -> bindParam(12,$ard);
            $query -> bindParam(13,$tip);
            $query -> bindParam(14,$ndo);
            $query -> bindParam(15,$asu);
            $query -> bindParam(16,$ruta);
            $query -> bindParam(17,$fol); 
            $query -> bindParam(18,$usu);           
            $query->execute();
            if($row=$query->fetchColumn()){
                return $row;
            }
            
            return $resultado[0][0];

            conexionBD::cerrar_conexion();
        }
        public function Listar_Seguimiento($id){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_SEGUIMIENTO(?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query -> bindParam(1,$id); 
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
               $arreglo["data"][]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }

        public function Listar_Tramite_Area($id){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_TRAMITE_AREA(?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query -> bindParam(1,$id);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
               $arreglo["data"][]=$resp;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        public function Registrar_Derivado($select_origen,$select_destino,$txt_id_doc,$txt_descripcion
            ,$idusaurio,$nombrearchivo){
                $c = conexionBD::conexionPDO();
                $sql = "CALL SP_REGISTRAR_DERIVAR(?,?,?,?,?,?)";
                $arreglo = array();
                $query  = $c->prepare($sql);
                $query -> bindParam(1,$txt_id_doc);
                $query -> bindParam(2,$select_origen);
                $query -> bindParam(3,$select_destino);
                $query -> bindParam(4,$txt_descripcion);
                $query -> bindParam(5,$idusaurio);
                $query -> bindParam(6,$nombrearchivo);            
                $query->execute();
                if($row=$query->fetchColumn()){
                    return $row;
                }
                
                return $resultado[0][0];
    
                
    
                conexionBD::cerrar_conexion();
            }

    }

?>