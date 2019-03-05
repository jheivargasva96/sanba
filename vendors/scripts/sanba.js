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
                    window.location.reload();
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
