<? 
require 'conexion.php';

$table = $_REQUEST['table'];
unset($_REQUEST['table']);

$result = insertSql($table, $_REQUEST);

echo json_encode($result);