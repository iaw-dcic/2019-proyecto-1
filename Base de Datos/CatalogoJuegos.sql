#Base de Datos para la Página web del Proyecto 1 de IAW

#Creo la base de datos propiamente dicha

CREATE DATABASE catalogojuegos;


#Selecciono la base de datos a usar
USE catalogojuegos;

#-------------------------------------------------------------------------

#Creo las tablas para las Entidades

CREATE TABLE Usuario(

	nro_us INT UNSIGNED AUTO_INCREMENT NOT NULL,
	nombre_usuario VARCHAR(32) NOT NULL,
	password VARCHAR(45) NOT NULL,
	Mail VARCHAR(45) NOT NULL,

	CONSTRAINT pk_Us
	PRIMARY KEY(nro_us),

	

)Engine = InnoDB;


CREATE TABLE Juego(


)Engine = InnoDB;


CREATE TABLE ListaJuegos(



)Engine = InnoDB;