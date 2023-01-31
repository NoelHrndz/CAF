<?php
    $id = $_POST['id_b'];
    include_once "../controller/db.php";
        $cusu = "";
            $sentencia = $base_de_datos->query("SELECT * FROM usuarios WHERE cod_usuario='$id'");
            $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($usuarios as $usuario){
                $cusu = $usuario->cod_usuario."_".$usuario->nombre;
            }
            echo $cusu;
?>