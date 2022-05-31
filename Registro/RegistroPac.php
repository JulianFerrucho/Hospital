<head>

    <meta http-equiv="context-type" content="text/html" charset="UTF-8">
    <link href="../Login/Principal.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" language="javascript" src="Registro.js"></script>
    <title> REGISTRAR PACIENTES </title>

</head>

<body onload="Limpiar();" class="Cuerpo" >

    <section class="Ventana">

        <p class="Texto"> REGISTRO</p>

        <form name="form" action="Registrado.php" method="POST">
            <article>

                <table border="0" class="Tabla">

                    <tr>
                        <td>Doc. Identificacion:</td>
                        <td> <input type="number" min="5000000" max="9999999999" name="Identificacion"> </td>
                    </tr>

                    <tr>
                        <td>Usuario:</td>
                        <td> <input type="text" name="Usuario" class="TextBox"> </td>
                    </tr>

                    <tr><input type="hidden" name="grabar" value="si">

                        <td>Contrase&ntilde;a:</td>
                        <td> <input type="password" name="Clave" class="TextBox"> </td>

                    </tr>

                    <tr>
                        <td>Pregunta de Seguridad:</td>
                        <td>
                            <select name="Pregunta">

                                <option value="1">Cual Es Su Comida Preferida?</option>
                                <option value="2">Cual era la marca de su primer Celular?</option>
                                <option value="3">Cual es su cancion preferida?</option>
                                <option value="4">Cual es el nombre de su mascota?</option>
                                <option value="5">Cual es el nombre del barrio donde Vive?</option>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Respuesta:</td>
                        <td> <input type="text" name="Respuesta" class="TextBox"> </td>
                    </tr>

                </table>

            </article>
        </form>

        <article class="Centrado">

            <input type='button' value="Limpiar" Title="Limpiar" onclick="Limpiar();">
			<input type='button' value="Registrar" Title="Registrar" onclick="Validar();">        

        </article>


    </section>

</body>

</html>