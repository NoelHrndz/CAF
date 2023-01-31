<?php
    session_start();
    if(isset($_SESSION['sesion_af'])){
    $user = $_SESSION['sesion_af'][0];
    $rol = $_SESSION['sesion_af'][1];
?>
<div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
    
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
    
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>       
                <div class="header-right">       
                <li class="icons dropdown d-none d-md-flex">                                   
                                <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>
                                <b><span>
                                    <?php
                                        echo "Loged As: ".$user;
                                    ?>
                                    </span></b> </span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>                                    
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="../index.php">Cerrar Sesión</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </div>
            </div>
        </div>
        
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Opciones</li>
                    <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Activos Fijos</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="index.php">Ver Todos</a></li>
                            <li><a href="scanqr.php">Escanear QR</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Hojas de Responsabilidad</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="ver.hojas.php">Ver Todas</a></li>
                            <?php
                        if($rol==1 || $rol==2){
                        ?>
                            <li><a href="crear.php">Crear</a></li>
                            <li><a href="cerrar.php">Cerrar</a></li>
                            <!--<li><a href="cancelar.php">Cancelar</a></li>-->
                            <?php
                        }
                        ?>
                        </ul>
                    </li>
                    <?php
                        if($rol==1 || $rol==2){
                    ?>
                    <li class="mega-menu-sm">
                        <a  href="admin.emp.php" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">Empresas</span>
                        </a>
                    </li>
                    <?php
                        }
                        if($rol==1){
                    ?>
                    <li class="mega-menu-sm">
                        <a  href="admin.usu.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Usuarios</span>
                        </a>

                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            
        </div>  
  <?php
    }else{
  ?>
  <script type="text/javascript">
    document.location = "../index.php"; 
  </script>
  <?php
    }
  ?>