CREATE Database Hospital Character set Utf8 Collate utf8_general_ci;


Use Hospital;


Create table Administrador(
Id_Admin int (11) not null,
Clav_Admin varchar (32) not null,
Primary key(Id_Admin)
);

Create Table Seguridad(
Id_Preg int (1) not null Auto_Increment,
Pregunta text Not null,
Primary Key (Id_Preg)
);


Create table Medico (
Id_Med int (11) not null,
Nom_Med varchar (30) not null,
Clav_Med varchar (32) not null,
Id_Preg int(1)not null,
Respuesta text not null,
Primary key (Id_Med),
Foreign Key (Id_Preg) References Seguridad(Id_Preg)
);

Create table Especialidad (
Id_Esp int(11) not null Auto_Increment,
Esp text not null,
Primary key (Id_Esp)
);

Create table Med_Esp(
Id_Rel int (11) not null Auto_Increment,
Id_Med int (11) not null,
Id_Esp int (11) not null,
Primary key (Id_Rel),
Foreign key (Id_Med) References Medico(Id_Med),
Foreign key (Id_Esp) References Especialidad(Id_Esp)
);


Create table Paciente(
Id_Pac int (11) not null,
Nom_Pac varchar(30) not null,
Clav_Pac Varchar(32) not null,
Id_Preg int (1) not null,
Respuesta text not null,
Primary key(Id_Pac),
Foreign key (Id_Preg) References Seguridad(Id_Preg)
);


Create Table Cita_Medica(
Id_C int (11) not null Auto_Increment,
Id_Pac int (11) not null,
Id_Rel int (11) not null,
Hora Time Not Null,
Fecha Date Not Null,
Estado Enum ('Aceptado','En Espera', 'Denegado'),
Primary Key (Id_C),
Foreign key (Id_Pac) References Paciente(Id_Pac),
Foreign key (Id_Rel) References Med_Esp(Id_Rel)
);


Create Table Historial_Clinico(
Id_HC int (11) not null Auto_Increment,
Id_C int (11) not null,
Obs_HC Text not null,
Primary Key (Id_HC),
Foreign key (Id_C) References Cita_Medica(Id_C) 
);


Describe Seguridad;
Describe Paciente;
Describe Medico;
Describe Especialidad;
Describe Med_Esp;
Describe Cita_Medica;
Describe Historial_Clinico;


