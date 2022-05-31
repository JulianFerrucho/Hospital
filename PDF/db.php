<?php
// Configuración necesaria para acceder a la data base.
$hostname = "localhost";
$usuariodb = "root";
$passworddb = "";
$dbname = "hospital";
	
// Generando la conexión con el servidor
$Conectar = mysqli_connect($hostname, $usuariodb, $passworddb,$dbname);

?>