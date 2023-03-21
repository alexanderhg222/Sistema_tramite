<?php 
       
       require 'conexionbd.php';
        
        class Modelo_Tdoc extends conexionBD{
           
        public function Listar_Tdoc(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_TDOC()";
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
       
        public function Registro_Tdoc($tdoc){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRO_TDOC(?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$tdoc);
            $query->execute();
            if($row=$query->fetchColumn()){
                    return $row;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        
        public function Editar_Tdoc($id,$tdoc,$estado){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_EDITAR_TDOC(?,?,?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$id);
            $query->bindParam(2,$tdoc);
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