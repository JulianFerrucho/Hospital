<?php	

	include_once('db.php');
	
	$mihtml = '<table border=1';	
	$mihtml .= '<thead>';
	$mihtml .= '<tr>';
	$mihtml .= '<th>Numero de cita</th>';
	$mihtml .= '<th>Nombre del paciente</th>';
	$mihtml .= '<th>Observaciones</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';
	
	$resultado_transacciones = "SELECT Cita_Medica.Id_C, Paciente.Nom_Pac, Historial_Clinico.Obs_HC from Historial_Clinico
								Inner Join Cita_Medica on Cita_Medica.Id_C = Historial_Clinico.Id_C
								Inner Join Med_Esp on Med_Esp.Id_Rel = Cita_Medica.Id_Rel
								Inner Join Paciente on Paciente.Id_Pac = Cita_Medica.Id_Pac
								Where Id_Med = 1";
	
	$resultado_transacciones = mysqli_query($Conectar, $resultado_transacciones);
	while($transacciones = mysqli_fetch_assoc($resultado_transacciones)){
		$mihtml .= '<tr><td>'.$transacciones['Id_C'] . "</td>";
		$mihtml .= '<td>'.$transacciones['Nom_Pac'] . "</td>";
		$mihtml .= '<td>'.$transacciones['Obs_HC'] . "</td></tr>";		
	}
	
	$mihtml .= '</tbody>';
	$mihtml .= '</table';

	
	//referencia
	use Dompdf\Dompdf;

	// incluye autoloader
	require_once("dompdf/autoload.inc.php");

	//Creando instancia para generar PDF
	$dompdf = new DOMPDF();
	
	// Cargar el HTML
	$dompdf->load_html('<h1 style="text-align: center;">Historial Clinico</h1>'. $mihtml .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Historial_Clinico", 
		array(
			"Attachment" => False //Para realizar la descarga
		)
	);
?>