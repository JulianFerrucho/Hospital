<?php


include_once('../Metodos/Conexion.php');


class Citas{
    
    private $Citas;
    private $Historial;

    public function Ver_Citas(){    //Consultas para mostrar con la variable Sesion.
	
        $sql="SELECT Cita_Medica.Id_C, Medico.Nom_Med, Especialidad.Esp, Cita_Medica.Hora, Cita_Medica.Fecha, Cita_Medica.Estado from Cita_Medica Inner Join Med_Esp on Med_Esp.Id_Rel=Cita_Medica.Id_Rel Inner Join Medico on Medico.Id_Med = Med_Esp.Id_Med Inner Join Especialidad on Especialidad.Id_Esp = Med_Esp.Id_Esp where Cita_Medica.Id_Pac= ". $_SESSION['ID']."";
        
         $Res=mysqli_query(Conexion::Conectar(),$sql);
    
        // 

        while($row=mysqli_fetch_assoc($Res)){ //Traer datos
        
         $this->Citas[]=$row;
        
        }

        return $this->Citas;
    
    }

    public function Ver_Historial(){
	
        $sql="SELECT Cita_Medica.Id_C, Medico.Nom_Med, Especialidad.Esp, Historial_Clinico.Obs_HC from Historial_Clinico Inner Join Cita_Medica on Cita_Medica.Id_C = Historial_Clinico.Id_C Inner Join Med_Esp on Med_Esp.Id_Rel = Cita_Medica.Id_Rel Inner Join Medico on Medico.Id_Med = Med_Esp.Id_Med Inner Join Especialidad on Especialidad.Id_Esp = Med_Esp.Id_Esp Where Cita_Medica.Id_Pac =". $_SESSION['ID']."";
        
        $Res=mysqli_query(Conexion::Conectar(),$sql);
    
        //

        while($row=mysqli_fetch_assoc($Res)){ //Traer datos
        
        $this->Historial[]=$row;
        
        }
    
    return $this->Historial;
    
    }

}



?>