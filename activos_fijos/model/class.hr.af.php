<?php

    include_once "../controller/db.php";
    $emp = $_POST['emp'];
    $af = $_POST['af'];
    $cad = "";
    $sentencia = $base_de_datos->query("SELECT * FROM activos_fijos WHERE cod_af_SAP='$af' AND cod_empresa='$emp'");
    $activos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($activos as $activo){
        $cad = $activo->descripcion."~".$activo->cod_af_SAP."~".$activo->cod_empresa;
    }
    echo $cad;

?>