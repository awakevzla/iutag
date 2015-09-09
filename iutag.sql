DROP DATABASE IF EXISTS iutag;

CREATE DATABASE iutag;

CREATE TABLE iutag.trayecto (
       cod_trayecto INT NOT NULL AUTO_INCREMENT
     , nombre VARCHAR(100) NOT NULL
     , PRIMARY KEY (cod_trayecto)
);

CREATE TABLE iutag.periodo (
       cod_periodo INT NOT NULL AUTO_INCREMENT
     , fecha_inicio DATE
     , fecha_culminacion DATE
     , PRIMARY KEY (cod_periodo)
);

CREATE TABLE iutag.aula (
       cod_aula INT NOT NULL AUTO_INCREMENT
     , nombre VARCHAR(100) NOT NULL
     , capacidad INT NOT NULL
     , tipo ENUM('laboratorio','aula') DEFAULT 'aula'
     , UNIQUE UQ_aula_1 (nombre)
     , PRIMARY KEY (cod_aula)
);

CREATE TABLE iutag.usuario (
       cod_usuario INT NOT NULL AUTO_INCREMENT
     , nombre VARCHAR(150) NOT NULL
     , apellido VARCHAR(150) NOT NULL
     , cedula VARCHAR(20) NOT NULL
     , direccion VARCHAR(250)
     , telefono VARCHAR(50)
     , usuario VARCHAR(20) NOT NULL
     , clave VARCHAR(20) NOT NULL
     , tipo ENUM('administrador','operador') DEFAULT 'operador'
     , UNIQUE UQ_usuario_1 (nombre, apellido, cedula)
     , UNIQUE UQ_usuario_2 (usuario)
     , UNIQUE UQ_usuario_3 (cedula)
     , PRIMARY KEY (cod_usuario)
);

CREATE TABLE iutag.docente (
       cod_docente INT NOT NULL AUTO_INCREMENT
     , nombre VARCHAR(200) NOT NULL
     , apellido VARCHAR(200) NOT NULL
     , cedula VARCHAR(20) NOT NULL
     , categoria ENUM('instructor','asistente','agregado','asociado','titular') NOT NULL
     , condicion ENUM('contratado','fijo') NOT NULL
     , dedicacion ENUM('completo','exclusiva','convencional','medio') NOT NULL
     , observaciones VARCHAR(500)
     , cubiculo VARCHAR(10)
     , nacionalidad ENUM('V','E','P') NOT NULL
     , UNIQUE UQ_docente_1 (nombre, apellido, cedula, nacionalidad)
     , UNIQUE UQ_docente_2 (cedula, nacionalidad)
     , PRIMARY KEY (cod_docente)
);

CREATE TABLE iutag.trimestre (
       cod_trimestre INT NOT NULL AUTO_INCREMENT
     , nombre VARCHAR(100) NOT NULL
     , cod_trayecto INT NOT NULL
     , PRIMARY KEY (cod_trimestre)
     , INDEX (cod_trayecto)
     , CONSTRAINT FK_cod_trimestre_1 FOREIGN KEY (cod_trayecto)
                  REFERENCES iutag.trayecto (cod_trayecto)
);

CREATE TABLE iutag.uc (
       cod_uc INT NOT NULL AUTO_INCREMENT
     , nombre_uc VARCHAR(100) NOT NULL
     , nro_semanas INT NOT NULL
     , cod_trimestre INT NOT NULL
     , horas_semanales INT NOT NULL
     , PRIMARY KEY (cod_uc)
     , INDEX (cod_trimestre)
     , CONSTRAINT FK_uc_1 FOREIGN KEY (cod_trimestre)
                  REFERENCES iutag.trimestre (cod_trimestre)
);

CREATE TABLE iutag.seccion (
       cod_seccion INT NOT NULL AUTO_INCREMENT
     , nro INT
     , cod_trimestre INT NOT NULL
     , cod_periodo INT NOT NULL
     , PRIMARY KEY (cod_seccion)
     , INDEX (cod_trimestre)
     , CONSTRAINT FK_seccion_1 FOREIGN KEY (cod_trimestre)
                  REFERENCES iutag.trimestre (cod_trimestre)
     , INDEX (cod_periodo)
     , CONSTRAINT FK_seccion_2 FOREIGN KEY (cod_periodo)
                  REFERENCES iutag.periodo (cod_periodo) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE iutag.carga (
       cod_carga INT NOT NULL AUTO_INCREMENT
     , cod_seccion INT NOT NULL
     , cod_uc INT NOT NULL
     , cod_docente INT
     , PRIMARY KEY (cod_carga)
     , INDEX (cod_seccion)
     , CONSTRAINT FK_carga_1 FOREIGN KEY (cod_seccion)
                  REFERENCES iutag.seccion (cod_seccion) ON DELETE CASCADE ON UPDATE CASCADE
     , INDEX (cod_uc)
     , CONSTRAINT FK_carga_2 FOREIGN KEY (cod_uc)
                  REFERENCES iutag.uc (cod_uc) ON DELETE CASCADE ON UPDATE CASCADE
     , INDEX (cod_docente)
     , CONSTRAINT FK_carga_3 FOREIGN KEY (cod_docente)
                  REFERENCES iutag.docente (cod_docente) ON DELETE SET NULL
);

CREATE TABLE iutag.asignacion (
       cod_asignacion INT NOT NULL AUTO_INCREMENT
     , hora_entrada TIME NOT NULL
     , horas INT NOT NULL
     , hora_salida TIME NOT NULL
     , cod_carga INT NOT NULL
     , cod_aula INT
     , dia_semana ENUM('lunes','martes','miercoles','jueves','viernes') NOT NULL
     , PRIMARY KEY (cod_asignacion)
     , INDEX (cod_carga)
     , CONSTRAINT FK_asignacion_1 FOREIGN KEY (cod_carga)
                  REFERENCES iutag.carga (cod_carga) ON DELETE CASCADE ON UPDATE CASCADE
     , INDEX (cod_aula)
     , CONSTRAINT FK_asignacion_2 FOREIGN KEY (cod_aula)
                  REFERENCES iutag.aula (cod_aula) ON DELETE CASCADE ON UPDATE CASCADE
);

USE iutag;

INSERT INTO trayecto (cod_trayecto, nombre) VALUES
(1,'Inicial'),
(2,'1'),
(3,'2'),
(4,'3'),
(5,'4');

INSERT INTO trimestre (cod_trimestre, nombre, cod_trayecto) VALUES
(1,'Unico',1),
(2,'I',2),
(3,'II',2),
(4,'III',2),
(5,'I',3),
(6,'II',3),
(7,'III',3),
(8,'I',4),
(9,'II',4),
(10,'III',4),
(11,'I',5),
(12,'II',5),
(13,'III',5);

INSERT INTO usuario 
(cod_usuario,nombre,apellido,cedula,direccion,telefono,usuario,clave,tipo)
VALUES (NULL ,  'Monica',  'Ortuñez',  '000000', NULL , NULL ,  'monica',  '1234','administrador');
