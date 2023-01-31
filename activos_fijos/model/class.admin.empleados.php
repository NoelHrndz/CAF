<?php
    $f_emp = $_POST['f_emp'];
    $cod_emp = $_POST['cod_emp'];
    include_once "../controller/db.php";
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
    <tr>
        <th>Codigo Empleado</th>
        <th>Nombre Completo</th>
        <th>Departamento</th>
        <th>Opciones</th>
    </tr>
</thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_empresa, t1.cod_empleado_RRHH,t1.nombre_completo,t2.nombre_departamento FROM empleados 
            as t1  INNER JOIN catalogo_departamentos as t2 ON t1.codigo_departamento=t2.codigo_departamento WHERE cod_empresa='$cod_emp' 
            AND nombre_completo LIKE '%$f_emp%' AND cod_empleado_RRHH!='N/A' ORDER BY cod_empleado_RRHH ASC");
            $empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody>";
            foreach($empleados as $empleado){
                $ctable = $ctable."<tr>
                <td>$empleado->cod_empleado_RRHH</td>
                <td>$empleado->nombre_completo</td>
                <td>$empleado->nombre_departamento</td>
                <td><button class='btn btn-success' style='FONT-SIZE: 8pt;' id='asignaraf_$empleado->cod_empleado_RRHH"."_"."$empleado->cod_empresa'><b>ASIGNAR ACTIVO FIJO</b></button></td></tr>";
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/button.consulta.js'>";

        echo $ctable;

?>