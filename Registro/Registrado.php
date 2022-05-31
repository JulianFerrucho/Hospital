<?php

	include('../Metodos/Conexion.php');
    
    function Insertar_Cur($A,$B,$C,$D,$E){
		
		
		$sql="INSERT INTO paciente VALUES ($A,'$B','$C','$D','$E')";
		
		$Res=mysqli_query(Conexion::Conectar(),$sql);

		
	
		echo "<script type='text/javascript'>
			alert('El Paciente $Res $B Se Inserto Correctamente');
			window.location='../Login/Principal.php';
			</script>";
		
	}

    Insertar_Cur($_REQUEST['Identificacion'],$_REQUEST['Usuario'],$_REQUEST['Clave'], $_REQUEST['Pregunta'],$_REQUEST['Respuesta']);

?>
    