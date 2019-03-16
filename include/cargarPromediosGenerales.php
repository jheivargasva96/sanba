<?
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
                <input type="text" class="knob dial1" value="<?php echo($promedios['local']['c1']); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#0099ff" readonly>
                <h5 class="text-blue padding-top-5 weight-250">Cuarto 1</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-19 box-shadow border-radius-5 height-50-p">
            <br>
            <div class="progress-box text-center">
                <input type="text" class="knob dial2" value="<?php echo($promedios['local']['c2']); ?>" data-width="100" data-height="100" data-thickness="0.05" data-fgColor="#41ccba" readonly>
                <h5 class="text-light-green padding-top-5 weight-250">Cuarto 2</h5>
            </div>
            <br>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
            <div class="progress-box text-center">
                <input type="text" class="knob dial3" value="200" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>
                <h5 class="text-light-orange padding-top-10 weight-500">Projects Speed</h5>
                <span class="font-14">90% Average <i class="fa fa-line-chart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
            <div class="progress-box text-center">
                <input type="text" class="knob dial4" value="35" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#a683eb" readonly>
                <h5 class="text-light-purple padding-top-10 weight-500">Panding Orders</h5>
                <span class="font-14">35% Average <i class="fa fa-line-chart"></i></span>
            </div>
        </div>
    </div>
</div>
<script src="vendors/scripts/knob.js"></script>
