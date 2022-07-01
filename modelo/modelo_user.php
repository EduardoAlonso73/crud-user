<?php

include_once 'connection.php';


$objeto = new Conexion();
$conexion = $objeto->Conectar();



$option = (isset($_POST['option'])) ? $_POST['option'] : '';


switch ($option) {
    case 1:
        echo "option 1";
        break;
    case 2:
        $id = (isset($_POST['key_user'])) ? $_POST['key_user'] : '';
        $consulta = "DELETE FROM users WHERE Id =  $id ";
        $resultado = $conexion->query($consulta);
        echo "Eliminacion correcta";

        break;
    case 3:
        echo "option 3";
        break;
    case 4:
        $consulta = "SELECT * FROM users ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        break;
    default:
        echo "Error";
        break;
}
