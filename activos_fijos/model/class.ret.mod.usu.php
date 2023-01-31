<?php

$id = $_POST['id_b'];
    include_once "../controller/db.php";
        $cusu = "";
            $sentencia = $base_de_datos->query("SELECT * FROM usuarios WHERE cod_usuario='$id'");
            $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($usuarios as $usuario){
                $cusu = $usuario->cod_usuario."_".$usuario->nombre."_".$usuario->usuario."_".$usuario->estado."_".$usuario->correo."_".$usuario->cod_rol;
            }
            $sentencia = $base_de_datos->query("SELECT * FROM usuario_empresas_asign WHERE cod_usuario='$id'");
            $asignados = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($asignados as $asignado){
                $cusu = $cusu."_".$asignado->asignado;
            }
            echo $cusu;

?>