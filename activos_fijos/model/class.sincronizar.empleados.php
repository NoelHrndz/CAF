<?php
    include_once "../controller/db.php";
    include_once "../controller/config.php";
    $cod_emp = $_POST['cod_emp'];
    
    try{ 
        $sentencia = $base_de_datos->query("SELECT codigo_departamento,descripcion_departamento FROM "."[".$empresas[$cod_emp-1]."]".".[dbo].[catalogo_departamentos]");
        $depts = $sentencia->fetchAll(PDO::FETCH_OBJ);
        foreach($depts as $dept){
            $sentencia = $base_de_datos->query("SELECT * FROM catalogo_departamentos WHERE codigo_departamento='$dept->codigo_departamento'");
            $cdept = $sentencia->rowCount();
            if($cdept == "-1"){
                $sentencia = $base_de_datos->query("UPDATE catalogo_departamentos SET nombre_departamento='$dept->descripcion_departamento' 
                WHERE codigo_departamento='$dept->codigo_departamento'");
            }
            else{
                $sentencia = $base_de_datos->query("INSERT INTO catalogo_departamentos(codigo_departamento,nombre_departamento) VALUES
                ('$dept->codigo_departamento','$dept->descripcion_departamento')");
            }
        }
            $sentencia = $base_de_datos->query("SELECT codigo_empleado,nombre_Completo,codigo_departamento FROM "."[".$empresas[$cod_emp-1]."]".".[dbo].[empleados]");
            $empleadosIn = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($empleadosIn as $empleadoIn){
                $sentencia = $base_de_datos->query("SELECT * FROM empleados WHERE cod_empresa='$cod_emp' AND cod_empleado_RRHH='$empleadoIn->codigo_empleado'");
                $empleadoAf = $sentencia->rowCount();
                if($empleadoAf == "-1"){
                 $sentencia = $base_de_datos->query("UPDATE empleados SET nombre_completo='$empleadoIn->nombre_Completo', 
                        codigo_departamento='$empleadoIn->codigo_departamento' WHERE cod_empleado_RRHH = '$empleadoIn->codigo_empleado'");  
                }   
                else{
                        $sentencia = $base_de_datos->query("INSERT INTO empleados(cod_empresa,cod_empleado_RRHH,nombre_completo,codigo_departamento) 
                        VALUES ('$cod_emp','$empleadoIn->codigo_empleado','$empleadoIn->nombre_Completo','$empleadoIn->codigo_departamento')");  
                }

        }
        
        echo "Datos Sincronizados";
    }
    catch(PDOException $e){
        echo $e;
    }
    
?> 