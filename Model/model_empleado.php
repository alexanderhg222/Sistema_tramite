<?php 
       
       require 'conexionbd.php';
        
        class Modelo_Empleado extends conexionBD{
           
        public function Listar_Empleado(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_EMPLEADO()";
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
       
        public function Registro_Empleado($txt_ndoc,$txt_nombre,$txt_apat,$txt_amat,$txt_cel,$txt_correo){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_REGISTRO_EMPLEADO(?,?,?,?,?,?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$txt_ndoc);
            $query->bindParam(2,$txt_nombre);
            $query->bindParam(3,$txt_apat);
            $query->bindParam(4,$txt_amat);
            $query->bindParam(5,$txt_cel);
            $query->bindParam(6,$txt_correo);
            $query->execute();
            if($row=$query->fetchColumn()){
                    return $row;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        
        public function Editar_Empleado($txt_ndoc,$txt_nombre,$txt_apat,$txt_amat,$txt_cel,$txt_correo,$txt_status){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_EDITAR_EMPLEADO(?,?,?,?,?,?,?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$txt_ndoc);
            $query->bindParam(2,$txt_nombre);
            $query->bindParam(3,$txt_apat);
            $query->bindParam(4,$txt_amat);
            $query->bindParam(5,$txt_cel);
            $query->bindParam(6,$txt_correo);
            $query->bindParam(7,$txt_status);
            $query->execute();
            if($row=$query->fetchColumn()){
                    return $row;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
    }

?>