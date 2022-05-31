<?php
    require_once("../Metodos/Sesion.php");
    require("Llenar.php");
    
    if(!isset($_SESSION['User'])){

    echo "<script type='text/javascript'>
    alert('Debe Iniciar Sesion Para Visualizar Este Contenido');
    window.location='../Login/Principal.php';
    </script>";
    // Alerta para cifrar los scripts desde la carpeta.

}
?>

<html>

<head>

    <meta http-equiv="context-type" content="text/html" charset="UTF-8">
    <link href="Login.css" rel="stylesheet" type="text/css">

</head>

<body>
<section class="Cabecera">
        
        <img  class="Logo" src="../Img/Logo.png">

        <a href="../Login/Cerro.php">
        <button class="Session_Kill" title="Cerrar Sesión"> X </button>
        </a>
    </section>

    <h2 class="Titulo">Bienvenido de nuevo, Paciente <?php echo $_SESSION['User']?></h2>

    <article class="Citas">

        <?php
		
        $Ver_Citas=new Citas();//Invocación de metodo para llenar la tabla sobre la consulta hecha
        $Reg = $Ver_Citas->Ver_Citas();
?>
        <h2 class="Descripcion">Lista de Citas: </h2>
        
        <table class="Tabla" align="Center">
            <thead>
                <tr>
                    <th> Numero De registro de Cita </th>
                    <th> Medico Asignado </th>
                    <th> Tipo de Cita Medica </th>
                    <th> Hora </th>
                    <th> Fecha </th>
                    <th> Estado </th>
                </tr>
            </thead>
            
            <tbody>
            <?php
            for($i=0;$i<Count($Reg);$i++){
            ?>
                <tr>
                    <td>    <?php echo $Reg[$i]['Id_C']?>   </td>
                    <td>    <?php echo $Reg[$i]['Nom_Med']?> </td>
                    <td>    <?php echo $Reg[$i]['Esp']?>     </td>
                    <td>    <?php echo $Reg[$i]['Hora']?>    </td>
                    <td>    <?php echo $Reg[$i]['Fecha']?>   </td>
                    <td>    <?php echo $Reg[$i]['Estado']?>  </td>
                </tr>                
            <?php	
            }
            ?>	
            </tbody>
        </table>
    
    

        <form name="form" action="Estado.php" method="POST">
            <article>

                <table border="0" >
                    <tr>
                        <td>Nro Cita:</td>
                        <td> <input type="number" min="0" max="100" name="Nro" class="TextBox"> </td>
                    </tr>
                    <tr>
                        <td>Cambiar Estado</td>
                        <td>
                            <select name="Estado">

                                <option value="Aceptado">Aceptado</option>
                                <option value="Denegado">Denegado</option>

                            </select>
                        </td>
                    </tr>

                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'];?>">
                    
                </table>

                <input type='submit' value="Insertar" Title="Ingresar"> 

            </article>
        </form>
    
    </article>

        <?php
		
        $Ver_Historial = new Citas();
        $Reg=$Ver_Historial->Ver_Historial();
        
        
        echo "<br><br><br>";
        
        echo "<table border='1' align='center'>
            <tr></tr>
            <td> Numero De registro de Cita </td>
            <td> Medico Asignado </td>
            <td> Tipo de Cita Medica </td>
            <td> Observaciones </td>

        </tr>";
        
        for($i=0;$i<Count($Reg);$i++){
            
            echo"<tr>
                <td>".$Reg[$i]['Id_C']."</td>
                <td>".$Reg[$i]['Nom_Med']."</td>
                <td>".$Reg[$i]['Esp']."</td>
                <td>".$Reg[$i]['Obs_HC']."</td>";
    ?>											 
            </tr>	
<?php	
        }
?>	
        </table>;

    <article class="Mitad">
    
    </article>


</body>




</html>



