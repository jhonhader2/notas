<?php

if (empty($_POST)) {
    header('Location: index.php?mensaje=nodata');
    exit();
} else {

    include_once("model/conexion.php");

    $id     = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad   = $_POST['edad'];
    $signo  = $_POST['signo'];

    $query   = "UPDATE personas SET nombre=?, edad=?, signo=? WHERE id=?";
    $prepare = $db->prepare($query);
    $result  = $prepare->execute([$nombre, $edad, $signo, $id]);

    if ($result) {
        header('Location: index.php?mensaje=success');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
}
