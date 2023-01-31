
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>Menu Principal</title>
    <!-- Favicon icon -->
    <link rel="icon" type="../assets/bootstrap/theme/image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../assets/bootstrap/theme//plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/theme//plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../assets/bootstrap/theme/css/style.css" rel="stylesheet">
    <script src="../assets/libs/jquery-3.6.1.js"></script>
    <script src="../assets/js/empleados.js"></script>
    <script src="../assets/js/sincronizar.empleados.js"></script>

</head>

<body>
    <?php
            include_once "../dashboard/dashboard.php";
    ?>
    <div class="content-body">
    <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    Filtrar:<input type="text" id="f_empleados" class="form-control">
                </div>
                <div class="col">
                    <br><input type="button" id="regresar" value="Regresar" class="btn btn-danger float-left">  
                </div>
                <div class="col">
                <?php 
                    $emps = ["Sistemas y Proyectos S.A.","	Montacargas de Guatemala S.A","Soluciones de Energia Limpia","ProLogistica","Workframe"];
                    if(isset($_GET['cod_emp'])){

                ?>
                        <div class="text-center">
                            <h1><?php echo $emps[$_GET['cod_emp']-1] ?></h1>
                        </div> 
                    <?php
            
                    }

                    ?>  
                </div>
                <div class="col">
             
                </div>
                <div class="col">
                        <br><input type="button" class="btn btn-info float-right" id="sincronizar" value="Sincronizar">  
                </div>
            </div>
        </div>
    <div class="col-12 mt-4"> 
                
            
              
        </div>
        <div class="text-center">
        <div class="col-12 mt-4 table-responsive" id="t_empleados">

        </div>
        </div>                      
        <input type="hidden" id="cod_empresa" value="<?php echo $_GET['cod_emp'] ?>">
        </div></div></div></div></div>
    </div>
    </script>
    <script src="../assets/bootstrap/theme/plugins/common/common.min.js"></script>
    <script src="../assets/bootstrap/theme/js/custom.min.js"></script>
    <script src="../assets/bootstrap/theme/js/settings.js"></script>
    <script src="../assets/bootstrap/theme/js/gleek.js"></script>
    <script src="../assets/bootstrap/theme/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../assets/bootstrap/theme/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../assets/bootstrap/theme/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../assets/bootstrap/theme/plugins/d3v3/index.js"></script>
    <script src="../assets/bootstrap/theme/plugins/topojson/topojson.min.js"></script>
    <script src="../assets/bootstrap/theme/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../assets/bootstrap/theme/plugins/raphael/raphael.min.js"></script>
    <script src="../assets/bootstrap/theme/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../assets/bootstrap/theme/plugins/moment/moment.min.js"></script>
    <script src="../assets/bootstrap/theme/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../assets/bootstrap/theme/plugins/chartist/js/chartist.min.js"></script>
    <script src="../assets/bootstrap/theme/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="../assets/bootstrap/theme/js/dashboard/dashboard-1.js"></script>
    <script src="../assets/bootstrap/theme/plugins/sweetalert/js/sweetalert.min.js"></script>
    <link href="../assets/bootstrap/theme/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
</body>

</html>
