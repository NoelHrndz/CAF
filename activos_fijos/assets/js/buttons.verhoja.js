$(function() {
    $(document).on('click', 'button', function(event) {
       let id = this.id;    
       var inst = id.split("_");
       if(inst[0]=='ver'){
            document.location = "ver.datos.hoja.php?hdr="+inst[1]+"&emp="+inst[2];
       }
       else if(inst[0]=='retornar'){

       }
       else if(inst[0]=='firmar'){
        $("#modalfirmahojas").modal("show");
       }
       else if(inst[0]=='cancelar'){
        swal({title:"Cancelar Hoja de Responsabilidad",text:"¿Esta seguro de cancelar esta hoja de reponsabilidad?",type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Si, Cancelar",cancelButtonText:"No",closeOnConfirm:!1,closeOnCancel:!1},function(e){e?
            $.post("../model/class.cancelar.firmas.php", {
            cod_hr:inst[1],
            cod_emp:inst[2]
        },
            function (data) {
                swal({title:data,text:"",timer:2e3,showConfirmButton:!1,type:"success"}); 
                filtrar_tabla();
            },
        )   :swal({title:"",text:"",timer:2e0,showConfirmButton:!1})});   
       }
       else if(inst[0]=='pdf'){
        swal({title:id,text:"",timer:2e3,showConfirmButton:!1,type:"success"}); 
       }
    });
});