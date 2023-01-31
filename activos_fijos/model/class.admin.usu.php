<?php

    $f_usu = $_POST['f_usu'];

    include_once "../controller/db.php";
    $estadoc = "";
    $ctable = "<table class='table table-striped table-bordered nowrap' style='width:100%' id='table_usu'><thead class='thead-dark'>
    <tr>
        <th>Codigo Usuario</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Estado</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Empresas Asignadas</th>
        <th>Opciones</th>
    </tr>
</thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_usuario,t1.nombre,t1.usuario,t1.clave,t1.estado,t1.correo,t2.nombre_rol FROM
            usuarios AS t1 INNER JOIN roles AS t2 ON t1.cod_rol = t2.cod_rol WHERE t1.cod_usuario LIKE '%$f_usu%' OR t1.nombre LIKE '%$f_usu%' 
            OR t1.usuario LIKE '%$f_usu%' OR t1.clave LIKE '%$f_usu%' OR t1.estado LIKE '%$f_usu%' OR t1.correo LIKE '%$f_usu%' OR t2.nombre_rol
            LIKE '%$f_usu%'");
            $activos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody id='body_usu'>";
            foreach($activos as $activo){
                $sentencia_asign = $base_de_datos->query("SELECT t1.asignado,t2.nombre_empresa FROM usuario_empresas_asign AS t1 INNER JOIN 
                empresas as t2 ON t1.cod_empresa = t2.cod_empresa  WHERE cod_usuario='$activo->cod_usuario'");
                $empresas = $sentencia_asign->fetchAll(PDO::FETCH_OBJ);
                $casign="";
                foreach($empresas as $empresa){
                    if($empresa->asignado=="S"){
                        $casign = $casign."".$empresa->nombre_empresa."<br>";
                    }
                }
               
                $ctable = $ctable."<tr>
                <td>$activo->cod_usuario</td>
                <td>$activo->nombre</td>
                <td>$activo->usuario</td>";
                if($activo->estado=="A"){
                    $estadoc = "Activo";
                }
                else if($activo->estado=="I"){
                    $estadoc = "Inactivo";
                }
                $ctable =$ctable."<td>$estadoc</td>
                <td>$activo->correo</td>
                <td>$activo->nombre_rol</td>
                <td>$casign</td>
                <td><button class='btn btn-warning' id='mod_usu_$activo->cod_usuario'><img src='../assets/images/icons/editar.png' height ='25' width='25'/></button>
                <button class='btn btn-danger' id='eli_usu_$activo->cod_usuario'><img src='../assets/images/icons/eliminar.png' height ='25' width='25'/></button>
                <button class='btn btn-info' id='cla_$activo->cod_usuario'><img src='../assets/images/icons/contrasena.png' height ='25' width='25'/></button></td></tr>";
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/buttons.js'></script>";

        echo $ctable;


?>