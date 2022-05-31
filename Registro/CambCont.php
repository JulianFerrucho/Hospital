<head>

    <meta http-equiv="context-type" content="text/html" charset="UTF-8">
    <link href="../Login/Principal.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" language="javascript" src="CambCont.js"></script>
    <title> CAMBIAR CONTRASEÑA PACIENTES </title>

</head>

<body onload="Limpiar();" class="Cuerpo" >

    <section class="Ventana">

        <p class="Texto"> Cambiar Contraseña</p>

        <form name="form" action="Cambio.php" method="POST">
            <article>

                <table border="0" class="Tabla">

                    <tr>
                        <td>Doc. Identificacion:</td>
                        <td> <input type="number" min="5000000" max="9999999999" name="Identificacion"> </td>
                    </tr>

                    <tr><input type="hidden" name="grabar" value="si">

                        <td>Nueva Contrase&ntilde;a:</td>
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
			<input type='button' value="Aceptar" Title="Aceptar" onclick="Validar();">        

        </article>


    </section>

</body>

</html>