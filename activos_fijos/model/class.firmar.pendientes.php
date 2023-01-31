<?php

    $cod_af = $_POST['cod_af'];
    $cod_emp_af = $_POST['cod_emp_af']; 
    include_once "../controller/db.php";
    $cad = "";
    $sentencia = $base_de_datos->query("SELECT t1.cod_hoja_responsabilidad,t1.cod_af_SAP,t1.cod_empresa_af,t1.cod_empresa,
    t2.nombre_empresa,t1.cod_empresa_empleados,t3.nombre_completo,t4.descripcion,t1.cod_ubicacion,t1.cod_empleado_RRHH FROM hoja_responsabilidad as t1 INNER JOIN empresas as t2 ON 
    t1.cod_empresa=t2.cod_empresa INNER JOIN empleados as t3 ON t1.cod_empleado_RRHH=t3.cod_empleado_RRHH and 
    t1.cod_empresa_empleados = t3.cod_empresa INNER JOIN activos_fijos as t4 ON t1.cod_af_SAP=t4.cod_af_SAP and
    t1.cod_empresa_af = t4.cod_empresa WHERE t1.cod_af_SAP='$cod_af' AND t1.cod_empresa_af='$cod_emp_af' AND t1.estado='F'");
    $codigos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($codigos as $codigo){
        $cad = $codigo->cod_empresa."_".$codigo->cod_empresa_empleados."_".$codigo->cod_empleado_RRHH."_".
        $codigo->nombre_completo."_".$codigo->cod_empresa_af."_".$codigo->cod_af_SAP."_".$codigo->descripcion."_".
        $codigo->cod_ubicacion;
    }
    echo $cad;

?>