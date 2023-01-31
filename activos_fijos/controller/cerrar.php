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
</head>

<body>
    <?php
            include_once "../dashboard/dashboard.php";              
    ?>

        <div class="content-body">
            <?php
            if($_SESSION['sesion_af'][1]==1 || $_SESSION['sesion_af'][1]==2){ 
            include_once "db.php";
            $sentencia = $base_de_datos->query("select * from roles");
            $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id_Rol</th>
                        <th>Nombre_Rol</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php foreach($datos as $dato){ ?>
                    <tr>
                        <td><?php echo $dato->cod_rol;?></td>
                        <td><?php echo $dato->nombre_rol;?></td>
                    </tr>
                    <?php 
                    } 
                    ?>
                    </tbody>
            </table> 
        </div>
            <?php
            
                }
                else{
            ?>

            <script type="text/javascript">
        
            $(document).ready(function () {
            document.location="npermisos.php";
            });

            </script>

            <?php
                }
            ?>
           
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

</body>

</html>