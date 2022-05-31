<?php
session_start();
session_destroy();
echo"<script type='text/javascript'>
	 alert('La sesión fue cerrada correctamente');
	window.location='Principal.php';
	</script>";
?>