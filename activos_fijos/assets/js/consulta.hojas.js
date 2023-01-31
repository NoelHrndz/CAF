$(document).ready(function () {
    filtrar_tabla();
    $('#f_hojas').keyup(function (e) { 
        filtrar_tabla();
    });
});
function filtrar_tabla(){
    $.post("../model/class.consulta.hojas.php", {
        f_hojas:$('#f_hojas').val()
    },
        function (data) {
            $('#datatable_hojas').html(data);
        },
    );
}