Insert Into Administrador Values (1,(1234));
Insert Into Administrador Values (2,(123));
Insert Into Administrador Values (3,(234));
Insert Into Seguridad Values (null,'¿Cuál Es Su Comida Favorita?');
Insert Into Seguridad Values (null,'¿Cuál Era la marca de su primer celular?');
Insert Into Seguridad Values (null,'¿Cuál Es Su Canción Preferida?');
Insert Into Seguridad Values (null,'¿Cuál Es el nombre de su mascota?');
Insert Into Seguridad Values (null,'¿Cuál Es el nombre del barrio donde vive?');
Insert Into Medico Values (1,'Manuel',('abc'),1,'');
Insert Into Medico Values (2,'Manuela',('abcd'),2,'');
Insert Into Medico Values (3,'Daniel',('bcd'),3,'');
Insert Into Especialidad Values (null,'Cardiologia');
Insert Into Especialidad Values (null,'Medico General');
Insert Into Especialidad Values (null,'Optometria');
Insert Into Especialidad Values (null,'Ginecologia');
Insert Into Especialidad Values (null,'Infectologia');
Insert Into Med_Esp values (null,1,1);
Insert Into Med_Esp values (null,1,2);
Insert Into Med_Esp values (null,1,3);
Insert Into Med_Esp values (null,2,1);
Insert Into Med_Esp values (null,2,2);
Insert Into Med_Esp values (null,2,3);
Insert Into Med_Esp values (null,3,1);
Insert Into Med_Esp values (null,3,2);
Insert Into Med_Esp values (null,3,3);
Insert Into Paciente values (1,'Julio',('A1'),4,'');
Insert Into Paciente values (2,'Julia',('B1'),5,'');
Insert Into Paciente values (3,'Oscar',('C1'),1,'');
Insert Into Cita_Medica Values (null,1,1,'18:00:00','2018/10/30','En Espera');
Insert Into Cita_Medica Values (null,1,2,'19:00:00','2018/10/30','En Espera');
Insert Into Cita_Medica Values (null,2,3,'12:00:00','2018/10/31','En Espera');
Insert Into Cita_Medica Values (null,2,4,'13:00:00','2018/10/31','En Espera');
Insert Into Cita_Medica Values (null,3,5,'14:00:00','2018/10/31','En Espera');
Insert Into Cita_Medica Values (null,3,6,'15:00:00','2018/11/01','En Espera');
Insert Into Cita_Medica Values (null,1,7,'08:00:00','2018/11/02','En Espera');
Insert Into Cita_Medica Values (null,2,8,'07:00:00','2018/11/02','En Espera');
Insert Into Cita_Medica Values (null,3,9,'09:00:00','2018/11/03','En Espera');
Insert Into Historial_Clinico Values (null,1,'XX');
Insert Into Historial_Clinico Values (null,2,'XX');
Insert Into Historial_Clinico Values (null,3,'XX');
Insert Into Historial_Clinico Values (null,4,'XX');
Insert Into Historial_Clinico Values (null,5,'XX');
Insert Into Historial_Clinico Values (null,6,'XX');
Insert Into Historial_Clinico Values (null,7,'XX');
Insert Into Historial_Clinico Values (null,8,'XX');
Insert Into Historial_Clinico Values (null,9,'XX');

Select * from Seguridad;
Select * from Medico;
Select * from Paciente;
Select * from Med_Esp;
Select * from Cita_Medica;
Select * from Historial_Clinico;

Select Cita_Medica.Id_C, Medico.Nom_Med, Especialidad.Esp, Date_Format(Cita_Medica.Hora,'%h:%i  %p'), Date_Format(Cita_Medica.Fecha, '%W %d de %M de %Y'), Cita_Medica.Estado from Cita_Medica
Inner Join Med_Esp on Med_Esp.Id_Rel=Cita_Medica.Id_Rel
Inner Join Medico on Medico.Id_Med = Med_Esp.Id_Med
Inner Join Especialidad on Especialidad.Id_Esp = Med_Esp.Id_Esp  
where Id_Pac = 1;

Select Cita_Medica.Id_C, Medico.Nom_Med, Especialidad.Esp, Historial_Clinico.Obs_HC from Historial_Clinico
Inner Join Cita_Medica on Cita_Medica.Id_C = Historial_Clinico.Id_C
Inner Join Med_Esp on Med_Esp.Id_Rel = Cita_Medica.Id_Rel
Inner Join Medico on Medico.Id_Med = Med_Esp.Id_Med
Inner Join Especialidad on Especialidad.Id_Esp = Med_Esp.Id_Esp
Where Cita_Medica.Id_Pac = 1;

Select Cita_Medica.Id_C, Paciente.Nom_Pac, Date_Format(Cita_Medica.Hora,'%h:%i  %p'), Date_Format(Cita_Medica.Fecha, '%W %d de %M de %Y'), Cita_Medica.Estado from Cita_Medica
Inner Join Med_Esp on Med_Esp.Id_Rel=Cita_Medica.Id_Rel
Inner Join Paciente on Paciente.Id_Pac = Cita_Medica.Id_Pac 
where Id_Med = 1;

Select Cita_Medica.Id_C, Paciente.Nom_Pac, Historial_Clinico.Obs_HC from Historial_Clinico
Inner Join Cita_Medica on Cita_Medica.Id_C = Historial_Clinico.Id_C
Inner Join Med_Esp on Med_Esp.Id_Rel = Cita_Medica.Id_Rel
Inner Join Paciente on Paciente.Id_Pac = Cita_Medica.Id_Pac
Where Id_Med = 1;

