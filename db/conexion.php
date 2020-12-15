<?php
ini_set('display_errors', false);
global $connect;
dbConectar();

function dbConectar(){
    global $connect;
    try{
        // Conexión a la base de datos
        $connect = new PDO('mysql:host=localhost;dbname=sanbadev_s4nb2020', 'sanbadev_juanda', '0$EWFgYDG][G');
        $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
}

function selectSql($campos = '', $tabla = '', $where = ''){
    global $connect;
    $result = array('success'=> 0, 'message' => 'Peticion no procesada', 'data' => array(),'rows' => 0);
    if ($where != '') {
        $where = ' WHERE ' . $where;
    }
    $sql = $connect->prepare("SELECT " . $campos . " FROM " . $tabla . $where);
    try {
        $connect->beginTransaction();
        $sql->execute();
        $connect->commit();
        $result['success'] = 1;
        $result['message'] = 'Consulta ejecutada correctamente.';
        for($i=0; $row = $sql->fetch(); $i++){
            $result['data'][] = $row;
        }
        $result['rows'] = $i;
    }catch (Exception $e){
        $connect->rollback();
        throw $e;
        $result['success'] = 0;
        $result['message'] = $e->getMessage();
    }
    return $result;
}

function insertSql($table = '', $data = array()){
    global $connect;
    $result = array('success'=> 0, 'message' => 'Peticion no procesada');
    $sql = $connect->prepare("INSERT INTO " . $table . " (" . implode(',',array_keys($data)) . ") VALUES (:" . implode(', :',array_keys($data)) . ")");
    try {
        $connect->beginTransaction();
        $sql->execute($data);
        $connect->commit();
        $result['success'] = 1;
        $result['message'] = 'Resgistro guardado correctamente';
    }catch (Exception $e){
        $connect->rollback();
        throw $e;
        $result['success'] = 0;
        $result['message'] = $e->getMessage();
    }
    return $result;
}

?>