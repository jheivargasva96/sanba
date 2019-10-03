<?php
if(!@$_SESSION['idliga']){
    session_start();
}
require $_SERVER['DOCUMENT_ROOT'] . '/sanba/include/libreriasCalculos.php';
$promedios = promediosGenerales($_SESSION['idliga']);
?>
<center><h1 class="text-blue">PROMEDIOS GENERALES</h1></center>
<br>
<h4 class="text-blue">LOCAL</h4>
<br>
<div class="row clearfix progress-box">
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['local']['c1'],$promedios['local']['total'])); ?>" valorMostrar="<?php echo(round($promedios['local']['c1'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#0099ff" readonly>
                <h5 class="text-blue padding-top-5 weight-250">Cuarto 1</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['local']['c2'],$promedios['local']['total'])); ?>" valorMostrar="<?php echo(round($promedios['local']['c2'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#41ccba" readonly>
                <h5 class="text-light-green padding-top-5 weight-250">Cuarto 2</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['local']['c3'],$promedios['local']['total'])); ?>" valorMostrar="<?php echo(round($promedios['local']['c3'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#f56767" readonly>
                <h5 class="text-light-orange padding-top-5 weight-250">Cuarto 3</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['local']['c4'],$promedios['local']['total'])); ?>" valorMostrar="<?php echo(round($promedios['local']['c4'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-5 weight-250">Cuarto 4</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['local']['total'],$promedios['local']['total'])); ?>" valorMostrar="<?php echo(round($promedios['local']['total'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-5 weight-250">Total</h5>
            </div>
            <br>
        </div>
    </div>
</div>

<br>
<h4 class="text-blue">VISITANTE</h4>
<br>
<div class="row clearfix progress-box">
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['visitante']['c1'],$promedios['visitante']['total'])); ?>" valorMostrar="<?php echo(round($promedios['visitante']['c1'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#0099ff" readonly>
                <h5 class="text-blue padding-top-5 weight-250">Cuarto 1</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['visitante']['c2'],$promedios['visitante']['total'])); ?>" valorMostrar="<?php echo(round($promedios['visitante']['c2'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#41ccba" readonly>
                <h5 class="text-light-green padding-top-5 weight-250">Cuarto 2</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['visitante']['c3'],$promedios['visitante']['total'])); ?>" valorMostrar="<?php echo(round($promedios['visitante']['c3'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#f56767" readonly>
                <h5 class="text-light-orange padding-top-5 weight-250">Cuarto 3</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['visitante']['c4'],$promedios['visitante']['total'])); ?>" valorMostrar="<?php echo(round($promedios['visitante']['c4'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-5 weight-250">Cuarto 4</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['visitante']['total'],$promedios['visitante']['total'])); ?>" valorMostrar="<?php echo(round($promedios['visitante']['total'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-5 weight-250">Total</h5>
            </div>
            <br>
        </div>
    </div>
</div>

<br>
<h4 class="text-blue">SUMATORIA</h4>
<br>
<div class="row clearfix progress-box">
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['suma']['c1'],$promedios['suma']['total'])); ?>" valorMostrar="<?php echo(round($promedios['suma']['c1'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#0099ff" readonly>
                <h5 class="text-blue padding-top-5 weight-250">Cuarto 1</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['suma']['c2'],$promedios['suma']['total'])); ?>" valorMostrar="<?php echo(round($promedios['suma']['c2'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#41ccba" readonly>
                <h5 class="text-light-green padding-top-5 weight-250">Cuarto 2</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['suma']['c3'],$promedios['suma']['total'])); ?>" valorMostrar="<?php echo(round($promedios['suma']['c3'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#f56767" readonly>
                <h5 class="text-light-orange padding-top-5 weight-250">Cuarto 3</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['suma']['c4'],$promedios['suma']['total'])); ?>" valorMostrar="<?php echo(round($promedios['suma']['c4'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-5 weight-250">Cuarto 4</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input disabled type="text" class="knob dial" porcentaje="<?php echo(calcularPorcentaje($promedios['suma']['total'],$promedios['suma']['total'])); ?>" valorMostrar="<?php echo(round($promedios['suma']['total'],2)); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-5 weight-250">Total</h5>
            </div>
            <br>
        </div>
    </div>
</div>

<script src="vendors/scripts/knob.js"></script>
