$(document).ready(function () {
    consultar();
    $('#dato').keyup(function (e) { 
        consultar();
        
    });
    $('#sincro_af').click(function (e) { 
        $.post("../model/class.sincronizar.af.php", {cod:$('#cod_empresa').val()},
            function (data) {
                swal({title:data,text:"",timer:2e3,showConfirmButton:!1,type:"success"});
                consultar();
            },
        );
    });
});
function consultar(){
    $.post("../model/class.consulta.php", {dato:$('#dato').val(),cod:$('#cod_empresa').val()},
        function (data) {
            $('#datatable').html(data);
        },
    );
}