<?php

class conexionBD{
    private $pdo;
    public function conexionPDO(){
        $host ="localhost";
        $usuario="root";
        $contrasena="";
        $bdname="tramitedoc2";
        try {
            $pdo=new PDO("mysql:host=$host;dbname=$bdname",$usuario,$contrasena);
            //$pdo->setAtribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8");
            return $pdo;
        } catch (PDOException $e) {
            echo 'Fallo de conexion' . $e->getMessage();
        }
    }
    function cerrar_conexion(){
        $this->$pdo=null;
    }
}






















/* Conectar a una base de datos de MySQL invocando al controlador */
$dsn = 'mysql:dbname=tramitedoc2;host=127.0.0.1';
$usuario = 'root';
$contraseña = '';

try {
    $gbd = new PDO($dsn, $usuario, $contraseña);
    
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>