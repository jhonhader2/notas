<?php

$hostname   = "localhost";
$user       = "root";
$password   = null;
$database   = "sena";

try {
    $db = new PDO("mysql:host={$hostname};dbname={$database}", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (Exception $e) {
    print 'Problemas con la conexion: ' . $e->getMessage();
}
