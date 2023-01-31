<?php

    include_once "../controller/db.php";
    $f_af = $_POST['f_af'];
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
        <th>Empresa</th>
        <th>Codigo SAP</th>
        <th>Descripcion</th>
        <th></th>
    </tr>
</thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_empresa,t2.nombre_empresa,t1.cod_af_SAP,t1.descripcion,t1.cod_empleado_RRHH FROM 
            activos_fijos as t1 INNER JOIN empresas as t2 ON t1.cod_empresa=t2.cod_empresa WHERE (cod_empleado_RRHH='N/A') AND (t1.cod_empresa LIKE '%$f_af%'
            OR t1.cod_af_SAP LIKE '%$f_af%' OR t1.descripcion LIKE '%$f_af%') ORDER BY t1.cod_af_SAP ASC");
            $activos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody>";
            foreach($activos as $activo){
                $ctable = $ctable."<tr>
                <td>$activo->nombre_empresa</td>
                <td>$activo->cod_af_SAP</td>
                <td>$activo->descripcion</td>
                <td><button class='btn btn-info' style='FONT-SIZE: 8pt;' id='selaf_$activo->cod_empresa"."_"."$activo->cod_af_SAP"."_"."$activo->descripcion'>Seleccionar</button></td>";
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/buttons.seleccionar.js'>";

        echo $ctable;


?>