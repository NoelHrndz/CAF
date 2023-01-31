$(document).ready(function () {
    filtrar_tabla();
    $('#f_usu').keyup(function (e) { 
        filtrar_tabla();
    });
    $('#insertar_new').click(function (e) { 
            var vsypsa = "N";
            var vmg = "N";
            var veco = "N";
            var vpro = "N";
            var vwork = "N";
            if ($('#sypsa_new:checked').val() !== undefined){
                vsypsa = "S";
            }
            if ($('#mg_new:checked').val() !== undefined){
                vmg = "S";
            }
            if ($('#eco_new:checked').val() !== undefined){
                veco = "S";
            }
            if ($('#pro_new:checked').val() !== undefined){
                vpro = "S";
            }
            if ($('#work_new:checked').val() !== undefined){
                vwork = "S";
            }
            if($('#cod_usu_new').val()=="" || $('#nom_usu_new').val()=="" || $('#user_usu_new').val()=="" || $('#rclave_usu_new').val()=="" 
            || $('#clave_usu_new').val()=="" || $('#correo_usu_new').val()==""){
                swal({title:"Inserte todos los datos",text:"",timer:2e3,showConfirmButton:!1,type:"warning"});
            }
            else if($('#sypsa_new:checked').val() === undefined && $('#mg_new:checked').val() === undefined && $('#eco_new:checked').val() 
            === undefined && $('#pro_new:checked').val() === undefined && $('#work_new:checked').val() === undefined){
                swal({title:"Ingrese al menos una empresa",text:"",timer:2e3,showConfirmButton:!1,type:"warning"});
            }
            else if($('#clave_usu_new').val()!=$('#rclave_usu_new').val()){
                swal({title:"Claves no coinciden",text:"",timer:2e3,showConfirmButton:!1,type:"error"});
            }
            else{
            $("#mostrarmodal").modal("hide");   
            $.post("../model/class.crear.usuario.php", {         
            cod:$('#cod_usu_new').val(),
            nom:$('#nom_usu_new').val(),
            user:$('#usu_new').val(),
            clave:$('#clave_usu_new').val(),
            correo:$('#correo_usu_new').val(),
            rol:$('#rol_usu_new').val(),
            estado:$('#estado_usu_new').val(),
            sypsa:vsypsa,
            mg:vmg,
            eco:veco,
            pro:vpro,
            work:vwork
            },
            function (data) {
            swal({title:"Nuevo usuario Creado",text:"",timer:2e3,showConfirmButton:!1,type:"success"});
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
                filtrar_tabla();
            }
            
        );}
        

    });
    $('#eliminar_eli').click(function (e) { 
        $.post("../model/class.eli.usu.php", {cod:$('#cod_eli').val()},
            function (data) {
                swal({title:"Usuario Eliminado",text:"",timer:2e3,showConfirmButton:!1,type:"success"});
                filtrar_tabla();
                $("#modaleliminarusu").modal("hide");  
            },
        );
        
        
    });
    $('#modificar_mod').click(function (e) { 
            var vsypsa = "N";
            var vmg = "N";
            var veco = "N";
            var vpro = "N";
            var vwork = "N";
            if ($('#sypsa_mod:checked').val() !== undefined){
                vsypsa = "S";
            }
            if ($('#mg_mod:checked').val() !== undefined){
                vmg = "S";
            }
            if ($('#eco_mod:checked').val() !== undefined){
                veco = "S";
            }
            if ($('#pro_mod:checked').val() !== undefined){
                vpro = "S";
            }
            if ($('#work_mod:checked').val() !== undefined){
                vwork = "S";
            }
            if($('#cod_mod').val()=="" || $('#nom_mod').val()=="" || $('#usu_mod').val()=="" || $('#correo_mod').val()==""){
                swal({title:"Inserte todos los datos",text:"",timer:2e3,showConfirmButton:!1,type:"warning"});
            }
            else if($('#sypsa_mod:checked').val() === undefined && $('#mg_mod:checked').val() === undefined && $('#eco_mod:checked').val() 
            === undefined && $('#pro_mod:checked').val() === undefined && $('#work_mod:checked').val() === undefined){
                swal({title:"Seleccione al menos una empresa",text:"",timer:2e3,showConfirmButton:!1,type:"warning"});
            }
            else{
                $.post("../model/class.mod.usu.php", {
                    cod:$('#cod_mod').val(),
                    nom:$('#nom_mod').val(),
                    usu:$('#usu_mod').val(),
                    estado:$('#estado_mod').val(),
                    correo:$('#correo_mod').val(),
                    rol:$('#rol_mod').val(),
                    sypsa:vsypsa,
                    mg:vmg,
                    eco:veco,
                    pro:vpro,
                    work:vwork
                },
                    function (data) {
                        swal({title:"Usuario Modificado",text:"",timer:2e3,showConfirmButton:!1,type:"success"});
                        filtrar_tabla();
                        $("#modalmodificarusu").modal("hide");  
                    },
        
                );
            }
       
    });
    $('#cclave').click(function (e) { 
        if($('#cla_ccla').val()=="" || $('#rcla_ccla').val()==""){
            swal({title:"Inserte todos los datos",text:"",timer:2e3,showConfirmButton:!1,type:"warning"});
        }
        else if($('#cla_ccla').val()!=$('#rcla_ccla').val()){
            swal({title:"Claves no coinciden",text:"",timer:2e3,showConfirmButton:!1,type:"error"});
        }
        else{
            $.post("../model/class.cambiarclave.usu.php", {
                cod:$('#cod_ccla').val(),
                clave:$('#cla_ccla').val()
            },
                function (data) {
                    swal({title:"Se estableció la nueva clave",text:"",timer:2e3,showConfirmButton:!1,type:"success"});
                    $("#modalcclaveusu").modal("hide");
                },
            );
        }
    });
});
function filtrar_tabla(){

    $.post("../model/class.admin.usu.php", {f_usu:$('#f_usu').val()},
        function (data) {
            $('#t_usu').html(data);
        },
    );
}