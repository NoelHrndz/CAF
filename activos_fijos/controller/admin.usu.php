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
    <script src="../assets/js/admin.usu.js"></script>

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
               if($_SESSION['sesion_af'][1]==1){
            ?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-2">
                      Filtrar:<input type="text" id="f_usu" class="form-control">
                  </div>
                  <div class="col">
                     <br><input type="button" id="crear_usu" Value="Crear Nuevo Usuario" class="btn btn-success">
                  </div>
                  <div class="col-3">
             
                  </div>
               </div>
            </div>
         <div class="text-center">
        <div class="col-12 mt-4 table-responsive" id="t_usu">
                      
        </div>
        </div>
        </script>
   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Crear nuevo usuario</h3>
           </div>
           <div class="modal-body">
              <h4>Datos Nuevo Usuario</h4>
              Codigo:<input type="text" id="cod_usu_new" class="form-control" disabled><br>
              Nombre:<input type="text" id="nom_usu_new" class="form-control"><br>
              Usuario:<input type="text" id="usu_new" class="form-control"><br>
              Clave:<input type="password" id="clave_usu_new" class="form-control"><br>
              Repetir Clave:<input type="password" id="rclave_usu_new" class="form-control"><br>
              Estado:<select name="estado" id="estado_usu_new" class="form-control">
                <option value="a_new">Activo</option>
                <option value="i_new">Inactivo</option>
              </select><br>
              Correo:<input type="email" id="correo_usu_new" class="form-control"><br>
              Rol:<select name="rol" id="rol_usu_new" class="form-control">  
                <option value="admin_new">Administrador</option>
                <option value="conta_new">Contabilidad</option>
                <option value="consul_new">Consultas</option>
              </select>   <br>
              Asignar: <br>
                <input type="checkbox" id="sypsa_new"><label for="sypsa_new">&nbsp&nbsp&nbspSYPSA&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="mg_new"><label for="mg_new">&nbsp&nbsp&nbspMG&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="eco_new"><label for="eco_new">&nbsp&nbsp&nbspEcológico&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="pro_new"><label for="pro_new">&nbsp&nbsp&nbspProLogistica&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="work_new"><label for="work_new">&nbsp&nbsp&nbspWorkframe&nbsp&nbsp&nbsp</label>
       </div>
           <div class="modal-footer">
            <input type="button" value="Crear" id="insertar_new" class="btn btn-primary">
            <input type="button" value="Cancelar" id="cancelar_new" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modaleliminarusu" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Eliminar Usuario</h3>
           </div>
           <div class="modal-body">
              <h4>¿Está seguro de eliminar este usuario?</h4>
              Codigo:<input type="text" id="cod_eli" class="form-control" disabled><br>
              Nombre<input type="text" id="nom_eli" class="form-control" disabled><br>
       </div>
           <div class="modal-footer">
            <input type="button" value="Eliminar" id="eliminar_eli" class="btn btn-primary">
            <input type="button" value="Cancelar" id="cancelar_eli" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalmodificarusu" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Modificar Usuario</h3>
           </div>
           <div class="modal-body">
              <h4>Modifique los datos los datos que desee:</h4>
              Codigo:<input type="text" id="cod_mod" class="form-control" disabled><br>
              Nombre:<input type="text" id="nom_mod" class="form-control"><br>
              Usuario:<input type="text" id="usu_mod" class="form-control"><br>   
              Estado:<select name="estado" id="estado_mod" class="form-control">
                <option value="a_mod">Activo</option>
                <option value="i_mod">Inactivo</option><br>
                </select><br>
                Correo:<input type="email" id="correo_mod" class="form-control"><br>
                Rol:<select name="rol" id="rol_mod" class="form-control">  
                <option value="admin_mod">Administrador</option>
                <option value="conta_mod">Contabilidad</option>
                <option value="consul_mod">Consultas</option>
              </select><br>
              Asignar: <br>
                <input type="checkbox" id="sypsa_mod"><label for="sypsa_mod">&nbsp&nbsp&nbspSYPSA&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="mg_mod"><label for="mg_mod">&nbsp&nbsp&nbspMG&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="eco_mod"><label for="eco_mod">&nbsp&nbsp&nbspEcológico&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="pro_mod"><label for="pro_mod">&nbsp&nbsp&nbspProLogistica&nbsp&nbsp&nbsp</label>
                <input type="checkbox" id="work_mod"><label for="work_mod">&nbsp&nbsp&nbspWorkframe&nbsp&nbsp&nbsp</label>
       </div>
           <div class="modal-footer">
            <input type="button" value="Modificar" id="modificar_mod" class="btn btn-primary">
            <input type="button" value="Cancelar" id="cancelar_mod" class="btn btn-danger">
           </div>
      </div>
   </div>
</div>
<div class="modal fade" id="modalcclaveusu" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
              <h3>Reestablecer Clave</h3>
           </div>
           <div class="modal-body">
              <h4>Ingrese Nueva Clave</h4>
              Codigo:<input type="text" id="cod_ccla" class="form-control" disabled><br>
              Clave:<input type="password" id="cla_ccla" class="form-control"><br>
              Repetir clave:<input type="password" id="rcla_ccla" class="form-control"><br>
       </div>
           <div class="modal-footer">
            <input type="button" value="Reestablecer" id="cclave" class="btn btn-primary">
            <input type="button" value="Cancelar" id="cancelar_ccla" class="btn btn-danger">
           </div>
      </div>
   </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
    <script type="text/javascript">
        $('#crear_usu').click(function(){
         $("#mostrarmodal").modal("show");
         $.post("../model/class.ret.cod.php", {cod:$('#cod_usu_new').val()},
            function (data) {
                $('#cod_usu_new').val(data);
            }
         );
      });
        $('#cancelar_new').click(function (e) { 
            $('#cod_usu_new').val("");
            $('#usu_new').val("");
            $('#nom_usu_new').val("");
            $('#clave_usu_new').val("");
            $('#rclave_usu_new').val("");
            $('#correo_usu_new').val("");
            $("#estado_usu_new option[value='a_new']").prop("selected",true);
            $("#rol_usu_new option[value='admin_new']").prop("selected",true);
            $('#sypsa_new').prop('checked', false);
            $('#mg_new').prop('checked', false);
            $('#eco_new').prop('checked', false);
            $('#pro_new').prop('checked', false);
            $('#work_new').prop('checked', false);
            $("#mostrarmodal").modal("hide");
            
        });
        $('#cancelar_eli').click(function (e) { 
          $("#modaleliminarusu").modal("hide");
        });
        $('#cancelar_mod').click(function (e) { 
          $("#modalmodificarusu").modal("hide");
        });
        $('#cancelar_ccla').click(function (e) { 
          $("#modalcclaveusu").modal("hide");
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
