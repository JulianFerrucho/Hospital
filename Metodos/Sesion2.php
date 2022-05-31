<?php
	session_start();
	require("Conexion.php");

class Sesiones {
	
	public function NuevaSesion()
	{
		//Variables del Formulario
		$Nombre = $_POST['Identificacion'];
		$Clave = $_POST['Clave'];
		
		$query = "select * from administrador WHERE Id_Admin='$Nombre' AND Clav_Admin='$Clave'";
	

		//Consulta-------------------------------------------------------------------------------------------------------------

	
		$resultado = mysqli_query(Conexion::Conectar(),$query); //realiza Consultas
		$res = mysqli_num_rows($resultado); //cantidad de resultados encontrados

		
 
		if (!$res || $res == 0){ //Si no encuentra Un Usuario Con Estas Credenciales------------------------------------------------------------------

			echo"<script type='text/javascript'>
	 			alert('Credenciales Invalidas');
				window.location='SesionAdmin.php';
				</script>";

        } else { // Si encuentra Un Usuario Con Estas Credenciales------------------------------------------------------------------

            
         

				$reg=mysqli_fetch_array($resultado);
				
				$_SESSION['ID'] = $reg['Id_Admin'];

				
				header("Location:../Registro/RegistroPac.php");	

            }

        }

		

	}

?>
