<?php

include_once 'connection.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$user = (isset($_POST['nmAdd_user'])) ? $_POST['nmAdd_user'] : '';
$email = (isset($_POST['nmAdd_email'])) ? $_POST['nmAdd_email'] : '';
$passwo = (isset($_POST['nmAdd_passwor'])) ? $_POST['nmAdd_passwor'] : '';

switch ($option) {
    case 1:
        $consulta = "INSERT INTO users (username, passw, email) VALUES ('$user', '$passwo', '$email')";
        $resultado = $conexion->query($consulta);
        echo "Datos insertada correctamente ";
        break;
    case 2:
        $id = (isset($_POST['key_user'])) ? $_POST['key_user'] : '';
        $consulta = "DELETE FROM users WHERE id =  $id ";
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
