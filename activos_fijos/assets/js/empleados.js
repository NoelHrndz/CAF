$(document).ready(function () {
    filtrar_tabla();
    $('#regresar').click(function (e) { 
        document.location = "admin.emp.php";
    });
    $('#f_empleados').keyup(function (e) { 
        filtrar_tabla();
    });
    $('#sincronizar').click(function (e) { 
        filtrar_tabla();       
    });
    $('#sincronizar').click(function (e) {  
        $('#sincronizar').val('Sincronizando...');
        $('#sincronizar').attr('disabled',true);
            $.ajax({
            type: "POST",
            url: "../model/class.sincronizar.empleados.php",
            data:{cod_emp:$('#cod_empresa').val()},
            success: function (response) {
                $('#sincronizar').val('Sincronizar');
                $('#sincronizar').attr('disabled',false);
                swal({title:response,text:"",timer:2e3,showConfirmButton:!1,type:"success"});
                filtrar_tabla();
            }
        });
    });
});
function filtrar_tabla(){
    $.post("../model/class.admin.empleados.php", {f_emp:$('#f_empleados').val(), cod_emp:$('#cod_empresa').val()},
        function (data) {
            $('#t_empleados').html(data);
        },
    );
}