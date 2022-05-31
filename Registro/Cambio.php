<?php

	include('../Metodos/Conexion.php');
    
    function Cambiar_Contraseña($A,$B,$C){

        if($C=="P"){

            $sql="Select Seguridad.Pregunta, Paciente.Respuesta from Paciente Inner Join Seguridad on Paciente.Id_Preg = Seguridad.Id_Preg Where Id_Pac=$A " ;
        } else{

            $sql="Select Seguridad.Pregunta, medico.Respuesta from medico Inner Join Seguridad on medico.Id_Preg = Seguridad.Id_Preg Where Id_Med=$A " ;  
        }

        $Res=mysqli_query(Conexion::Conectar(),$sql);
        $resu = mysqli_num_rows($Res);

        if (!$resu || $resu == 0){ //Si no encuentra Un Usuario Con Estas Credenciales------------------------------------------------------------------

			echo"<script type='text/javascript'>
	 			alert('No Se Encontro El Usuario Especificado');
				window.location='../Login/Principal.php';
				</script>";

        } else {

            $Reg;

            while($row=mysqli_fetch_assoc($Res)){ //Traer datos
        
                $Reg[]=$row;

            }

            $Pregunta = $Reg[0]['Pregunta'];
            $Respuesta= $Reg[0]['Respuesta'];
            
        
            echo "<script type='text/javascript'> var answer = prompt('".$Pregunta."'); 
            var Res='$Respuesta';

            if(answer != Res){

                alert('Las Respuestas No Coinciden');
				window.location='../Login/Principal.php';

            } else {
            }
            
            </script>";
       
            if($C=="P"){

                $sql="UPDATE `paciente` SET `Clav_Pac`='$B' WHERE `Id_Pac`=$A";
        
            } else{

                $sql="UPDATE `medico` SET `Clav_Med`='$B' WHERE `Id_Med`=$A";   
            }
            
            $Res=mysqli_query(Conexion::Conectar(),$sql);
    
            if (!$Res || $Res == 0){ //Si no encuentra Un Usuario Con Estas Credenciales------------------------------------------------------------------

                echo"<script type='text/javascript'>
	 			alert('Respuesta Incorrecta');
				window.location='../Login/Principal.php';
				</script>";


            } else {

            echo "<script type='text/javascript'>
                alert('La Contraseña de ($Res) $A Se Cambio Correctamente');
                window.location='../Login/Principal.php';
                </script>";
            
            }
        }
    }

    Cambiar_Contraseña($_REQUEST['Identificacion'],$_REQUEST['Clave'],$_REQUEST['Tipo']);

?>