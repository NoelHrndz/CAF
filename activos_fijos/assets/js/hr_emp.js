$(document).ready(function () {
    $.post("../model/class.hr.emp.php", {emp:$('#hr_emp').val(),rrhh:$('#hr_rrhh').val()},
        function (data) {
            var dataex = data.split("_");
            $('#hr_empleado_in').val(dataex[0]);
            $('#hr_rrhh_in').val(dataex[1]);
            $('#hr_emp_empleado_in').val(dataex[2]);
            $("#hr_empresa option[value='"+dataex[2]+"']").prop("selected","selected");
            $('#hr_empresa').attr('disabled', true);
            
            $('#hr_empleado_in').attr('disabled', true);
            $('#buscar_empleado').attr('disabled', true);
        },
    );
});