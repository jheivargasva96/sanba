
$(".dial1").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial1").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial2").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial2").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial3").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial3").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
    }

});
$(".dial4").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial4").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial5").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial5").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial5").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial6").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial6").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial6").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial7").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial7").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial7").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial8").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial8").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial8").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});$(".dial9").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial9").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial9").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});
$(".dial10").knob();
$({ animatedVal: 0 }).animate({ animatedVal: $(".dial10").attr("porcentaje") }, {
    duration: 3000,
    easing: "swing",
    step: function () {
        $(".dial10").val(Math.ceil(this.animatedVal)).trigger("change");
    }
});

setTimeout(function () { 
    $(".dial1").val($(".dial1").attr("valorMostrar"));
    $(".dial2").val($(".dial2").attr("valorMostrar"));
    $(".dial3").val($(".dial3").attr("valorMostrar"));
    $(".dial4").val($(".dial4").attr("valorMostrar"));
    $(".dial5").val($(".dial5").attr("valorMostrar"));
    $(".dial6").val($(".dial6").attr("valorMostrar"));
    $(".dial7").val($(".dial7").attr("valorMostrar"));
    $(".dial8").val($(".dial8").attr("valorMostrar"));
    $(".dial9").val($(".dial9").attr("valorMostrar"));
    $(".dial10").val($(".dial10").attr("valorMostrar"));
}, 3005);