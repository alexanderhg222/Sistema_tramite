<?php 
       
       require 'conexionbd.php';
        
        class Modelo_Area extends conexionBD{
           
        public function Listar_Area(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_AREA()";
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
    }

?>