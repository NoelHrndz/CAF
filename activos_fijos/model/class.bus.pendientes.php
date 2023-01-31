<?php

    include_once "../controller/db.php";
    $f_pen = $_POST['f_pen'];
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
        <th>Hoja de Responsabilidad</th>
        <th>Empresa</th>
        <th>Empleado</th>
        <th>Activo Fijo</th>
        <th></th>
    </tr>
</thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_hoja_responsabilidad,t1.cod_af_SAP,t1.cod_empresa_af,t1.cod_empresa,t2.nombre_empresa,t3.nombre_completo,t4.descripcion
            FROM hoja_responsabilidad as t1 INNER JOIN empresas as t2 ON t1.cod_empresa=t2.cod_empresa INNER JOIN empleados as t3 ON
            t1.cod_empleado_RRHH=t3.cod_empleado_RRHH and t1.cod_empresa_empleados = t3.cod_empresa INNER JOIN activos_fijos as t4 ON t1.cod_af_SAP=t4.cod_af_SAP and
            t1.cod_empresa_af = t4.cod_empresa WHERE t1.estado='F'
            AND (t3.nombre_completo LIKE '%$f_pen%' OR t4.descripcion LIKE '%$f_pen%')");
            $hojas = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody>";
            foreach($hojas as $hoja){
                $ctable = $ctable."<tr>
                <td>$hoja->cod_hoja_responsabilidad</td>
                <td>$hoja->nombre_empresa</td>
                <td>$hoja->nombre_completo</td>
                <td>$hoja->descripcion</td>
                <td><button class='btn btn-info' style='FONT-SIZE: 8pt;' id='firmar_$hoja->cod_af_SAP"."_"."$hoja->cod_empresa_af'>Firmar</button><br><br> 
                <button class='btn btn-danger' style='FONT-SIZE: 8pt;' id='cancelar_$hoja->cod_hoja_responsabilidad"."_"."$hoja->cod_empresa"."_"."$hoja->cod_empresa_af"."_"."$hoja->cod_af_SAP'>Cancelar</button></td>";
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/buttons.firmas.pendientes.js'>";

        echo $ctable;


?>