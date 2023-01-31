$(document).ready(function () {
    $.post("../model/class.hr.af.php", {emp:$('#hr_emp').val(),af:$('#hr_af').val()},
        function (data) {
            var dataex = data.split("~");
            $('#hr_af_in').val(dataex[0]);
            $('#hr_cod_in').val(dataex[1]);
            $('#hr_emp_af_in').val(dataex[2]);
            
            $('#hr_af_in').attr('disabled', true);
            $('#buscar_af').attr('disabled', true);
        },
    );
});