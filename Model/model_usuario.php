<?php 
       
       require 'conexionbd.php';
      
        
        class Modelo_Usuario extends conexionBD{
            
            public function Verificar_Usuario($usu,$con){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_VERIFICAR_USUARIO(?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$usu);
            $query->execute();
            $resultado=$query->fetchAll();
            foreach($resultado as $resp){
                if(password_verify($con,$resp['usu_contra'])){
                    $arreglo[]=$resp;
                }
               
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        public function Listar_Usuario(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_LISTAR_USUARIO()";
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
        public function Registro_Usuario($usuario,$contra,$area){
            function encryytar($contraseña){
                $contra=password_hash($contraseña,PASSWORD_DEFAULT,['cost'=>12]);
                return $contra;
            }
            $c=conexionBD::conexionPDO();
            $contra2=encryytar($contra);
            $sql="CALL SP_REGISTRAR_USUARIO(?,?,?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$usuario);
            $query->bindParam(2,$contra2);
            $query->bindParam(3,$area);
            $query->execute();
            if($row=$query->fetchColumn()){
                    return $row;
            }
            return $arreglo;
            conexionBD::cerrar_conexion();
        }
        public function Select_Empleado(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_SELECT_EMPLEADO()";
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
        public function Select_Area(){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_SELECT_AREA()";
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
        
        public function Select_usuario_nombre($cap){
            $c=conexionBD::conexionPDO();
            $sql="CALL SP_BUSCAR_USUARIO(?)";
            $arreglo=array();
            $query=$c->prepare($sql);
            $query->bindParam(1,$cap);
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
               $arreglo[]=$resp;
            }
            return $arreglo;
            
            conexionBD::cerrar_conexion();
        }
        public function Editar_Usuario($id,$area,$estado){
                $c=conexionBD::conexionPDO();
                $sql="CALL SP_EDITAR_USU(?,?,?)";
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
