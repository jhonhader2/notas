<?php

if (empty($_POST)) {
    header('Location: index.php?mensaje=nodata');
    exit();
} else {

    include_once("model/conexion.php");

    $nombre = $_POST['nombre'];
    $edad   = $_POST['edad'];
    $signo  = $_POST['signo'];

    $query   = "INSERT INTO personas(nombre, edad, signo) VALUES(?,?,?)";
    $prepare = $db->prepare($query);
    $result  = $prepare->execute([$nombre, $edad, $signo]);

    if ($result) {
        header('Location: index.php?mensaje=success');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
}
