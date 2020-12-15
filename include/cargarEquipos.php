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

$result = selectSql("idequipo,nombre","equipo","liga_idliga = " . $_SESSION['idliga']);

echo '<option value="">Seleccione...</option>';

for ($i=0; $i < $result['rows'] ; $i++) { 
    echo '<option value="' . $result['data'][$i]['idequipo'] . '">' . $result['data'][$i]['nombre'] . '</option>';
}
?>