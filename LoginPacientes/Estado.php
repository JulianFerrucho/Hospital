<?php

include_once('../Metodos/Conexion.php');

    function CambiarCita($A,$B,$C){  
	
        $sql="UPDATE cita_medica SET Estado= '$B' WHERE Id_C=$A and Id_Pac=$C";
        
        $Res=mysqli_query(Conexion::Conectar(),$sql);

        if ($Res=='1'){
            echo"<script type='text/javascript'>
	        alert('El Estado Fue Cambiado' + '$Res' );
            window.location='Login.php';
	        </script>";
        }
        
    }

    CambiarCita($_REQUEST['Nro'],$_REQUEST['Estado'],$_REQUEST['ID']);





?>