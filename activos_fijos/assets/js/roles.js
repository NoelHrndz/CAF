$(document).ready(function () {
    alert("sss");
    $.post("dashboard/dashboard.php", {roles:$('#roles').val()},
        function (data) {
            
        },
    );
});