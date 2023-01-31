<!--
<?php
        include_once "general/Browser.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Activos Fijos</title>
        <meta charset="UTF-8">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="assets/css/index.css">
    </head>
    <body>
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Inicia sesión para continuar</p>

              <div class="form-outline form-white mb-4">
                <input type="text" id="user" class="form-control form-control-lg" placeholder="Usuario"/>
              </div>

        <div class="input-group">
      <input id="pass" type="Password" Class="form-control form-control-lg" placeholder="Contraseña">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" > <span class="fa fa-eye-slash icon"></span> </button>
          </div>
     </div>

              </div>
              <div class="form-outline form-white mb-4">
              <button class="btn btn-outline-light btn-lg px-5" type="submit" id="ingresar">Ingresar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="assets/js/login.js"></script>
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("pass");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
</script>
    </body>
</html>-->

<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="assets/bootstrap/theme/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="assets/bootstrap/theme/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="assets/bootstrap/theme/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Login</h4></a>
        
                                <form class="mt-5 mb-5 login-input">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Usuario" id="user">
                                    </div><br>
                                    <div class="input-group">
                                        <input id="pass" type="Password" class="form-control" placeholder="Contraseña">
                                          <div class="input-group-append">
                                               <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" > <span class="fa fa-eye-slash icon"></span> </button>
                                             </div>
                                               </div><br>
                                    <button class="btn login-form__btn submit w-100" type="submit" id="ingresar">Ingresar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/login.js"></script>
    <script type="text/javascript">
    function mostrarPassword(){
		var cambio = document.getElementById("pass");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
  
  window.addEventListener('popstate', function(event) {
	history.pushState(null, null, window.location.pathname);
	history.pushState(null, null, window.location.pathname);
	}, false);
</script>
</body>
    <script src="assets/bootstrap/theme/plugins/toastr/js/toastr.min.js"></script>
    <script src="assets/bootstrap/theme/plugins/toastr/js/toastr.init.js"></script>
    <script src="assets/bootstrap/theme/plugins/sweetalert/js/sweetalert.min.js"></script>
    <link href="assets/bootstrap/theme/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
</html>



