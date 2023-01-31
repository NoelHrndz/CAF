$(function() {
    $(document).on('click', 'button', function(event) {
       let id = this.id;    
       var inst = id.split("_");
       if(inst[0]=="selemp"){
        $('#hr_emp_empleado_in').val(inst[1]);
        $('#hr_rrhh_in').val(inst[2]);
        $('#hr_empleado_in').val(inst[3]);
        $("#modaldtemp").modal("hide");
       }
       else if(inst[0]=="selaf"){
        $('#hr_emp_af_in').val(inst[1]);
        $('#hr_cod_in').val(inst[2]);
        $('#hr_af_in').val(inst[3]);
        $("#modaldtaf").modal("hide");
       }
    });
});