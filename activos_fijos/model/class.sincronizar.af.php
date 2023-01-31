<?php

    include_once "../controller/db.php";
    include_once "../controller/config.php";
    $cod = $_POST['cod'];
    try{
       $sentencia = $base_de_datos->query("SELECT ItemCode,ItemName,AssetSerNo FROM "."[".$bdemp[$cod-1]."]".".[dbo].[OITM] WHERE ItemType = 'F' ORDER BY ItemCode ASC ");
        $activos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        foreach($activos as $activo){
                $sentencia = $base_de_datos->query("SELECT * FROM activos_fijos WHERE cod_empresa='$cod' AND cod_af_SAP='$activo->ItemCode'");
                $activoAf = $sentencia->rowCount();
                if($activoAf == "-1"){
                    $codigo = $cod_in[$cod-1]."_".$activo->ItemCode;
                    $descripcion = " ";
                    if(strpos($activo->ItemName,"'") !== false){

                        $descripcion = str_replace("'","''",$activo->ItemName);

                     }
                    else{
                         $descripcion = $activo->ItemName;
                        }
                    $sentencia = $base_de_datos->query("UPDATE activos_fijos SET serie='$activo->AssetSerNo', descripcion='$descripcion' WHERE 
                    cod_empresa='$cod' AND cod_af_SAP='$activo->ItemCode'");
                
                }else{
                    $codigo = $cod_in[$cod-1]."_".$activo->ItemCode;
                    $descripcion = " ";
                    if(strpos($activo->ItemName,"'") !== false){

                        $descripcion = str_replace("'","''",$activo->ItemName);

                     }
                    else{
                         $descripcion = $activo->ItemName;
                        }
                    $sentencia = $base_de_datos->query("INSERT INTO activos_fijos(cod_empresa,cod_af_SAP,cod_empresa_empleados,
                     cod_empleado_RRHH,serie,descripcion,codigo_interno,cod_ubicacion) VALUES ('$cod','$activo->ItemCode','$cod','N/A'
                    ,'$activo->AssetSerNo','$descripcion','$codigo','0')");

                }
           
           
        }
        echo "Datos Sincronizados"; 
    }catch(PDOException $e){
        echo $e;
    }
        
?> 