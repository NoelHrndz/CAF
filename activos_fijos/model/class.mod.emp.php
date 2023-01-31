<?php

    include_once "../controller/db.php";
    $cod = $_POST['cod'];
    $nom = $_POST['nom'];
    $nombd = $_POST['nombd'];
    $estado = $_POST['estado'];
    $iestado = "";
    if($estado == "a_emp"){
        $iestado = "A";
    }
    else if($estado == "i_emp"){
        $iestado = "I";
    }
    try{
        $sentencia = $base_de_datos->query("UPDATE empresas SET nombre_empresa='$nom', nombre_BD_SAP='$nombd', estado='$iestado' WHERE cod_empresa='$cod'");
        echo "Datos Modificados";
    }
    catch(PDOException $e){
        echo $e;
    }
?>