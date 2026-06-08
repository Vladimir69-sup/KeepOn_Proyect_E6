CREATE TABLE info_general_usuario
(
    idUsuario INTEGER NOT NULL AUTO_INCREMENT,
    fechaNacimiento VARCHAR(10) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    primerApellido VARCHAR(50) NOT NULL,
    segundoApellido VARCHAR(50),
    funcion INTEGER CHECK(funcion BETWEEN 1 AND 3)NOT NULL,
    PRIMARY KEY (idUsuario)
    
);

CREATE TABLE infoMaestro
(
    idMaestro INTEGER NOT NULL AUTO_INCREMENT,
    numTrabajador VARCHAR(30) NOT NULL,
      PRIMARY KEY(idMaestro)
);
CREATE TABLE grupo
(
    idGrupo INTEGER NOT NULL AUTO_INCREMENT,
    nombreGrupo VARCHAR(3) NOT NULL,
    idMaestro INTEGER NOT NULL,      
    FOREIGN KEY(idMaestro)          /*no lleva coma entre esta y references*/
    	REFERENCES infoMaestro(idMaestro),
    PRIMARY KEY(idGrupo)
);
CREATE TABLE infoAlumno
(
    idAlumno INTEGER AUTO_INCREMENT NOT NULL,
    numeroCuenta INTEGER NOT NULL,
    idGrupo INTEGER NOT NULL,
    FOREIGN KEY (idGrupo)
        REFERENCES grupo(idGrupo),
    PRIMARY KEY(idAlumno)
);
CREATE TABLE infoadministrador
(
    idAdmin INTEGER NOT NULL AUTO_INCREMENT,
    numTrabajador VARCHAR(30) NOT NULL,
    PRIMARY KEY(idAdmin)
); 
CREATE TABLE actividad         
(
    idActividad INTEGER NOT NULL AUTO_INCREMENT,
    hora VARCHAR(5) NOT NULL,
    fecha VARCHAR(8) NOT NULL,
    modulo INTEGER CHECK(modulo BETWEEN 1 AND 5) NOT NULL,
    idGrupo INTEGER NOT NULL,
    FOREIGN KEY(idGrupo)
    	REFERENCES grupo(idGrupo),
    PRIMARY KEY(idActividad)
);
CREATE TABLE actividad_alumno      
(
	idActividad_alumno INTEGER AUTO_INCREMENT NOT NULL,
	entregado BOOL,
    calificacion INTEGER CHECK(calificacion BETWEEN 0 AND 10),
    idActividad INTEGER NOT NULL,
	FOREIGN KEY(idActividad)
		REFERENCES actividad(idActividad),
	PRIMARY KEY(idActividad_alumno)
);	
CREATE TABLE formulario 
(
	idFormulario INTEGER NOT NULL  AUTO_INCREMENT,
	idGrupo INTEGER NOT NULL,
	FOREIGN KEY (idGrupo)
		REFERENCES grupo(idGrupo),
	descripcion VARCHAR(250) NOT NULL,
	PRIMARY KEY(idFormulario)
);

CREATE TABLE tipo_pregunta
(
	id_tipo_pregunta INTEGER NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(10) NOT NULL,
	PRIMARY KEY(id_tipo_pregunta)
);
CREATE TABLE pregunta
(
	idPregunta INTEGER NOT NULL AUTO_INCREMENT,
	pregunta TEXT NOT NULL,
	idFormulario INTEGER NOT NULL,
	FOREIGN KEY (idFormulario)
		REFERENCES formulario(idFormulario),
	id_tipo_pregunta INTEGER NOT NULL,
	FOREIGN KEY(id_tipo_pregunta)
		REFERENCES tipo_pregunta(id_tipo_pregunta),
	PRIMARY KEY(idPregunta)
);
CREATE TABLE opcion_pregunta
(
	id_opcion_pregunta INTEGER NOT NULL AUTO_INCREMENT,
	opcion VARCHAR(100),
	idPregunta INTEGER NOT NULL,
	FOREIGN KEY (idPregunta)
		REFERENCES pregunta(idPregunta),
	PRIMARY KEY(id_opcion_pregunta)
);
CREATE TABLE comentario 
(
	idComentario INTEGER AUTO_INCREMENT NOT NULL,
	comentario TEXT NOT NULL ,
	idAlumno INTEGER NOT NULL,
	FOREIGN KEY (idAlumno)
		REFERENCES infoAlumno(idAlumno),
	idMaestro INTEGER NOT NULL,
    FOREIGN KEY (idMaestro)
		REFERENCES infoMaestro(idMaestro),
	PRIMARY KEY(idComentario)
);
CREATE TABLE recursos
(
	idRecurso INTEGER AUTO_INCREMENT NOT NULL,
	titulo VARCHAR(30) NOT NULL,
	url TEXT NOT NULL,
    idGrupo INTEGER NOT NULL,
    FOREIGN KEY (idGrupo)
        REFERENCES grupo(idGrupo),
    PRIMARY KEY(idRecurso)
);
CREATE TABLE respuesta_usuario
(
	id_respuesta_usuario INTEGER NOT NULL AUTO_INCREMENT,
    texto_respuesta TEXT NOT NULL, 
	idUsuario INTEGER NOT NULL,
	FOREIGN KEY  (idUsuario)
		REFERENCES info_general_usuario(idUsuario),
	idPregunta INTEGER NOT NULL,
	FOREIGN KEY (idPregunta)
		REFERENCES pregunta(idPregunta),
	id_opcion_pregunta INTEGER NOT NULL,
	FOREIGN KEY  (id_opcion_pregunta)
		REFERENCES opcion_pregunta(id_opcion_pregunta),
	PRIMARY KEY(id_respuesta_usuario)
);
CREATE TABLE asesoria
(
    idAsesoria INTEGER NOT NULL AUTO_INCREMENT,
    hora VARCHAR(5) NOT NULL,
    fecha VARCHAR(8) NOT NULL,
    
    tema VARCHAR(60) NOT NULL,
    idMaestro INTEGER NOT NULL,
    FOREIGN KEY(idMaestro)
        REFERENCES infoMaestro(idMaestro),
    idAlumno INTEGER,
    FOREIGN KEY(idAlumno)
        REFERENCES infoAlumno(idAlumno),
    PRIMARY KEY(idAsesoria)
);
