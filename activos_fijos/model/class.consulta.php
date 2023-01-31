<?php

    include_once "../controller/db.php";

    $dato = $_POST['dato'];
    $cod = $_POST['cod'];
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
    <tr>";
    if($cod==""){
        $ctable = $ctable."<th>Empresa</th>";
    }
    $ctable = $ctable."<th>Codigo SAP</th>
        <th>No.Serie</th>
        <th>Descripcion</th>
        <th>Codigo Interno</th>
        <th>Ubicacion</th>
        <th>Codigo Empleado</th>
        <th>Foto</th>
        <th>Opciones</th>
    </tr>
</thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_empresa, t2.nombre_empresa,t1.cod_af_SAP,t1.serie,t1.descripcion,t1.codigo_interno,t3.nombre_ubicacion,
            t1.cod_empleado_RRHH,t1.path_foto,t4.nombre_completo FROM activos_fijos AS t1 INNER JOIN empresas as t2 ON t1.cod_empresa=t2.cod_empresa INNER JOIN 
            ubicacion as t3 ON t1.cod_ubicacion=t3.cod_ubicacion INNER JOIN empleados AS t4 ON t1.cod_empleado_RRHH=t4.cod_empleado_RRHH AND t1.cod_empresa_empleados=t4.cod_empresa 
            WHERE (t1.cod_af_SAP like '%$dato%' or t1.serie like '%$dato%' or descripcion like '%$dato%' or codigo_interno like '%$dato%' or t1.cod_ubicacion like '%$dato%' or
            t4.nombre_completo like '%$dato%') AND t1.cod_empresa LIKE '%$cod%'");
            $activos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody>";
            foreach($activos as $activo){
                $ctable = $ctable."<tr>";
                if($cod==""){
                    $ctable = $ctable."<td>$activo->nombre_empresa</td>";
                }
                $ctable = $ctable."<td>$activo->cod_af_SAP</td>
                <td>$activo->serie</td>
                <td>$activo->descripcion</td>
                <td><button class='btn btn-warning' style='FONT-SIZE: 8pt;' id='qr_$activo->cod_af_SAP"."_"."$activo->cod_empresa'><img src='../assets/images/icons/qr.png' height ='25' width='25'/></button></td>
                <td>$activo->nombre_ubicacion</td>
                <td>$activo->nombre_completo</td>";
                if(isset($activo->path_foto)){
                    $ctable = $ctable."<td><button class='btn btn-warning' style='FONT-SIZE: 8pt;' id='ver_$activo->cod_af_SAP"."_"."$activo->cod_empresa'><img src='../assets/images/icons/ver.png' height ='25' width='25'/></button><br><br>
                                            <button class='btn btn-info' style='FONT-SIZE: 8pt;' id='subir_$activo->cod_af_SAP"."_"."$activo->cod_empresa'><img src='../assets/images/icons/subir.png' height ='25' width='25'/></button></td>";
                }
                else{
                    $ctable = $ctable."<td><button class='btn btn-info' style='FONT-SIZE: 8pt;' id='subir_$activo->cod_af_SAP"."_"."$activo->cod_empresa'><b><img src='../assets/images/icons/subir.png' height ='25' width='25'/></b></button></td>";
                }
                if($activo->cod_empleado_RRHH=="N/A"){
                    $ctable = $ctable."<td><button class='btn btn-success' style='FONT-SIZE: 8pt;' id='asignar_$activo->cod_af_SAP"."_"."$activo->cod_empresa'><b>CREAR HOJA DE RESPONSABILIDAD</b></button></td></tr>";
                    //<button class='btn btn-success' style='FONT-SIZE: 8pt;' id='datos_$activo->cod_af_SAP"."_"."$activo->cod_empresa'><b>VER DATOS</b></button>";
                }
                else{
                    $ctable = $ctable."<td></td></tr>";
                }
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/button.consulta.js'>";

        echo $ctable;


?>