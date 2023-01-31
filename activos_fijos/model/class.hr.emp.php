<?php

    include_once "../controller/db.php";
    $emp = $_POST['emp'];
    $rrhh = $_POST['rrhh'];
    $cad = "";
    $sentencia = $base_de_datos->query("SELECT * FROM empleados WHERE cod_empleado_RRHH='$rrhh' AND cod_empresa='$emp'");
    $empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($empleados as $empleado){
        $cad = $empleado->nombre_completo."_".$empleado->cod_empleado_RRHH."_".$empleado->cod_empresa;
    }
    echo $cad;

?>