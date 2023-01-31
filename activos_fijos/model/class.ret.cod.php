<?php

    include_once "../controller/db.php";
    $ncod = 0;
    $sentencia = $base_de_datos->query("SELECT cod_usuario FROM usuarios ORDER BY cod_usuario ASC");
    $codigos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($codigos as $codigo){
        $ncod = $codigo->cod_usuario + 1 ;
    }
    echo $ncod;
?>