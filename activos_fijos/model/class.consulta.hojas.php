<?php
   
    include_once "../controller/db.php";
    $estado = "";
    $button_es = "";
    $f_hojas = $_POST["f_hojas"];
    $ctable = "<table class='table table-striped table-bordered nowrap'><thead class='thead-dark'>
    <tr>
        <th>Codigo Hoja Responsabilidad</th>
        <th>Empresa</th>
        <th>Activo Fijo</th>
        <th>Empleado</th>
        <th>Estado</th>
        <th></th>
    </tr>
    </thead> ";
            $sentencia = $base_de_datos->query("SELECT t1.cod_hoja_responsabilidad,t1.cod_empresa,t2.nombre_empresa,t3.descripcion,t4.nombre_completo,
            t1.estado,t1.cod_empresa_af,t1.cod_af_SAP FROM hoja_responsabilidad as t1 INNER JOIN empresas as t2 ON t1.cod_empresa=t2.cod_empresa INNER JOIN 
            activos_fijos as t3 ON t1.cod_empresa_af=t3.cod_empresa AND t1.cod_af_SAP=t3.cod_af_SAP INNER JOIN empleados as t4 ON 
            t1.cod_empresa_empleados=t4.cod_empresa AND t1.cod_empleado_RRHH=t4.cod_empleado_RRHH WHERE t1.cod_hoja_responsabilidad 
            LIKE '%$f_hojas%' OR t2.nombre_empresa LIKE '%$f_hojas%' OR t3.descripcion LIKE '%$f_hojas%' OR t4.nombre_completo LIKE '%$f_hojas%'");
            $hojas = $sentencia->fetchAll(PDO::FETCH_OBJ);
            $ctable = $ctable."<tbody>";
            foreach($hojas as $hoja){
                $ctable = $ctable."<tr>
                <td>$hoja->cod_hoja_responsabilidad</td>
                <td>$hoja->nombre_empresa</td>
                <td>$hoja->descripcion</td>
                <td>$hoja->nombre_completo</td>";
                if($hoja->estado=="A"){
                    $estado = "Abierto";
                    $button_es = "<button class='btn btn-warning' id='retornar_".$hoja->cod_hoja_responsabilidad."_"."$hoja->cod_empresa"."'><img src='../assets/images/icons/retornar.png' height ='25' width='25'/></button>"; 
                }
                else if($hoja->estado=="C"){
                    $estado = "Cerrado";
                }
                else if($hoja->estado=="F"){
                    $estado = "Pendiente de Firma";
                    $button_es = "<button class='btn btn-success' id='firmar_".$hoja->cod_hoja_responsabilidad."_"."$hoja->cod_empresa'><img src='../assets/images/icons/firmar.png' height ='25' width='25'/></button> 
                                <button class='btn btn-danger' id='cancelar_".$hoja->cod_hoja_responsabilidad."_"."$hoja->cod_empresa'><img src='../assets/images/icons/eliminar.png' height ='25' width='25'/></button>";
                }
                else if($hoja->estado=="X"){
                    $estado = "Cancelado";
                }
                $ctable = $ctable."<td>$estado</td>
                <td><button class='btn btn-info' id='ver_".$hoja->cod_hoja_responsabilidad."_"."$hoja->cod_empresa"."'><img src='../assets/images/icons/ver.png' height ='25' width='25'/></button> $button_es
                <button class='btn btn-danger' id='pdf_".$hoja->cod_hoja_responsabilidad."_"."$hoja->cod_empresa"."'><img src='../assets/images/icons/pdf.png' height ='25' width='25'/></button></td></tr>";
                $button_es = "";
            }
            $ctable = $ctable."</tbody></table><script src='../assets/js/buttons.verhoja.js'></script>";

        echo $ctable;

?>