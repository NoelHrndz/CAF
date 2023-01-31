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
    <link href="../assets/bootstrap/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../assets/bootstrap/theme/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/theme/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../assets/bootstrap/theme/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="../assets/bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <script src="../assets/js/firma.js"></script>

</head>

<body>
    <?php
            include_once "../dashboard/dashboard.php";
    ?>
        <div class="content-body">
                <?php
             
            if($_SESSION['sesion_af'][1]==1 || $_SESSION['sesion_af'][1]==2){

                if(isset($_GET['emp'])){
                    ?>
                    <input type="hidden" id="hr_emp" value="<?php echo $_GET['emp'] ?>">
                    <?php
                    if(isset($_GET['af'])){
                        ?>
                        <input type="hidden" id="hr_af" value="<?php echo $_GET['af'] ?>">
                        <script src="../assets/js/hr_af.js"></script>
                        <?php
                    }
                    if(isset($_GET['rrhh'])){
                        ?>
                        <input type="hidden" id="hr_rrhh" value="<?php echo $_GET['rrhh'] ?>">
                        <script src="../assets/js/hr_emp.js"></script>
                        <?php
                    }
                }
                
                ?>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Empresa<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="hr_empresa" >
                                                    <option value="1">Sistemas y Proyectos S.A.</option>
                                                    <option value="2">Montacargas de Guatemala S.A.</option>
                                                    <option value="3">Soluciones de Energía Limpia</option>
                                                    <option value="4">ProLogistica</option>
                                                    <option value="5">WorkFrame</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Empleado <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 input-group">
                                            <input type="hidden" id="hr_rrhh_in">
                                            <input type="hidden" id="hr_emp_empleado_in">
                                            <input type="text" class="form-control" id="hr_empleado_in" value="" disabled> <span class="input-group-btn"><button type="button" id="buscar_empleado" class="btn mb-1 btn-primary btn-lg">Buscar</button></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Activo Fijo <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 input-group">
                                                <input type="hidden" id="hr_cod_in">
                                                <input type="hidden" id="hr_emp_af_in">
                                            <input type="text" class="form-control" id="hr_af_in" value="" disabled> <span class="input-group-btn"><button type="button" id="buscar_af" class="btn mb-1 btn-primary btn-lg">Buscar</button></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Ubicacion<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="hr_ubicacion">
                                                    <option value="1">Zona 9 Oficinas Centrales</option>
                                                    <option value="2">Zona 12 Cortijo</option>
                                                    <option value="3">Zona 12 CDC</option>
                                                    <option value="4">Zona 4 Taller</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <input type="button" class="btn btn-primary" id="crear" value="Crear">
                                                <input type="button" class="btn btn-danger" id="pen_firma" value="Ver Pendientes de Firma">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto" id="firmar">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
            <div id="canvas_firma">
                
            </div>     
           
            </div>               
            <!-- Inicio Modals -->
                                    <div class="modal fade bd-example-modal-lg" id="modaldtemp" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Empleados</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col">
                                                                        Filtrar: <br><input type="text" class="form-control" id="f_emp"><br>

                                                            </div>
                                                            <div class="col">
             
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="text-center">
                                                    <div class="table-responsive" id="datatable_bus_emp">
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-danger" id="can_bus_emp" data-dismiss="modal" value="Cancelar"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modaldtaf" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Activos Fijos</h5>
                                                </div>
                                                <div class="modal-body">
                                                <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col">
                                                                        Filtrar: <br><input type="text" class="form-control" id="f_af"><br>

                                                            </div>
                                                            <div class="col">
             
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                    <div class="table-responsive" id="datatable_bus_af">
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-danger" id="can_bus_af" data-dismiss="modal" value="Cancelar"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modalpenfir" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hojas de Responsabilidad Pendientes de Firma</h5>
                                                </div>
                                                <div class="modal-body">
                                                <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col">
                                                                        Filtrar: <br><input type="text" class="form-control" id="f_pen"><br>

                                                            </div>
                                                            <div class="col">
             
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                    <div class="table-responsive" id="datatable_pen_fir">
                                                        
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-danger" id="can_penfir" data-dismiss="modal" value="Cerrar"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade bd-example-modal-lg" id="modalfirma" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Firmar</h5>
                                                </div>
                                                <div class="modal-body">
                                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-danger" id="can_bus_emp" data-dismiss="modal" value="Cancelar"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="../assets/js/crear.js"></script>

</body>

</html>
