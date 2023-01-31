<?php

    include_once "../controller/db.php";
    $cod = $_POST['cod'];
    $nom = $_POST['nom'];
    $user = $_POST['usu'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $sypsa = $_POST['sypsa'];
    $mg = $_POST['mg'];
    $eco = $_POST['eco'];
    $pro = $_POST['pro'];
    $work = $_POST['work'];
    $estado = $_POST['estado'];
    $cestado = "";
    if($estado=="a_mod"){
        $cestado = "A";
    }
    else{
        $cestado = "I";
    }
    $crol=0;
    if($rol=="admin_mod"){
        $crol = 1;
    }
    else if($rol=="conta_mod"){
        $crol = 2;
    }
    else{
        $crol = 3;
    }
    try{
        $sentencia = $base_de_datos->query("UPDATE usuarios SET nombre='$nom',usuario='$user',correo='$correo',cod_rol='$crol',estado='$cestado'
        WHERE cod_usuario='$cod';
        UPDATE usuario_empresas_asign SET asignado='$sypsa' WHERE cod_usuario='$cod' AND cod_empresa='1';
        UPDATE usuario_empresas_asign SET asignado='$mg' WHERE cod_usuario='$cod' AND cod_empresa='2';
        UPDATE usuario_empresas_asign SET asignado='$eco' WHERE cod_usuario='$cod' AND cod_empresa='3';
        UPDATE usuario_empresas_asign SET asignado='$pro' WHERE cod_usuario='$cod' AND cod_empresa='4';
        UPDATE usuario_empresas_asign SET asignado='$work' WHERE cod_usuario='$cod' AND cod_empresa='5';
        "); 
        echo "Datos Modificados";
    }
    catch(SQLException $e){
        echo $e;
    }

?>