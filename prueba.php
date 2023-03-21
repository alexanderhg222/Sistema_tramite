<?php
    $probando='1234';
    $contra= password_hash($probando,PASSWORD_DEFAULT,['cost'=>12]);
    echo $contra;
    function encryytar($contraseña){
        $contra=password_hash($contraseña,PASSWORD_DEFAULT,['cost'=>12]);
        return $contra;
    }
    echo "////////////////////////";
    $prueba2=encryytar($probando);
    echo $prueba2;
?>