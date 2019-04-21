#Archivo de manejo de datos para el proyecto 1 de Ingenieria de Aplicaciones Web

CREATE DATABASE proyecto1iaw;

USE proyecto1iaw;

#---------------------------------------------------------

#Una lista donde se pueden almacenar distintos libros

CREATE TABLE Lista(

    nro_lista SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL,
    nombre_lista VARCHAR(45) NOT NULL,
    nro_libro SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL,
    nombre_libro VARCHAR(45) NOT NULL,
    elem2 VARCHAR(45) NOT NULL,
    elem3 VARCHAR(45) NOT NULL,

    CONSTRAINT pk_elem
	PRIMARY KEY (nro_lista),

    CONSTRAINT FK_elem
    FOREIGN KEY (nro_lista,nombre_lista) REFERENCES Listas_Creadas (nro_lista,nombre_lista)

)Engine = InnoDB;

#Mantiene todas las listas existentes

CREATE TABLE Listas_Creadas(

    nro_lista SMALLINT UNSIGNED AUTO_INCREMENT NOT NULL,
    nombre_lista VARCHAR(45) NOT NULL,
    usuario_creador VARCHAR(45) NOT NULL,

    CONSTRAINT pk_lista
	PRIMARY KEY (nro_lista,usuario_creador),

    CONSTRAINT FK_owner
    FOREIGN KEY (usuario_creador) REFERENCES Usuarios_Registrados (nombre_usuario)

)Engine = InnoDB;

#Mantiene a todos los usuarios registrados

CREATE TABLE Usuarios_Registrados(

    nombre_usuario VARCHAR(45) NOT NULL,
    password VARCHAR(32) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
	nombre VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,

    CONSTRAINT pk_usuario
	PRIMARY KEY (nombre_usuario),

)Engine = InnoDB;

#---------------------------------------------------------