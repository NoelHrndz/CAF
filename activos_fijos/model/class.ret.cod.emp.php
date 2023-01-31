<?php

    include_once "../controller/db.php";
    $cod = $_POST['cod'];
    $sentencia = $base_de_datos->query("SELECT * FROM empresas WHERE cod_empresa='$cod'");
    $empresas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $cemp = "";
    foreach($empresas as $empresa){
        $cemp = $empresa->cod_empresa.'-'.$empresa->nombre_empresa.'-'.$empresa->nombre_BD_SAP."-".$empresa->estado;
    }
    echo $cemp;
?>