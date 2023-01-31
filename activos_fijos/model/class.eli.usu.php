<?php
    $cod = $_POST['cod'];
    include_once "../controller/db.php";  
    try{
        $sentencia = $base_de_datos->query("DELETE FROM usuarios WHERE cod_usuario='$cod'");
        echo "Dato Eliminado";
    }catch(SQLException $e){
        echo "No se pudo eliminar";
    }

    

?>