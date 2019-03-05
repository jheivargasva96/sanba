<?
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/sanba/db/conexion.php';

$result = selectSql("idequipo,nombre","equipo","liga_idliga = " . $_SESSION['idliga']);

echo '<option value="">Seleccione...</option>';

for ($i=0; $i < $result['rows'] ; $i++) { 
    echo '<option value="' . $result['data'][$i]['idequipo'] . '">' . $result['data'][$i]['nombre'] . '</option>';
}
