<?php
session_start();
if (@$_REQUEST['idliga']) {
    $_SESSION['idliga'] = @$_REQUEST['idliga'];
} elseif (!$_SESSION['idliga']) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('include/head.php'); ?>
    <?php include('include/script.php'); ?>
    <link rel="stylesheet" type="text/css" href="vendors/styles/sanba_principal.css" media="screen">
</head>

<body>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>
    <div class="main-container">
        <?php include('alerts.php'); ?>
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <a href="#" class="btn-block" data-backdrop="static" data-toggle="modal"
                            data-target="#equipo-modal" type="button">
                            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                                <div class="project-info clearfix">
                                    <div class="project-info-left">
                                        <div class="icon box-shadow bg-blue text-white">
                                            <i class="icon-copy ion-plus"></i>
                                        </div>
                                    </div>
                                    <div class="project-info-right">
                                        <span class="no text-blue weight-800 font-24">Ingresar Equipo</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="modal fade" id="equipo-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="vendors/images/ligas.jpg" alt="login" class="login-img">
                                        <h2 class="text-center mb-30">Adicionar Equipo</h2>
                                        <form id="informationform">
                                            <div class="input-group custom input-group-lg">
                                                <input type="text" class="form-control" placeholder="Nombre Equipo*" name="nombre" id="nombre" required>
                                                <input type="hidden" name="table" id="table" value="equipo">
                                                <input type="hidden" name="liga_idliga" id="liga_idliga"
                                                    value="<? echo $_SESSION['idliga']; ?>">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text">
                                                        <i class="icon-copy fa fa-gamepad" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input class="btn btn-primary btn-lg btn-block btnguardar" form="informationform" modal="equipo-modal" type="button" value="Guardar">
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        <a href="#" class="btn-block" data-backdrop="static" data-toggle="modal" data-target="#partido-modal" type="button">
                            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                                <div class="project-info clearfix">
                                    <div class="project-info-left">
                                        <div class="icon box-shadow bg-blue text-white">
                                            <i class="icon-copy ion-plus"></i>
                                        </div>
                                    </div>
                                    <div class="project-info-right">
                                        <span class="no text-blue weight-800 font-24">Ingresar Partido</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="modal fade" id="partido-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2 class="text-center mb-30">Adicionar Partido</h2>
                                        <form id="partido_informationform">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-3 col-form-label">Fecha</label>
                                                <div class="col-sm-12 col-md-9">
                                                <input type="text" class="form-control" name="fecha_partido" id="fecha_partido" value="<?php echo date('Y-m-d'); ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-3 col-form-label">Equipo Local*</label>
                                                <div class="col-sm-12 col-md-9">
                                                    <select class="custom-select col-12" name="equipo_local" id="equipo_local" required>
                                                        <? include('include/cargarEquipos.php'); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-3 col-form-label">Equipo Visitante</label>
                                                <div class="col-sm-12 col-md-9">
                                                    <select class="custom-select col-12">
                                                        <? include('include/cargarEquipos.php'); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="hidden" name="table" id="table" value="partido">
                                                <input type="hidden" name="liga_idliga" id="liga_idliga" value="<? echo $_SESSION['idliga']; ?>">
                                            </div>
                                            <div>
                                                <div class="col-sm-12">
                                                    <div style="text-align: center;">
                                                        <input class="btn btn-primary btnguardar" form="partido_informationform" modal="partido-modal" type="button" value="Guardar" onclick="saveInformation()">
                                                    </div>
                                                </div>
                                            </div>

                                        </form>


                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Text</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" type="text" placeholder="Johnny Brown">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Search</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" placeholder="Search Here" type="search">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="bootstrap@example.com"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">URL</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="https://getbootstrap.com"
                                                        type="url">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="1-(111)-111-1111" type="tel">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Number</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="100" type="number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-datetime-local-input"
                                                    class="col-sm-12 col-md-2 col-form-label">Date and time</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control datetimepicker"
                                                        placeholder="Choose Date anf time" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control date-picker" placeholder="Select Date"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Month</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control month-picker" placeholder="Select Month"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Time</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control time-picker td-input"
                                                        placeholder="Select time" type="text" readonly="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Color</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="#563d7c" type="color">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Input Range</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input class="form-control" value="50" type="range">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>