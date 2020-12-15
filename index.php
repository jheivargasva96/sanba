<!DOCTYPE html>
<html>

<head>
    <?php include('include/head.php'); ?>
    <?php include('include/script.php'); ?>
    <link rel="stylesheet" type="text/css" href="vendors/styles/sanba.css" media="screen">
</head>

<body>
    <?php include('include/preloader.php'); ?>
    <div class="main-container">
        <?php include('alerts.php'); ?>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                <a href="#" class="btn-block" data-backdrop="static" data-toggle="modal" data-target="#liga-modal"
                    type="button">
                    <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                        <div class="project-info clearfix">
                            <div class="project-info-left">
                                <div class="icon box-shadow bg-blue text-white">
                                    <i class="icon-copy ion-plus"></i>
                                </div>
                            </div>
                            <div class="project-info-right">
                                <span class="no text-blue weight-800 font-24">Ingresar Liga</span>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="modal fade" id="liga-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <img src="vendors/images/ligas.jpg" alt="login" class="login-img">
                                <h2 class="text-center mb-30">Adicionar Liga</h2>
                                <form id="informationform">
                                    <div class="input-group custom input-group-lg">
                                        <input type="text" class="form-control" placeholder="Nombre Liga*" name="nombre" id="nombre" required>
                                        <input type="hidden" name="table" id="table" value="liga">
                                        <div class="input-group-append custom">
                                            <span class="input-group-text">
                                                <i class="icon-copy fa fa-gamepad" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input class="btn btn-primary btn-lg btn-block btnguardar" type="button" value="Guardar" form="informationform" adicional="lista_ligas-include/cargarLigas.php" modal="liga-modal">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="lista_ligas">
            <?php include('include/cargarLigas.php'); ?>
        </div>
    </div>
</body>

</html>