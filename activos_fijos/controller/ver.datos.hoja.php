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
    <script src="../assets/js/consulta.hojas.js"></script>

</head>

<body>
    <?php
            include_once "../dashboard/dashboard.php";
            include_once "../controller/db.php";
            include_once "../controller/config.php";
            $hdr = $_GET['hdr'];
            $emp = $_GET['emp'];
            $sentencia = $base_de_datos->query("SELECT t1.cod_hoja_responsabilidad,t2.nombre_empresa,t1.estado,t1.cod_af_SAP,t3.serie,
            t1.cod_empresa_empleados,t3.descripcion,t3.codigo_interno,t1.cod_empresa_af,t4.cod_empleado_RRHH,t4.nombre_completo,
            t5.nombre_departamento,t6.nombre_ubicacion,t1.fecha_asignacion_hoja,t1.firma_empleado_entrega FROM hoja_responsabilidad 
            as t1 INNER JOIN empresas as t2 ON t1.cod_empresa=t2.cod_empresa INNER JOIN activos_fijos as t3 ON t1.cod_af_SAP=t3.cod_af_SAP 
            AND t1.cod_empresa_af=t3.cod_empresa INNER JOIN empleados as t4 ON t1.cod_empleado_RRHH=t4.cod_empleado_RRHH AND 
            t1.cod_empresa_empleados=t4.cod_empresa INNER JOIN catalogo_departamentos as t5 ON t4.codigo_departamento=t5.codigo_departamento
            INNER JOIN ubicacion as t6 ON t1.cod_ubicacion=t6.cod_ubicacion WHERE t1.cod_hoja_responsabilidad='$hdr' AND t1.cod_empresa='$emp'");
            $datos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            foreach($datos as $dato){
    ?>
        <input type="hidden" id="hdr" value="<?php echo $_GET['hdr'] ?>">
        <input type="hidden" id="emp" value="<?php echo $_GET['emp'] ?>">
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1>Hoja de Responsabilidad: <?php echo $dato->cod_hoja_responsabilidad ?> - <?php echo $dato->nombre_empresa ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>Datos Activo Fijo</h3>
                                    <p><h5>Código Activo Fijo SAP: <?php echo $dato->cod_af_SAP ?></h5></p>
                                    <p><h5>Serie: <?php 
                                    if($dato->serie == "" || $dato->serie == NULL || $dato->serie == "0"){
                                        echo "No Registrado";
                                    }else{
                                        echo $dato->serie; 
                                    }
                                    ?></h5></p>
                                    <p><h5>Empresa: <?php echo $com_empresas[$dato->cod_empresa_af - 1] ?></h5></p>
                                    <p><h5>Descripcion: <?php echo $dato->descripcion ?></h5></p>
                                    <p><script src="../assets/js/qr.js"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                              new QRious({
                                            element: document.querySelector("#codigo_ver"),
                                            value: "<?php echo $dato->codigo_interno ?>", // La URL o el texto
                                            size: 100,
                                            backgroundAlpha: 0, // 0 para fondo transparente
                                            foreground: "#000000", // Color del QR
                                            level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
                                            });  
                                            });
                                        </script>
                                        <img alt="Código QR" id="codigo_ver" ></p>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>Datos Empleado</h3>
                                    <p><h5>Codigo Empleado RRHH: <?php echo $dato->cod_empleado_RRHH ?></h5></p>
                                    <p><h5>Nombre Completo: <?php echo $dato->nombre_completo ?></h5></p>
                                    <p><h5>Empresa: <?php echo $com_empresas[$dato->cod_empresa_empleados - 1] ?></h5></p>
                                    <p><h5>Departamento: <?php echo $dato->nombre_departamento ?></h5></p>
                                    <p><h5>Ubicacion: <?php echo $dato->nombre_ubicacion ?></h5></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                        </div> 
                                        <div class="col">
                                            <div class='text-center'>
                                                <h3>Estado: <?php 
                                                $estado = "";
                                                if($dato->estado=="A"){
                                                    $estado = "Abierto"; 
                                                }
                                                else if($dato->estado=="C"){
                                                    $estado = "Cerrado";
                                                }
                                                else if($dato->estado=="F"){
                                                    $estado = "Pendiente de Firma";
                                                }
                                                else if($dato->estado=="X"){
                                                    $estado = "Cancelado";
                                                }
                                                echo $estado ?>    
                                                </h3>
                                            </div>
                                        </div>  
                                        <div class="col">
                                            <div class="text-right">
                                            <?php
                                                if($dato->estado=="F"){
                                            ?>
                                                <button class='btn btn-success' id='firmar_hoja'><img src='../assets/images/icons/firmar.png' height ='25' width='25'/></button>
                                                <button class='btn btn-secondary' id='cancelar_hoja'><img src='../assets/images/icons/eliminar.png' height ='25' width='25'/></button>
                                            <?php
                                                }else if($dato->estado=="A"){
                                            ?>  
                                                <button class='btn btn-warning' id='retornar_hoja'><img src='../assets/images/icons/retornar.png' height ='25' width='25'/></button>
                                            <?php
                                                }
                                            ?>
                                                <button class='btn btn-danger' id='pdf_hoja'><img src='../assets/images/icons/pdf.png' height ='25' width='25'/></button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class='text-center'>
                                    <h3>Asignacion</h3>
                                    <?php
                                        if($dato->estado=="F"){
                                    ?>
                                        <p></p>
                                        <p><h5>Pendiente</h5></p>
                                        <p></p>
                                    <?php
                                        }else if($dato->estado=="X"){
                                    ?>
                                        <p></p>
                                        <p><h5>No aplica</h5></p>
                                        <p></p>          
                                    <?php
                                        }else{
                                    ?>
                                        <p><h5>Fecha y Hora: <?php echo $dato->fecha_asignacion_hoja ?></h5></p>
                                        <img src='<?php echo $dato->firma_empleado_entrega ?>' height ='150' width='300'/>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class='text-center'>
                                    <h3>Retorno</h3>
                                    <?php
                                        if($dato->estado=="A" || $dato->estado=="F" || $dato->estado=="X"){
                                    ?>
                                        <p></p>
                                        <p><h5>No aplica</h5></p>
                                        <p></p>
                                    <?php
                                        }else{
                                    ?>
                                        <p><h5>Fecha y Hora: <?php echo $dato->fecha_creacion_retorno ?></h5></p>
                                        <img src='<?php echo $dato->firma_empleado_retorno ?>' height ='150' width='300'/>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="modal bd-example-modal-lg" id="modalprueba">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                    <h5 class="modal-title">Firmar</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Firmar a continuación:</p>
                                                <canvas id="canvas"></canvas>
                                                <br>
                                                <button id="btnLimpiar" class="btn btn-danger">Limpiar</button>
                                                <button id="btnFirmar" class="btn btn-info">Firmar</button>     
                                                <script src="../assets/js/firma.js"></script>          
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
                
            ?>
        </div>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <script src="../assets/js/buttons.hoja.js"></script>
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
