function saveInformation() {
    $("#liga-modal").modal('hide');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "db/guardarDatos.php",
        data: $("#informationform").serialize(),
        success: function (datos) {
            var action = '';
            if (datos.success == 1) {
                action = 'success';
            } else {
                action = 'warning';
            }
            $("#informationform").find('input[type=text]').val('');
            $("#showAlerts").attr("data-target", "#" + action + "-modal");
            $("#alert-" + action).html('<p>' + datos.message + '</p>');
            $("#showAlerts").click();
        }
    });
}

function resetform() {
    $("form select").each(function () { this.selectedIndex = 0 });
    $("form input[type=text] , form textarea").each(function () { this.value = '' });
}