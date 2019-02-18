<?php

global $connect;
dbConectar();

function dbConectar(){
    global $connect;
    try{
        // Conexión a la base de datos
        $connect = new PDO('mysql:host=localhost;dbname=sanba', 'root', '');
        $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
    }
}

function selectSql($campos = '', $tabla = '', $data = array()){
    global $connect;
    $result = array('success'=> 0, 'message' => 'Peticion no procesada', 'data' => array());
    $where = array();
    foreach ($data as $key => $value) {
        $where[] = key . ':' . $key;
    }
    $sql = $connect->prepare("SELECT " . $campos . " FROM " . $tabla . " WHERE " . implode(', :',array_keys($data)) . ")");
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