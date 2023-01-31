$(document).ready(function () {
    $('#tex1').keyup(function (e) { 
            filtrar();
    });
});
function filtrar(){
   $.post("class.prueba.php", {text1:$('#tex1').val()},
        function (data) {
            $('#rtex1').val(data);
        },
    );  
}