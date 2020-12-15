$(".dial").each(function(){
    var seleccionado = $(this);
    $(seleccionado).knob();
    $({ animatedVal: 0 }).animate({ animatedVal: $(seleccionado).attr("porcentaje") }, {
        duration: 3000,
        easing: "swing",
        step: function () {
            $(seleccionado).val(Math.ceil(this.animatedVal)).trigger("change");
        }
    });
});

setTimeout(function () {
    $(".dial").each(function(){
        $(this).val($(this).attr("valorMostrar"));
    });
}, 3005);
