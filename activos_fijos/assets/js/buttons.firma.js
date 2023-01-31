$(document).ready(function () {
    $('#fir_aho').click(function (e) { 
        $('#canvas_firma').html(`<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                        <p>Firmar a continuación:</p>
                        <canvas id="canvas"></canvas>
                        <br>
                        <button id="btnLimpiar" class="btn btn-danger">Limpiar</button>
                        <button id="btnFirmar" class="btn btn-info">Firmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/firma.js"></script>`);
        //$("#modalfirma").modal("show"); 
    $('#fir_aho').attr("disabled", true);
    $('#fir_des').attr("disabled", true);
    });
    $('#fir_can').click(function (e) { 
        $('#firmar').html("");
        $('#hr_empresa').attr('disabled', false);
        $('#buscar_empleado').attr('disabled', false);   
        $('#buscar_af').attr('disabled', false);
        $('#hr_ubicacion').attr('disabled', false);
        $('#crear').attr('disabled', false);
        $('#pen_firma').attr('disabled', false);
        $('#canvas_firma').html("");
    });
    $('#fir_des').click(function (e) { 
       $.post("../model/class.firmar.despues.php", {
            empresa:$('#hr_empresa').val(),
            empresa_empleado:$('#hr_emp_empleado_in').val(),
            cod_empleado:$('#hr_rrhh_in').val(),
            cod_activo:$('#hr_cod_in').val(),
            empresa_activo:$('#hr_emp_af_in').val(),
            ubicacion:$('#hr_ubicacion').val()
       },
        function (data) {
            swal({title:data,text:"",timer:2e3,showConfirmButton:!1,type:"success"});
            $('#firmar').html("");
            $('#hr_empresa').attr('disabled', false);
            $('#buscar_empleado').attr('disabled', false);   
            $('#buscar_af').attr('disabled', false);
            $('#hr_ubicacion').attr('disabled', false);
            $('#crear').attr('disabled', false);
            $('#pen_firma').attr('disabled', false);

            $('#hr_empleado_in').val("");
            $('#hr_af_in').val("");
            $("#hr_empresa option[value='1']").prop("selected","selected");
            $("#hr_ubicacion option[value='1']").prop("selected","selected");
        },
       );
    });
});