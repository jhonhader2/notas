<?php

if (empty($_GET)) {
    header('Location: index.php?mensaje=nodata');
    exit();
} else {

    include_once("model/conexion.php");

    $id = $_GET['id'];

    $query   = "DELETE FROM personas WHERE id = ?";
    $prepare = $db->prepare($query);
    $result  = $prepare->execute([$id]);

    if($result){
        header('Location: index.php?mensaje=delete');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
}
