$(function() {
    $(document).on('click', 'button', function(event) {
       let id = this.id;    
       var inst = id.split("_");
       if(inst[0]=="cancelar"){
        swal({title:"Cancelar Hoja de Responsabilidad",text:"¿Esta seguro de cancelar esta hoja de reponsabilidad?",type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Si, Cancelar",cancelButtonText:"No",closeOnConfirm:!1,closeOnCancel:!1},function(e){e?
            $.post("../model/class.cancelar.firmas.php", {
            cod_hr:inst[1],
            cod_emp:inst[2]
        },
            function (data) {
                swal({title:data,text:"",timer:2e3,showConfirmButton:!1,type:"success"}); 
                $("#modalpenfir").modal("hide"); 
            },
        )   :swal({title:"",text:"",timer:2e0,showConfirmButton:!1})});     
       }
       else if(inst[0]=="firmar"){
            $.post("../model/class.firmar.pendientes.php", {
                cod_af:inst[1],
                cod_emp_af:inst[2]
            },
                function (data) {
                    $("#modalpenfir").modal("hide");
                    var dataex = data.split('_');
                    $("#hr_empresa option[value='"+dataex[0]+"']").prop("selected","selected");
                    $("#hr_emp_empleado_in").val(dataex[1]);
                    $("#hr_rrhh_in").val(dataex[2]);
                    $('#hr_empleado_in').val(dataex[3]);
                    $('#hr_emp_af_in').val(dataex[4]);
                    $('#hr_cod_in').val(dataex[5]);
                    $('#hr_af_in').val(dataex[6]);
                    $("#hr_ubicacion option[value='"+dataex[7]+"']").prop("selected","selected");
                    $('#hr_empresa').attr('disabled', true);
                    $('#buscar_empleado').attr('disabled', true);   
                    $('#buscar_af').attr('disabled', true);
                    $('#hr_ubicacion').attr('disabled', true);
                    $('#crear').attr('disabled', true);
                    $('#pen_firma').attr('disabled', true);
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
                },
            );
       }
    });
});
