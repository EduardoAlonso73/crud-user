<?php

include_once 'connection.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$user = (isset($_POST['nm_user'])) ? $_POST['nm_user'] : '';
$email = (isset($_POST['nm_email'])) ? $_POST['nm_email'] : '';
$passwo = (isset($_POST['nm_passwor'])) ? $_POST['nm_passwor'] : '';

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
        echo "Eliminacion correcta :) ";
        break;
    case 3:
        $id = (isset($_POST['key_user'])) ? $_POST['key_user'] : '';
        $consulta = "UPDATE users SET username='$user', passw='$passwo', email='$email' WHERE id='$id' ";
        $resultado = $conexion->query($consulta);
        echo "Se Edito correctamente";
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
