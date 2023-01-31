<?php

    include_once "../controller/db.php";
    $f_emp = $_POST['f_emp'];
    $emp = $_POST['emp'];
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
        <th>Empresa</th>
        <th>No Empleado RRHH</th>
        <th>Nombre</th>
        <th></th>
    </tr>
</thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_empresa,t2.nombre_empresa,t1.cod_empleado_RRHH,t1.nombre_completo FROM empleados 
            as t1 INNER JOIN empresas as t2 ON t1.cod_empresa=t2.cod_empresa WHERE (t1.cod_empleado_RRHH!='N/A') AND (t1.cod_empresa = '$emp') AND (t2.nombre_empresa LIKE '%$f_emp%'
            OR t1.cod_empleado_RRHH LIKE '%$f_emp%' OR t1.nombre_completo LIKE '%$f_emp%') ORDER BY t2.nombre_empresa ASC");
            $empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody>";
            foreach($empleados as $empleado){
                $ctable = $ctable."<tr>
                <td>$empleado->nombre_empresa</td>
                <td>$empleado->cod_empleado_RRHH</td>
                <td>$empleado->nombre_completo</td>
                <td><button class='btn btn-info' style='FONT-SIZE: 8pt;' id='selemp_$empleado->cod_empresa"."_"."$empleado->cod_empleado_RRHH"."_"."$empleado->nombre_completo'>Seleccionar</button></td>";
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/buttons.seleccionar.js'>";

        echo $ctable;


?>