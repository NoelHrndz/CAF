$(function() {
    $(document).on('click', 'button', function(event) {
       let id = this.id;
        var inst = id.split('_');
        if(inst[0]=="mod"){
            if(inst[1]=="usu"){
                $("#modalmodificarusu").modal("show");
                $.post("../model/class.ret.mod.usu.php",{id_b:inst[2]},
                    function (data) {
                        var dataex = data.split('_');
                        $('#cod_mod').val(dataex[0]);
                        $('#nom_mod').val(dataex[1]);
                        $('#usu_mod').val(dataex[2]);
                        if(dataex[3]=="A"){
                            $("#estado_mod option[value='a_mod']").prop("selected","selected");
                        }
                        else{
                            $("#estado_mod option[value='i_mod']").prop("selected","selected");
                        }
                        $('#correo_mod').val(dataex[4]);
                        if(dataex[5]=="1"){
                            $("#rol_mod option[value='admin_mod']").prop("selected","selected");
                        }
                        else if(dataex[5]=="2"){
                            $("#rol_mod option[value='conta_mod']").prop("selected","selected");
                        }
                        else{
                            $("#rol_mod option[value='consul_mod']").prop("selected","selected");
                        }
                        if(dataex[6]=="S"){
                            $("#sypsa_mod").prop("checked",true);
                        }
                        else{
                            $("#sypsa_mod").prop("checked",false);
                        }
                        if(dataex[7]=="S"){
                            $("#mg_mod").prop("checked",true);
                        }
                        else{
                            $("#mg_mod").prop("checked",false);
                        }
                        if(dataex[8]=="S"){
                            $("#eco_mod").prop("checked",true);
                        }
                        else{
                            $("#eco_mod").prop("checked",false);
                        }
                        if(dataex[9]=="S"){
                            $("#pro_mod").prop("checked",true);
                        }
                        else{
                            $("#pro_mod").prop("checked",false);
                        }
                        if(dataex[6]=="S"){
                            $("#work_mod").prop("checked",true);
                        }
                        else{
                            $("#work_mod").prop("checked",false);
                        }

                    },
                );
            }
            else if(inst[1]=="emp"){
                $("#modalmodemp").modal("show");
                $.post("../model/class.ret.cod.emp.php",{
                    cod:inst[2]
                },
                    function (data) {
                        var dataex = data.split('-');
                        $('#cod_mod_emp').val(dataex[0]);
                        $('#nom_mod_emp').val(dataex[1]);
                        $('#nombd_mod_emp').val(dataex[2]);
                        if(dataex[3]=="A"){
                            $("#estado_emp option[value='a_emp']").prop("selected","selected");
                        }
                        else{
                            $("#estado_emp option[value='i_emp']").prop("selected","selected");
                        }
                    },
                );
            }
        }
        else if(inst[0]=="eli"){
            if(inst[1]=="usu"){
                $("#modaleliminarusu").modal("show");
                $.post("../model/class.ret.eli.usu.php", {id_b:inst[2]},
                    function (data) {
                        var dataex = data.split('_');
                        $('#cod_eli').val(dataex[0]);
                        $('#nom_eli').val(dataex[1]);
                    },
                );
            }
        }
        else{
            $('#cod_ccla').val(inst[1]);
            $('#cla_ccla').val("");
            $('#rcla_ccla').val("");
            $("#modalcclaveusu").modal("show");
        }
     });
   });