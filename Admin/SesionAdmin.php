<?php

    include('../Metodos/Sesion2.php');
    $Sesion = new Sesiones();

    if (isset($_POST['Clave'])){
        $Sesion->NuevaSesion();   
    }
    
?>

<html>

<head>

    <meta http-equiv="context-type" content="text/html" charset="UTF-8">
    <link href="EstilosA.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" language="javascript" src="Principal.js"></script>
    <title> LOGIN </title>

</head>

<body onload="Limpiar();" class="Cuerpo" >

    <section class="Ventana">

        <p class="Texto"> Administrar Sistema</p>

        <form name="form" action="Paso.php" method="POST">
		 <br> <br> 
            <article>

                <table border="0" class="Tabla">

                    <tr>
                        <td>Identificacion:</td>
                        <td> <input type="TextBox" min="5000000" max="9999999999" name="Identificacion" class="TextBox"> </td>
                    </tr>

                    <tr><input type="hidden" name="grabar" value="si">

                        <td>Contrase&ntilde;a:</td>
                        <td> <input type="password" name="Clave" class="TextBox"> </td>

                    </tr>


                </table>

            </article>
        </form>
 <br> <br> <br>
        <article class="Centrado">

            	<input type='button' value="Iniciar Sesion" Title="Iniciar Sesion" style='width:250px; height:50px' onclick="Validar();"> 
				<input type='button' value="Limpiar Campos" Title="Limpiar Campos" style='width:250px; height:50px' onclick="Limpiar();">	
			


			    

        </article>
		 <br>
		  <br>
		
		<article class="Centrado">
		<input type="Button" value="Volver" onclick="Volver()">
		
		
           

		
        </article>

        <br>



    </section>