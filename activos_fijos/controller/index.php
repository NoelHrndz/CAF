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
        

        <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
        

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                Filtrar:<input type="text" id="dato" class="form-control">
                </div>
                <div class="col">
             
                </div>
                <div class="col">
                <?php 
                    $emps = ["Sistemas y Proyectos S.A.","	Montacargas de Guatemala S.A","Soluciones de Energia Limpia","ProLogistica","Workframe"];
                    if(isset($_GET['cod_emp'])){

                ?>
                    <div class="text-center">
                        <input type="hidden" id="cod_empresa" value="<?php echo $_GET['cod_emp'] ?>">
                        <h1><?php echo $emps[$_GET['cod_emp']-1] ?></h1>
                    </div>  
                    <?php
            
                    }else{

            ?>
            <input type="hidden" id="cod_empresa" value="">
            <?php
            
                    }
            
            ?>  
                </div>
                <div class="col">
             
                </div>
                <div class="col">
                <?php 
    
                    if(isset($_GET['cod_emp'])){

                ?>
                        <br><input type="button" class="btn btn-info float-right" id="sincro_af" value="Sincronizar">  
                    <?php
            
                    }

                    ?>  
                </div>
            </div>
        </div><br>
                           
        <div class="text-center">
        <div class="table-responsive col-12" id="datatable">

        </div>
        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        <div class="modal fade" id="subirimagen" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Subir Imagen</h3>
           </div>
           <div class="modal-body" id="body_image">
           <?php 
           
           include_once "../model/class.subirimagen.php"; 
            
        ?>
           <form action=" <?php echo $_SERVER["PHP_SELF"] ?> " method="post" enctype="multipart/form-data" name="inscripcion">
             <input type="file" name="archivo[]" multiple="multiple">
             <input type="submit" value="Enviar" class="trig" id="enviar_image" name="submit">          
        </form>
       </div>
           <div class="modal-footer">
            <input type="button" value="Reestablecer" id="cclave" class="btn btn-primary">
            <input type="button" value="Cancelar" id="cancelar_ccla" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="verqr" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Codigo QR</h3>
           </div>
           <div class="modal-body" id="body_image">
        <script src="../assets/js/qr.js"></script>
                    <div class="text-center">
        <img alt="Código QR" id="codigo" >		
                     </div>
       </div>
           <div class="modal-footer">
            <input type="button" value="Imprimir" id="imprimir_qr" class="btn btn-primary">
            <input type="button" value="Cerrar" id="cerrar_qr" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>
        </div>
        
    <script type="text/javascript">
        $('#cerrar_qr').click(function (e) { 
            $("#verqr").modal("hide");
        });
        $('#imprimir_qr').click(function (e) { 
            alert("Imprimir");
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
    <script src="../assets/bootstrap/theme/plugins/sweetalert/js/sweetalert.min.js"></script>
    <link href="../assets/bootstrap/theme/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">



    <script src="../assets/bootstrap/theme/js/dashboard/dashboard-1.js"></script>

</body>

</html>
