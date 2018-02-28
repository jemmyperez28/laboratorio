<?php
## CONFIGURE LA CONEXION DE EL SERVIDOR , USER , PASS Y BASE DE DATOS
## A CONECTAR.
$con = @mysqli_connect('localhost', 'multilab28888', 'multilab28888', 'laboratoriousil');
mysqli_query("SET NAMES 'utf8'");

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
##echo 'Ud esta conectado a la base de DATOS';
?>