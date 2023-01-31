$(function() {
    $(document).on('click', 'button', function(event) {
       let id = this.id;
       var inst = id.split('_');
       if(inst[0]=="subir"){
        $.post("../model/class.subirimagen.php", {cod:inst[1]});//PENDIENTE DE REALIZAR
        $("#subirimagen").modal("show");
        }else if(inst[0]=="asignar"){
            document.location="crear.php?af="+inst[1]+"&emp="+inst[2];      
        }
        else if(inst[0]=="asignaraf"){
        document.location="crear.php?rrhh="+inst[1]+"&emp="+inst[2];      
        }
        else if(inst[0]=="qr"){
            $("#verqr").modal("show");
            
            $.post("../model/class.verqr.php", {cod:inst[1],emp:inst[2]},
                function (data) {
                    new QRious({
                        element: document.querySelector("#codigo"),
                        value: data, // La URL o el texto
                        size: 400,
                        backgroundAlpha: 0, // 0 para fondo transparente
                        foreground: "#000000", // Color del QR
                        level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
                    });
                },
            );
            
        }
   
    });
});
