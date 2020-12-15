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

function promediosGenerales($idliga){
    $result = selectSql("SUM(cuarto_uno_local) c1l, SUM(cuarto_dos_local) c2l, SUM(cuarto_tres_local) c3l, SUM(cuarto_cuatro_local) c4l, SUM(cuarto_uno_visitante) c1v, SUM(cuarto_dos_visitante) c2v, SUM(cuarto_tres_visitante) c3v, SUM(cuarto_cuatro_visitante) c4v","partido, equipo", "equipo_local = idequipo AND liga_idliga = " . $idliga);
    $total = selectSql("count(*) as cant_partidos","partido, equipo", "equipo_local = idequipo AND liga_idliga = " . $idliga);
    $promedios = array();
    $promedios['local']['c1'] = $result['data'][0]['c1l'] / $total['data'][0]['cant_partidos'];
    $promedios['local']['c2'] = $result['data'][0]['c2l'] / $total['data'][0]['cant_partidos'];
    $promedios['local']['c3'] = $result['data'][0]['c3l'] / $total['data'][0]['cant_partidos'];
    $promedios['local']['c4'] = $result['data'][0]['c4l'] / $total['data'][0]['cant_partidos'];
    $promedios['local']['total'] = ($result['data'][0]['c4l'] + $result['data'][0]['c3l'] + $result['data'][0]['c2l'] + $result['data'][0]['c1l']) / $total['data'][0]['cant_partidos'];
    $promedios['visitante']['c1'] = $result['data'][0]['c1v'] / $total['data'][0]['cant_partidos'];
    $promedios['visitante']['c2'] = $result['data'][0]['c2v'] / $total['data'][0]['cant_partidos'];
    $promedios['visitante']['c3'] = $result['data'][0]['c3v'] / $total['data'][0]['cant_partidos'];
    $promedios['visitante']['c4'] = $result['data'][0]['c4v'] / $total['data'][0]['cant_partidos'];
    $promedios['visitante']['total'] = ($result['data'][0]['c4v'] + $result['data'][0]['c3v'] + $result['data'][0]['c2v'] + $result['data'][0]['c1v']) / $total['data'][0]['cant_partidos'];

    //Suma de promedios
    $promedios['suma']['c1'] = $promedios['local']['c1'] + $promedios['visitante']['c1'];
    $promedios['suma']['c2'] = $promedios['local']['c2'] + $promedios['visitante']['c2'];
    $promedios['suma']['c3'] = $promedios['local']['c3'] + $promedios['visitante']['c3'];
    $promedios['suma']['c4'] = $promedios['local']['c4'] + $promedios['visitante']['c4'];
    $promedios['suma']['total'] = $promedios['local']['total'] + $promedios['visitante']['total'];

    return $promedios;
}

function calcularPorcentaje($valor, $total){
    $porcentaje = $valor * 100;
    $porcentaje = $porcentaje / $total;
    return $porcentaje;
}
?>