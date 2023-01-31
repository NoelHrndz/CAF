<?php

    include_once "../controller/db.php";

    $emp = $_POST['emp'];
    $cod = $_POST['cod'];
    $cad = "";
            $sentencia = $base_de_datos->query("SELECT codigo_interno FROM activos_fijos WHERE cod_empresa='$emp' AND cod_af_SAP='$cod'");
            $codigos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($codigos as $codigo){
                $cad = $codigo->codigo_interno;
            }

        echo $cad;


?>