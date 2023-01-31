$(document).ready(function () {
    $('#cancelar_hoja').click(function (e) { 
        swal({title:"Cancelar Hoja de Responsabilidad",text:"¿Esta seguro de cancelar esta hoja de reponsabilidad?",type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Si, Cancelar",cancelButtonText:"No",closeOnConfirm:!1,closeOnCancel:!1},function(e){e?
            $.post("../model/class.cancelar.firmas.php", {
            cod_hr:$('#hdr').val(),
            cod_emp:$('#emp').val()
        },
            function (data) {
                swal({title:data,text:"",timer:2e3,showConfirmButton:!1,type:"success"}); 
                document.location = "ver.datos.hoja.php?hdr="+$('#hdr').val()+"&emp="+$('#emp').val();
            },
        )   :swal({title:"",text:"",timer:2e0,showConfirmButton:!1})});
    });
    $('#retornar_hoja').click(function (e) { 
        alert("ddd");
    });
    $('#firmar_hoja').click(function (e) { 
        $("#modalprueba").modal("show");
    });
});