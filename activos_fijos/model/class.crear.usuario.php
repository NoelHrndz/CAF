<?php

    include_once "../controller/db.php";
    
    $cod = $_POST['cod'];
    $nom = $_POST['nom'];
    $user = $_POST['user'];
    $clave = $_POST['clave'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $sypsa = $_POST['sypsa'];
    $mg = $_POST['mg'];
    $eco = $_POST['eco'];
    $pro = $_POST['pro'];
    $work = $_POST['work'];
    $estado = $_POST['estado'];
    $clave1 = md5($clave);
    $clave2 = md5($clave1);
    $crol=0;
    if($rol=="admin_new"){
        $crol=1;
    }
    else if($rol=="conta_new"){
        $crol=2;
    }
    else if($rol=="consul_new"){
        $crol=3;
    }
    $cesta = "";
    if($estado=="a_new"){
        $cesta = "A";
    }
    else if($estado=="i_new"){
        $cesta = "I";
    }
    $sentencia = $base_de_datos->query("INSERT INTO usuarios(cod_usuario,nombre,usuario,clave,estado,correo,cod_rol) 
    VALUES ('$cod','$nom','$user','$clave2','$cesta','$correo','$crol');
    INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES ('$cod','1','$sypsa');
    INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES ('$cod','2','$mg');
    INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES ('$cod','3','$eco');
    INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES ('$cod','4','$pro');
    INSERT INTO usuario_empresas_asign(cod_usuario,cod_empresa,asignado) VALUES ('$cod','5','$work');"); 
?>