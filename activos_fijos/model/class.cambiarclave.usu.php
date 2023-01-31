<?php

    $cod = $_POST['cod'];
    $clave = $_POST['clave'];
    $clave1 = md5($clave);
    $clave2 = md5($clave1);
    include_once "../controller/db.php";
    try{
         $sentencia = $base_de_datos->query("UPDATE usuarios SET clave='$clave2' WHERE cod_usuario='$cod'");
         echo "Contraseña Reestablecida";
    }
    catch(PDOException $e){
        echo $e;
    }
    

?>