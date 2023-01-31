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
    <script src="../assets/js/admin.emp.js"></script>
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
    <?php
    
        if($_SESSION['sesion_af'][1]==1 || $_SESSION['sesion_af'][1]==2){
    
    ?>
        <div class="col-12 mt-4"> 
               <!-- Filtrar:
            <input type="text" id="f_emp"> --> 
        </div>
        <div class="text-center">
        <div class="col-12 mt-4 table-responsive" id="t_emp">

        </div>
        </div>
        <div class="modal fade" id="modalmodemp" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Modificar Empresa</h3>
           </div>
           <div class="modal-body">
              <h4>Ingrese Datos que desee modificar</h4>
              Codigo:<input type="text" id="cod_mod_emp" class="form-control" disabled><br>
              Nombre<input type="text" id="nom_mod_emp" class="form-control"><br>
              Nombre Base de Datos SAP:<input type="text" id="nombd_mod_emp" class="form-control"><br>
              Estado:<select name="estado_emp" id="estado_emp" class="form-control">  
                <option value="a_emp">Activo</option>
                <option value="i_emp">Inactivo</option>
              </select><br>
       </div>
           <div class="modal-footer">
            <input type="button" value="Modificar" id="mod_emp" class="btn btn-primary">
            <input type="button" value="Cancelar" id="cancelar_mod_emp" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>
<?php
        }else{
?>
    <script type="text/javascript">
        
        $(document).ready(function () {
        document.location="npermisos.php";
        });

        </script>
<?php
        }
?>
        </div></div></div></div></div></div><!-- Card -->
                </div>
    <script type="text/javascript">
        $('#cancelar_mod_emp').click(function (e) { 
            $("#modalmodemp").modal("hide");
            $('#nom_mod_emp').val("");
            $('#nombd_mod_emp').val(""); 
        });
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
