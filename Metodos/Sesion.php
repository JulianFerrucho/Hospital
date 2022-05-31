<?php
	session_start();
	require("Conexion.php");

class Sesiones {
	
	public function NuevaSesion()
	{
		//Variables del Formulario
		$Nombre = $_POST['Identificacion'];
		$Clave = $_POST['Clave'];
		$Tipo = $_POST['Tipo'];

		//Consulta-------------------------------------------------------------------------------------------------------------

		if($Tipo == "M"){ //Si Es Medico

			$query = "SELECT * FROM medico WHERE Id_Med='".strip_tags($Nombre)."' AND Clav_Med='".strip_tags($Clave)."';";

		} else { //si es Paciente

			$query = "SELECT * from paciente WHERE Id_Pac='$Nombre' AND Clav_Pac='$Clave'";

		}

		$resultado = mysqli_query(Conexion::Conectar(),$query); //realiza Consultas
		$res = mysqli_num_rows($resultado); //cantidad de resultados encontrados

		
 
		if (!$res || $res == 0){ //Si no encuentra Un Usuario Con Estas Credenciales------------------------------------------------------------------

			echo"<script type='text/javascript'>
	 			alert('No Se Encontro El Usuario Especificado');
				window.location='Principal.php';
				</script>";

        } else { // Si encuentra Un Usuario Con Estas Credenciales------------------------------------------------------------------

            
            if($Tipo == "M"){
	
				$reg=mysqli_fetch_array($resultado);
				$_SESSION['User'] = $reg['Nom_Med'];
				$_SESSION['ID'] = $reg['Id_Med'];

				header("Location:../LoginMedicos/Login.php");			

            } else {

				$reg=mysqli_fetch_array($resultado);
				$_SESSION['User'] = $reg['Nom_Pac'];
				$_SESSION['ID'] = $reg['Id_Pac'];

				
				header("Location:../LoginPacientes/Login.php");	

            }

        }

		

	}
}
?>
