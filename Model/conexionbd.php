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
       /* $host = 'containers-us-west-115.railway.app';
            $port = '6217';
            $db   = 'railway';
            $user = 'root';
            $pass = 'laLJSxvE37agsFrEGDto';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
            try {
                $pdo = new PDO($dsn, $user, $pass);
            } catch (PDOException $e) {
                throw new \DOException($e->getMessage(), (int)$e->getCode());
            }*/
    }
    function cerrar_conexion(){
        $this->$pdo=null;
    }
}


/* Conectar a una base de datos de MySQL invocando al controlador 
./$dsn = 'mysql:dbname=railway;host=containers-us-west-37.railway.app';
$usuario = 'root';
$contraseña = 'dmnk9Dy2SFCA3bOb1TSu';

try {
    $gbd = new PDO($dsn, $usuario, $contraseña);
    
} catch (PDOException $e) {
    echo 'Falló la conexión: LLEGUE ACA ' . $e->getMessage();
}
*/

?>