 <?php
        function autentica($user, $pass){
            include_once "../controller/db.php";
            $sentencia = $base_de_datos->query("SELECT * FROM usuarios WHERE estado='A'");
            $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $pass1 = md5($pass);
            $pass2 = md5($pass1);
            
            foreach($datos as $dato){
                if($dato->usuario==$user && $dato->clave==$pass2){
                    session_start();
                    $_SESSION['sesion_af'] = array();
                    $_SESSION['sesion_af'][0] = $dato->nombre;
                    $_SESSION['sesion_af'][1] = $dato->cod_rol;
                    $_SESSION['sesion_af'][2] = $dato->cod_usuario;
                    return true;           
                }
            }
            return false;
        }

?>