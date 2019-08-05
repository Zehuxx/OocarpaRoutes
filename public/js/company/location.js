$("#mapid").mousedown(function(e) {
    if (e.button == 2) {
        $("#menuCapa").css("top", e.pageY - 20);
        $("#menuCapa").css("left", e.pageX - 20);
        $("#menuCapa").show('fast');
    }
});

$("#mapid").click(function(e) {
    $("#menuCapa").hide('fast');
})

$("#mapid").bind("contextmenu", function(e) {
    return false;
});

function desplegar() {
    $('#editar').modal('show');
    $("#menuCapa").hide('fast');
}

function ocultar() {
    $("#menuCapa").hide('fast');
}