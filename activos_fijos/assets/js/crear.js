$(document).ready(function () {
    $('#buscar_empleado').click(function (e) { 
        $('#f_emp').val("");
        $("#modaldtemp").modal("show");
        filtrar_empleados();       
    });
    $('#f_emp').keyup(function (e) { 
        filtrar_empleados();  
    });
    $('#can_bus_emp').click(function (e) { 
        $("#modaldtemp").modal("hide");
    });
    $('#buscar_af').click(function (e) { 
        $('#f_af').val("");
        $("#modaldtaf").modal("show");
        filtrar_activos();
    });
    $('#f_af').keyup(function (e) { 
        filtrar_activos();
    });
    $('#can_bus_af').click(function (e) { 
        $("#modaldtaf").modal("hide");
    });
    $('#pen_firma').click(function (e) { 
        $("#modalpenfir").modal("show");
        filtrar_pendientes();
    });
    $('#f_pen').keyup(function (e) { 
        filtrar_pendientes();
    });
    $('#can_penfir').click(function (e) { 
        $("#modalpenfir").modal("hide");
    });
    $('#hr_empresa').click(function (e) { 
        $('#hr_empleado_in').val("");
    });
    $('#crear').click(function (e) { 
        if($('#hr_empleado_in').val()=="" || $('#hr_af_in').val()==""){
            swal({title:"Datos Incompletos",text:"",timer:2e3,showConfirmButton:!1,type:"error"});
        }else{
         $('#firmar').html(`<input type='button' class='btn btn-success' id='fir_aho' value='Firmar Ahora'>
                            <input type='button' class='btn btn-warning' id='fir_des' value='Firmar Despues'>
                            <input type='button' class='btn btn-danger' id='fir_can' value='Cancelar'>
                            <script src='../assets/js/buttons.firma.js'></script>`);
        $('#hr_empresa').attr('disabled', true);
        $('#buscar_empleado').attr('disabled', true);   
        $('#buscar_af').attr('disabled', true);
        $('#hr_ubicacion').attr('disabled', true);
        $('#crear').attr('disabled', true);
        $('#pen_firma').attr('disabled', true);

        }
        
    });
});
function filtrar_empleados(){
    $.post("../model/class.bus.emp.php", {
        f_emp:$('#f_emp').val(),
        emp:$('#hr_empresa').val()},
            function (data) {
                $('#datatable_bus_emp').html(data);
            },
        );
}
function filtrar_activos(){
    $.post("../model/class.bus.af.php", {f_af:$('#f_af').val()},
    function (data) {
        $('#datatable_bus_af').html(data);
    },
);
}
function filtrar_pendientes(){
    $.post("../model/class.bus.pendientes.php", {f_pen:$('#f_pen').val()},
    function (data) {
        $('#datatable_pen_fir').html(data);
    },
);
}