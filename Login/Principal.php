<?php

    include('../Metodos/Sesion.php');
    $Sesion = new Sesiones();

    if (isset($_POST['Clave'])){
        $Sesion->NuevaSesion();   
    }
    
?>

<html>

<head>

    <meta http-equiv="context-type" content="text/html" charset="UTF-8">
    <link href="Principal.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" language="javascript" src="Principal.js"></script>
    <title> LOGIN </title>

</head>

<body onload="Limpiar();" class="Cuerpo" >

    <section class="Ventana">

        <p class="Texto"> Ingresar al Sistema</p>

        <form name="form" action="Paso.php" method="POST">
            <article>

                <table border="0" class="Tabla">

                    <tr>
                        <td>Identificacion:</td>
                        <td> <input type="text" min="5000000" max="9999999999" name="Identificacion" class="TextBox"> </td>
                    </tr>

                    <tr><input type="hidden" name="grabar" value="si">

                        <td>Contrase&ntilde;a:</td>
                        <td> <input type="password" name="Clave" class="TextBox"> </td>

                    </tr>

                    <tr>
                        <td>Tipo Usuario</td>
                        <td>
                            <select name="Tipo">

                                <option value="P">Paciente</option>
                                <option value="M">Medico</option>

                            </select>
                        </td>
                    </tr>

                </table>

            </article>
        </form>

        <article class="Centrado">

            <input type='button' value="Limpiar" Title="Limpiar" onclick="Limpiar();">
			<input type='button' value="Insertar" Title="Ingresar" onclick="Validar();">        

        </article>

        <br>

        <article class="CentradoSE"> 
            <p>No estas Registrado, Paciente? </p> 
            <input type="Button" value="Registrar" onclick="Registrar()">
        </article>

        <article class="CentradoSE"> 
            <p>Olvidaste La Contrase&ntilde;a? </p> 
            <input type="Button" value="Cambiar Contraseña" onclick="CambCont()">
        </article>
		
		 <article class="CentradoSE"> 
           
            <input type="Button" value="Administrar Sistema" onclick="Admin()">
        </article>


    </section>

    <!-- <script> 
    var getScript=function(src){ 
        for(var i=0,scs; scs=document.getElementsByTagName('script')[i];i++){ 
            if(scs.src.indexOf(src)>-1) 
                return true; 
            return false; 
        } 
    } 
    //test: 
    onload=function(){ 
        alert('algo.js está cargado:'+getScript('Principal.js')); 
    } 
    </script>  -->

</body>

</html>