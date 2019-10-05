<?php
session_start();
date_default_timezone_set('America/Bogota');
if (@$_REQUEST['idliga']) {
    $_SESSION['idliga'] = @$_REQUEST['idliga'];
} elseif (!$_SESSION['idliga']) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('include/head.php'); ?>
    <?php include('include/script.php'); ?>
    <link rel="stylesheet" type="text/css" href="vendors/styles/sanba_principal.css" media="screen">
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
</head>

<body>
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>
    <div class="main-container">
        <?php include('alerts.php'); ?>
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="fondo_principal">
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
                        <div class="modal fade" id="equipo-modal" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                        <img src="vendors/images/ligas.jpg" alt="login" class="login-img">
                                        <h2 class="text-center mb-30">Adicionar Equipo</h2>
                                        <form id="informationform">
                                            <div class="input-group custom input-group-lg">
                                                <input type="text" class="form-control" placeholder="Nombre Equipo*" name="nombre" id="nombre" required>
                                                <input type="hidden" name="table" id="table" value="equipo">
                                                <input type="hidden" name="liga_idliga" id="liga_idliga" value="<?php echo $_SESSION['idliga']; ?>">
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
                        <a href="#" class="btn-block" data-backdrop="static" data-toggle="modal"
                            data-target="#partido-modal" type="button">
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
                        <div class="modal fade" id="partido-modal" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                        <div class="clearfix">
                                            <center>
                                                <h4 class="text-blue">Adicionar Partido</h4>
                                            </center>
                                        </div>
                                        <br>
                                        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                                            <div class="wizard-content">
                                                <form id="partido_informationform"
                                                    class="tab-wizard wizard-circle wizard vertical">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Fecha</label>
                                                        <div class="col-sm-12 col-md-9">
                                                            <input type="text" class="form-control date-picker" name="fecha_partido" id="fecha_partido" otro="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Ganador</label>
                                                        <div class="col-sm-12 col-md-9">
                                                            <input type="text" class="form-control" name="ganador" id="ganador" value="" disabled>
                                                        </div>
                                                    </div>

                                                    <h5>Equipo Local</h5>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-md-4 col-form-label">Equipo Local* :</label>
                                                                    <div class="col-sm-8 col-md-8">
                                                                        <select class="custom-select col-12" name="equipo_local" id="equipo_local" required>
                                                                            <?php include('include/cargarEquipos.php'); ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Uno* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_uno_local" id="cuarto_uno_local" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Dos* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_dos_local" id="cuarto_dos_local" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Tres* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_tres_local" id="cuarto_tres_local" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Cuatro* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_cuatro_local" id="cuarto_cuatro_local" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Total :</label>
                                                                    <input type="text" class="form-control" id="total_local" value="0" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>

                                                    <h5>Equipo Visitante</h5>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-md-4 col-form-label">Equipo Visitante* :</label>
                                                                    <div class="col-sm-9 col-md-8">
                                                                        <select class="custom-select col-12" name="equipo_visitante" id="equipo_visitante" required>
                                                                            <?php include('include/cargarEquipos.php'); ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Uno* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_uno_visitante" id="cuarto_uno_visitante" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Dos* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_dos_visitante" id="cuarto_dos_visitante" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Tres* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_tres_visitante" id="cuarto_tres_visitante" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Cuarto Cuatro* :</label>
                                                                    <input type="number" class="form-control" name="cuarto_cuatro_visitante" id="cuarto_cuatro_visitante" min="0" value="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Total :</label>
                                                                    <input type="text" class="form-control" id="total_visitante" value="0" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <input type="hidden" name="table" id="table" value="partido">
                                                    <input type="hidden" name="idliga2" id="idliga2" value="<?php echo $_SESSION['idliga']; ?>">
                                                </form>
                                            </div>
                                        </div>

                                        <div id="dv_guardar_partido">
                                            <div class="col-sm-12">
                                                <div style="text-align: center;">
                                                    <input class="btn btn-primary btnguardar" form="partido_informationform" modal="partido-modal" type="button" value="Guardar" adicional="promedios_generales-include/cargarPromediosGenerales.php" id="guardar_partido">
                                                </div>
                                            </div>
                                        </div>

                                        <script src="vendors/scripts/libSteps.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="min-height-200px" id="promedios_generales">
                <?php include('include/cargarPromediosGenerales.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>