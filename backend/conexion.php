<?php
    $server='localhost';
    $user='root';
    $pass='';
    $db='almacendb';

    $conexion= new mysqli($server,$user,$pass,$db);
    
    if($conexion->connect_error){
        die("Error al conectarse: " . $conexion->connect_error);
    }
?>
