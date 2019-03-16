$(document).on("click", '.btnguardar', function () {
    saveInformation($(this));
});

function saveInformation(selector) {
    //event.preventDefault();
    var form = selector.attr('form');
    var result = document.getElementById(form).checkValidity();
    if (result) {
        var modal = selector.attr('modal');
        $("#" + modal).modal('hide');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "db/guardarDatos.php",
            data: $("#" + form).serialize(),
            success: function (datos) {
                var action = '';
                if (datos.success == 1) {
                    action = 'success';
                } else {
                    action = 'warning';
                }
                $("#" + form).find('input[type=text]').val('');
                $("#showAlerts").attr("data-target", "#" + action + "-modal");
                $("#alert-" + action).html('<p>' + datos.message + '</p>');
                $("#showAlerts").click();
                if (selector.attr('adicional')) {
                    var adicional = selector.attr('adicional');
                    adicional = adicional.split('-');
                    $("#" + adicional[0]).load(adicional[1]);
                } else {
                    window.location.href="principal.php";
                }
            }
        });
    } else {
        alert('Los campos con * son obligatorios');
        $("#" + form).find('[required]').addClass('error');
    }
}

$(document).on("click", '.submit_liga', function () {
    var form = $(this).attr('form');
    $("#form_liga" + form).submit();
});

function calculaGanador(){
    // Las variables estan definidas como c:cuarto 1:numero de cuarto l/v: local/visitante
    var ganardor = '';
    var c1l = $("#cuarto_uno_local").val();
    var c2l = $("#cuarto_dos_local").val();
    var c3l = $("#cuarto_tres_local").val();
    var c4l = $("#cuarto_cuatro_local").val();
    var c1v = $("#cuarto_uno_visitante").val();
    var c2v = $("#cuarto_dos_visitante").val();
    var c3v = $("#cuarto_tres_visitante").val();
    var c4v = $("#cuarto_cuatro_visitante").val();
    var total_local = validarNumero(c1l) + validarNumero(c2l) + validarNumero(c3l) + validarNumero(c4l);
    var total_visitante = validarNumero(c1v) + validarNumero(c2v) + validarNumero(c3v) + validarNumero(c4v);
    if (total_local > total_visitante) {
        ganador = $('select[name="equipo_local"] option:selected').text();
    } else {
        ganador = $('select[name="equipo_visitante"] option:selected').text();
    }
    $("#ganador").val(ganador);
}

function validarNumero(dato){
    if (parseInt(dato)) {
        return parseInt(dato);
    } else {
        return parseInt(0);
    }
}

$(document).on("change", '#equipo_local', function () {
    calculaGanador();
});

$(document).on("change", '#equipo_visitante', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_uno_local', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_dos_local', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_tres_local', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_cuatro_local', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_uno_visitante', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_dos_visitante', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_tres_visitante', function () {
    calculaGanador();
});

$(document).on("blur", '#cuarto_cuatro_visitante', function () {
    calculaGanador();
});

