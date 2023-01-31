$(document).ready(function () {
    $('#user').focus();
    $('#user').val('');
    $('#pass').val('');
    $('#ingresar').click(function () { 
        ingresar_sis();
    });
    $(document).keypress(function(e){
        if(e.which == 13) {
            ingresar_sis();
             }
            });


function ingresar_sis(){    
    if($('#user').val()==""){
        toastr.success("MIAU","Top Right",{timeOut:5e3,closeButton:!0,debug:!1,newestOnTop:!0,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!0,onclick:null,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut",tapToDismiss:!1});
        $('#user').focus();
    }
    else if($('#pass').val()==""){
        alert("Inserte Contraseña Valida");
        $('#pass').focus();

    }
    else{
        $.post("controller/login.php", {user:$('#user').val(),pass:$('#pass').val()},
    function (data) {
        if(data==1){
                document.location='controller/index.php';
            }   
        else{
            $('#user').val('');
            $('#pass').val('');
            alert("Usuario Inactivo o Credenciales Incorrectas");
            $('#user').focus();
        }
    },
   );
    }
   
}
});