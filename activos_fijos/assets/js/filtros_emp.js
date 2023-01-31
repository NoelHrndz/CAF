$(function() {
    $(document).on('click', 'button', function(event) {
       let id = this.id;
        var inst = id.split('_');
        if(inst[0]=="ver"){
            if(inst[1]=="empl"){
                document.location="empleados.php?cod_emp="+inst[2];
            }
            else if(inst[1]=="acti"){
                document.location="index.php?cod_emp="+inst[2];
            }
        }
    });
    });