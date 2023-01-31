<?php

    include_once "../controller/db.php";
    $cod_hr = $_POST['cod_hr'];
    $cod_emp = $_POST['cod_emp'];
    $cod_emp_af = "";
    $cod_af = "";

    try{
        $sentencia = $base_de_datos->query("SELECT cod_empresa_af,cod_af_SAP FROM hoja_responsabilidad WHERE 
        cod_hoja_responsabilidad='$cod_hr' AND cod_empresa='$cod_emp'");
        $hojas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        foreach($hojas as $hoja){
            $cod_emp_af = $hoja->cod_empresa_af;
            $cod_af = $hoja->cod_af_SAP;
        }
        $sentencia = $base_de_datos->query("UPDATE hoja_responsabilidad SET estado = 'X' WHERE cod_empresa = '$cod_emp'
        AND cod_hoja_responsabilidad = '$cod_hr'");
        $sentencia = $base_de_datos->query("UPDATE activos_fijos SET cod_empresa_empleados='1',cod_empleado_RRHH='N/A',
        cod_ubicacion='0' WHERE cod_empresa = '$cod_emp_af' AND cod_af_SAP = '$cod_af'");
        echo "Hoja Cancelada";
    }
    catch(PDOException $e){
        echo $e;
    }

?>