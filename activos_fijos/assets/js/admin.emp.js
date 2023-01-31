$(document).ready(function () {
    filtrar_tabla();
    /*$('#f_emp').keyup(function (e) { 
        filtrar_tabla();
    });*/
    $('#mod_emp').click(function (e) { 
        if($('#nom_mod_emp').val()==""){
            swal({title:"Inserte Datos",text:"",timer:2e3,showConfirmButton:!1,type:"warning"});
        }
        else{
            $.post("../model/class.mod.emp.php", {
                cod:$('#cod_mod_emp').val(),
                nom:$('#nom_mod_emp').val(),
                nombd:$('#nombd_mod_emp').val(),
                estado:$('#estado_emp').val()
            },
                function (data) {
                    swal({title:"Empresa Modificada",text:"",timer:2e3,showConfirmButton:!1,type:"success"});
                    filtrar_tabla();
                    $("#modalmodemp").modal("hide");
                },
            );
        }
    });
}); 
function filtrar_tabla(){

    $.post("../model/class.admin.emp.php", {/*f_emp:$('#f_emp').val()*/},
        function (data) {
            $('#t_emp').html(data);
        },
    );
}