<?php
$max_salida=6; 
$inicial=$ruta="";
while($max_salida>0){
  if(is_file($ruta."define.php")){
    $inicial=$ruta;
  }
  $ruta.="../";
  $max_salida--;
}

include_once $inicial . 'db/conexion.php';

$result = selectSql("idliga,nombre","liga");

echo '<div class="row clearfix">';

for ($i=0; $i < $result['rows'] ; $i++) { 
    echo '
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <form action="principal.php" method="post" id="form_liga' . $i . '">
            <input type="hidden" name="idliga" value="' . $result['data'][$i]['idliga'] . '">
            <a class="btn-block submit_liga" form="' . $i . '" data-backdrop="static" type="button">
                <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                    <div class="project-info clearfix">
                        <div class="project-info-left">
                            <div class="icon box-shadow bg-blue text-white">
                                <i class="icon-copy ion-ios-basketball-outline"></i>
                            </div>
                        </div>
                        <div class="project-info-right">
                            <span class="no text-blue weight-800 font-24">' . $result['data'][$i]['nombre'] . '</span>
                        </div>
                    </div>
                </div>
            </a>
        </form>
    </div>
    ';
}

echo '</div>';
?>