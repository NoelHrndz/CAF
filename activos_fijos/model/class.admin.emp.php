<?php
    /*$f_emp = $_POST['f_emp'];*/
    $estado = "";
    session_start();
    include_once "../controller/db.php";
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
    <tr>
        <th>Codigo Empresa</th>
        <th>Nombre Empresa</th>
        <th>Nombre BD SAP</th>
        <th>Estado</th>
        <th>Filtrar</th>";

        if($_SESSION['sesion_af'][1]=="1"){
            $ctable = $ctable."<th>Opciones</th>";
        }
        
        $ctable = $ctable."</tr></thead> ";
            $sentencia = $base_de_datos->query("SELECT * FROM empresas");
            $empresas = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody id='body_usu'>";
            foreach($empresas as $empresa){
                if($empresa->estado=="A"){
                    $estado = "Activo";
                }
                else{
                    $estado = "Inactivo"; 
                }
                $ctable = $ctable."<tr>
                <td>$empresa->cod_empresa</td>
                <td>$empresa->nombre_empresa</td>
                <td>$empresa->nombre_BD_SAP</td>
                <td>$estado</td>";
                if($empresa->estado=="A"){ 
                    $ctable = $ctable."<td><button class='btn btn-info' style='FONT-SIZE: 8pt;' id='ver_empl_$empresa->cod_empresa'><b>VER EMPLEADOS</b></button>
                    <button class='btn btn-info' style='FONT-SIZE: 8pt;' id='ver_acti_$empresa->cod_empresa'><b>VER ACTIVOS FIJOS</b></button></td>";
                }
                else {
                    $ctable = $ctable."<td> </td>";
                }
                if($_SESSION['sesion_af'][1]=="1"){
                    $ctable = $ctable."<td><button class='btn btn-warning' id='mod_emp_$empresa->cod_empresa'><img src='../assets/images/icons/editar.png' height ='25' width='25'/></button></td></tr>";
                }
                
                
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/buttons.js'></script><script src='../assets/js/filtros_emp.js'></script>";

        echo $ctable;

?>