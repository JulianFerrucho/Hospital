<?php
    require_once("../Metodos/Sesion.php");
    require("Llenar.php");
    
    if(!isset($_SESSION['User'])){

    echo "<script type='text/javascript'>
    alert('Debe Iniciar Sesion Para Visualizar Este Contenido');
    window.location='../Login/Principal.php';
    </script>";

}else{

?>

<html>

<head></head>

<body>
    <h2>Bienvenido de nuevo, Dr. <?php echo $_SESSION['User']?></h2>
    <a href="../Login/Cerro.php">Cerrar sesi&oacute;n</a>

    <article class="Mitad">

        <?php
		
        $Ver_Citas = new Citas();
        $Reg = $Ver_Citas->Ver_Citas();
        
        
        echo "<br><br><br>";
        
        echo "<table border='1' align='center'>
        <tr></tr>
            <td> Numero De registro de Cita </td>
            <td> Paciente </td>
            <td> Hora </td>
            <td> Fecha </td>
            <td> Estado </td>
        </tr>";
        
        for($i=0;$i<Count($Reg);$i++){
            
            echo"<tr>
                <td>".$Reg[$i]['Id_C']."</td>
                <td>".$Reg[$i]['Nom_Pac']."</td>
                <td>".$Reg[$i]['Hora']."</td>
                <td>".$Reg[$i]['Fecha']."</td>
                <td>".$Reg[$i]['Estado']."</td>
                <td>";
    ?>					
                <a href="javascript:void(0);" onClick='eliminar("DB/DeleteCur.php?n=<?php echo $Reg[$i]['Id_C']; ?>")'> <img src='img/basura.svg' height='50px' width='50px' style='cursor:pointer;'>							
                             
                </td>
            </tr>	
<?php	
        }
?>	
        </table>;
    
    </article>

        <?php
		
        $Ver_Historial = new Citas();
        $Reg=$Ver_Historial->Ver_Historial();
        
        
        echo "<br><br><br>";
        
        echo "<table border='1' align='center'>
            <tr></tr>
            <td> Numero de registro de Cita </td>
            <td> Nombre del Paciente </td>
            <td> Observaciones </td>

        </tr>";
        
        for($i=0;$i<Count($Reg);$i++){
            
            echo"<tr>
                <td>".$Reg[$i]['Id_C']."</td>
                <td>".$Reg[$i]['Nom_Pac']."</td>
                <td>".$Reg[$i]['Obs_HC']."</td>
                <td>";
    ?>												
                             
                </td>
            </tr>	
<?php	
        }
?>	
        </table>;

    <article class="Mitad">
    
    </article>


</body>




</html>

<?php
}
?>

