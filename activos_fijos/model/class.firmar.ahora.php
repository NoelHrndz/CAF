<?php
    $empresa = $_POST['empresa'];
    $empresa_empleado = $_POST['empresa_empleado'];
    $cod_empleado = $_POST['cod_empleado'];
    $cod_activo = $_POST['cod_activo'];
    $empresa_activo = $_POST['empresa_activo'];
    $ubicacion = $_POST['ubicacion'];
    $firma = $_POST['firma'];
    date_default_timezone_set('America/Mexico_City');
    $fechahora = date('d-m-y h:i:s');
    session_start();
    $cod_usuario = $_SESSION['sesion_af'][2];
    //echo $empresa." ".$empresa_empleado." ".$cod_empleado." ".$empresa_activo." ".$cod_activo." ".$usuario." ".$ubicacion." ".$fechahora;
    include_once "../controller/db.php";
    $ncod = 0;
    try{
        $sentencia = $base_de_datos->query("SELECT * FROM hoja_responsabilidad WHERE cod_af_SAP='$cod_activo' AND cod_empresa_af='$empresa_activo' AND estado='F'");
        $pendiente = $sentencia->rowCount();
        if($pendiente == "0"){
            $sentencia = $base_de_datos->query("SELECT * FROM hoja_responsabilidad WHERE cod_af_SAP='$cod_activo' AND cod_empresa_af='$empresa_activo' AND estado='A'");
            $duple = $sentencia->rowCount();
            if($duple=="0"){            
            $sentencia = $base_de_datos->query("SELECT cod_hoja_responsabilidad FROM hoja_responsabilidad WHERE cod_empresa='$empresa' ORDER BY cod_usuario ASC");
            $cantidad = $sentencia->rowCount();
            if($cantidad == "0"){
                $ncod = 1;
            }
            else{
            $codigos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($codigos as $codigo){
                $ncod = $codigo->cod_hoja_responsabilidad + 1 ;
            }
            }
            $corr = "";
            if($ncod<10){
                $corr = "00000".$ncod;
            }
            else if($ncod>=10 && $ncod<100){
                $corr = "0000".$ncod;
            }
            else if($ncod>=100 && $ncod<1000){
                $corr = "000".$ncod;
            }
            else if($ncod>=1000 && $ncod<10000){
                $corr = "00".$ncod;
            }
            else if($ncod>=10000 && $ncod<100000){
                $corr = "0".$ncod;
            }
            else if($ncod>=100000 && $ncod<1000000){
                $corr = "".$ncod;
            }
            $sentencia = $base_de_datos->query("INSERT INTO hoja_responsabilidad(cod_hoja_responsabilidad,cod_empresa,cod_empresa_empleados,
            cod_empleado_RRHH,cod_empresa_af,cod_af_SAP,cod_usuario,cod_ubicacion,fecha_creacion_hoja,estado,fecha_asignacion_hoja,firma_empleado_entrega) VALUES ('$corr','$empresa',
            '$empresa_empleado','$cod_empleado','$empresa_activo','$cod_activo','$cod_usuario','$ubicacion','$fechahora','A','$fechahora','$firma')");
            $sentencia = $base_de_datos->query("UPDATE activos_fijos SET cod_empresa_empleados='$empresa_empleado',cod_empleado_RRHH='$cod_empleado',
            cod_ubicacion='$ubicacion' WHERE cod_empresa='$empresa_activo' AND cod_af_SAP='$cod_activo'");
            }
        }
        else{
            $sentencia = $base_de_datos->query("UPDATE hoja_responsabilidad SET estado='A', fecha_asignacion_hoja='$fechahora',
            firma_empleado_entrega='$firma' WHERE cod_af_SAP='$cod_activo' AND estado='F'");
        }
        
        
        echo "Hoja Creada";  
    }catch(PDOException $e){
        echo $e;
    }
    
?>