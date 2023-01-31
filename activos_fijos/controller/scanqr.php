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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/consulta.js"></script>

</head>

<body>
    <?php
            include_once "../dashboard/dashboard.php";
    ?>
        <div class="content-body">
        <div class="mt-4 col-8 ">
            <button class="btn btn-success" id="scan_qr">Escanear QR&nbsp&nbsp<img src="../assets/images/icons/codigo-qr.png" height ="40" width="50" /></button>
        </div><br>
        <div class="modal fade" id="modalscanqr" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Escanear Codigo QR</h3>
           </div>
           <div class="modal-body">
            <?php
             include_once "../assets/plugins/qrcode/examples/vuejs/index.html";
            ?>   
       </div>
           <div class="modal-footer">
            <input type="button" value="Cancelar" id="cancelar_qr" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>
    </div>
        
    <script type="text/javascript">
        $('#scan_qr').click(function (e) { 
            $("#modalscanqr").modal("show");
        });
        $('#cancelar_qr').click(function (e) { 
            $("#modalscanqr").modal("hide");
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

</body>

</html>
