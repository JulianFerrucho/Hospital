<?php
class Conexion
{
	public static function Conectar()
	{
		$conexion = mysqli_connect('localhost','root','');
		mysqli_query($conexion, "SET NAMES 'utf8'");
		mysqli_select_db($conexion, "hospital");
		return $conexion;
	}
}
?>
