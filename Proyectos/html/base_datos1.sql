CREATE TABLE infoGeneralUsuario
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

--INFORMACION ESPECIFICA DEL USUARIO
CREATE TABLE infoMaestro
(
    idMaestro INTEGER NOT NULL AUTO_INCREMENT,
    numTrabajador VARCHAR(30) NOT NULL,
      PRIMARY KEY(idMaestro)
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
CREATE TABLE infoAdministrador
(
    idAdmin INTEGER NOT NULL AUTO_INCREMENT,
    numTrabajador VARCHAR(30) NOT NULL,
    PRIMARY KEY(idAdmin)
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
---ACTIVIDADES
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
CREATE TABLE actividadAlumno      
(
	idActividad_alumno INTEGER AUTO_INCREMENT NOT NULL,
	entregado BOOL,
    calificacion INTEGER CHECK(calificacion BETWEEN 0 AND 10),
    idActividad INTEGER NOT NULL,
	FOREIGN KEY(idActividad)
		REFERENCES actividad(idActividad),
	PRIMARY KEY(idActividad_alumno)
);	

--FORMULARIOS
CREATE TABLE formulario 
(
	idFormulario INTEGER NOT NULL AUTO_INCREMENT,
	idGrupo INTEGER,
	FOREIGN KEY (idGrupo)
		REFERENCES grupo(idGrupo),
	descripcion TEXT NOT NULL,
	PRIMARY KEY(idFormulario)
);

CREATE TABLE tipoPregunta
(
	idTipoPregunta INTEGER NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(10) NOT NULL,
	PRIMARY KEY(idTipoPregunta)
);
CREATE TABLE pregunta
(
	idPregunta INTEGER NOT NULL AUTO_INCREMENT,
	pregunta TEXT NOT NULL,
	idFormulario INTEGER NOT NULL,
	FOREIGN KEY (idFormulario)
		REFERENCES formulario(idFormulario),
	idTipoPregunta INTEGER NOT NULL,
	FOREIGN KEY(idTipoPregunta)
		REFERENCES tipoPregunta(idTipoPregunta),
	PRIMARY KEY(idPregunta)
);
CREATE TABLE opcionPregunta
(
	idOpcionPregunta INTEGER NOT NULL AUTO_INCREMENT,
	opcion TEXT,
	idPregunta INTEGER NOT NULL,
	FOREIGN KEY (idPregunta)
		REFERENCES pregunta(idPregunta),
	PRIMARY KEY(idOpcionPregunta)
);
CREATE TABLE respuestaUsuario
(
	idRespuestaUsuario INTEGER NOT NULL AUTO_INCREMENT,
    textoRespuesta TEXT NOT NULL, 
	idUsuario INTEGER NOT NULL,
	FOREIGN KEY  (idUsuario)
		REFERENCES infoGeneralUsuario(idUsuario),
	idPregunta INTEGER NOT NULL,
	FOREIGN KEY (idPregunta)
		REFERENCES pregunta(idPregunta),
	idOpcionPregunta INTEGER NOT NULL,
	FOREIGN KEY  (idOpcionPregunta)
		REFERENCES opcionPregunta(idOpcionPregunta),
	PRIMARY KEY(idRespuestaUsuario)
);

--AYUDAS EXTRAS 
CREATE TABLE comentario 
 INSER
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

--MENSAJES
CREATE TABLE mensaje
(
   idMensaje INT NOT NULL AUTO_INCREMENT,
   mensaje TEXT,
   PRIMARY KEY (idMensaje)
);

CREATE TABLE mensajeAlumno
(
   idMensajeAlumno INT NOT NULL AUTO_INCREMENT,
   idAlumno INT NOT NULL,
   idMensaje INT NOT NULL ,
   FOREIGN KEY (idAlumno) REFERENCES infoAlumno(idAlumno),
   FOREIGN KEY (idMensaje) REFERENCES mensaje(idMensaje),
   PRIMARY KEY (idMensajeAlumno)
);

CREATE TABLE respuestaProfesor
(
   idRespuestaProfesor INT NOT NULL AUTO_INCREMENT,
   idMensajeAlumno NOT NULL, 
   idMensaje INT NOT NULL, 
   FOREIGN KEY (idMensajeAlumno) REFERENCES mensajeAlumno(idMensajeAlumno),
   FOREIGN KEY (idMensaje) REFERENCES mensaje(idMensaje),
   PRIMARY KEY (idRespuestaProfesor)
);

-- poblar tabla tipo pregunta 
INSERT INTO formulario(descripcion)
VALUES 
    ("Cuestionario para obtener información del alumnado del estudio técnico en computación que permita
        desarrollar mejores modelos de enseñanza y aprendizaje adaptado"),
INSERT INTO tipoPregunta(tipo)
VALUES
    ('radio'), --1
    ('checkbox'),--2
    ('textarea'),--3

INSERT INTO pregunta(pregunta,idFormulario,idTipoPregunta)
VALUES
('1. ¿Cuántas horas estudias o haces tareas al día?',1,1),
('2. ¿Dónde estudias la mayor parte del tiempo?',1,1),
('3. ¿En qué horario te concentras mejor para estudiar?',1,1),
('4. ¿Cómo estudias normalmente? (Marca las que apliquen)',1,2),
('5. ¿Cuáles de las siguientes formas te ayuda más a aprender?',1,2),
('6. ¿Con cuáles de los siguientes recursos cuentas para estudiar?',1,2),
('7. Si tienes computadora, ¿es?',1,1),
('8. ¿Qué recursos utilizas con mayor frecuencia para estudiar?',1,2),
('9. ¿Te distraes con facilidad al estudiar?',1,1),
('10. ¿Qué suele distraerte más?',1,2),
('11. ¿Cómo consideras tu organización para entregar tareas?',1,1),
('12. ¿Cuáles consideras que son tus principales fortalezas académicas? (Marca máximo 5)',1,2),
('13. Menciona la habilidad académica en la que más destacas',1,3),--text 
('14. ¿Cuáles consideras que son tus principales dificultades?',1,2),
('15. ¿Qué materias se te dificultan más?',1,2),
('16. ¿Por qué se te dificultan esas materias?',1,2),
('17. ¿Has tenido alguna de estas complicaciones académicas?',1,2),
('18. ¿Por qué decidiste entrar al estudio técnico?',1,2),
('19. ¿Qué es lo que más te motiva a continuar estudiando?',1,1),
('20. ¿Qué situaciones podrían hacer que abandonaras el ETE?',1,2),
('21. Actualmente, ¿has pensado en abandonar tus estudios?',1,1),
('22. ¿Cuánto tiempo tardas en llegar a la escuela?',1,1),
('23. ¿Cuál es tu principal medio de transporte?',1,1),
('24. ¿Qué tipo de apoyo consideras que te ayudaría más a mejorar tu desempeño?',1,1),
('25. ¿Hay alguna situación personal o académica que consideres importante
 que tus profesores conozcan para apoyarte mejor?',1,3); --text

INSERT INTO opcionPregunta(opcion,idPregunta)
VALUES 
    ("Menos de 1 hora",1),-- la tabla lo infiere pero se incia para q sepa :)
    ("1 a 2 horas",1),
    ("2 a 3 horas",1),
    ("3 a 4 horas",1),
    ("Más de 4 horas",1),

    ("En casa",2),
    ("Biblioteca",2),
    ("Escuela",2),
    ("Casa de un familiar o amigo",2),
    (" Otro:",2),--- texto- respuesta 

    ("Mañana",3),
    ("Tarde",3),
    ("Noche",3),
    ("No tengo un horario fijo",3),
    
    ("Leo apuntes o libros",4),
    ("Hago resúmenes",4),
    ("Realizo ejercicios prácticos",4),
    ("Veo videos educativos",4),
    ("Busco información en internet",4),

    ("Ver imágenes, diagramas o ejemplos visuales",5),
    ("Escuchar explicaciones",5),
    ("Leer y escribir apuntes",5),
    ("Practicar y realizar actividades",5),
    ("Combinación de varias",5),

    ("Computadora de escritorio",6),
    ("Laptop",6),
    ("Tableta",6),
    ("Teléfono celular",6),
    ("Internet en casa",6),
    ("Libros impresos",6),
    ("Ninguno de los anteriores",6),

    ("Propia",7),
    ("Compartida con familiares",7),
    ("No tengo computadora",7),

    ("Apuntes de clase",8),
    ("Libros",8),
    ("Videos educativos",8),
    ("Inteligencia artificial",8),
    ("Sitios web educativos",8),
    ("Tutoriales",8),
    ("Compañeros",8),
    ("Profesores",8),
    ("Otro:",8),

    ("Nunca",9),
    ("Rara vez",9),
    ("Algunas veces",9),
    ("Frecuentemente",9),
    ("Siempre",9),

    ("Redes sociales",10),
    ("Videojuegos",10),
    ("Televisión",10),
    ("Ruido",10),
    ("Familiares o amigos",10),
    ("Teléfono celular",10),
    ("Otro:",10),

    ("Excelente",11),
    ("Buena",11),
    ("Regular",11),
    ("Mala",11),

    ("Organización",12),
    ("Responsabilidad",12),
    ("Trabajo en equipo",12),
    ("Liderazgo",12),
    ("Resolución de problemas",12),
    ("Creatividad",12),
    ("Investigación",12),
    ("Comunicación oral",12),
    ("Comprensión lectora",12),
    ("Pensamiento lógico",12),
    ("Disciplina",12),
    ("Aprendizaje autónomo",12),
    ("Otra:",12),

    ---pregunta 13

    ("Distracción",14),
    ("Falta de organización",14),
    ("Administración del tiempo",14),
    ("Comprensión lectora",14),
    ("Matemáticas",14),
    ("Expresión oral",14),
    ("Trabajo en equipo",14),
    ("Falta de confianza",14),
    ("Participación en clase",14),
    ("Realización de tareas",14),
    ("Otra:",14),

    ("Matemáticas",15),
    ("Física",15),
    ("Química",15),
    ("Biología",15),
    ("Español",15),
    ("Inglés",15),
    ("Historia",15),
    ("Geografía",15),
    ("Ética",15),
    ("Informática",15),

    ("No comprendo algunos temas",16),
    ("Me falta práctica",16),
    ("Me distraigo fácilmente",16),
    ("Falto a clases",16),
    ("No cuento con suficiente material",16),
    ("Otro:",16),

    ("Reprobación de materias",17),
    ("Entrega tardía de tareas",17),
    ("Ausencias frecuentes",17),
    ("Problemas para entender las clases",17),
    ("Ninguna",17),
    ("Otra:",17),

    ("Me gusta el área",18),
    ("Quiero conseguir un buen empleo",18),
    ("Me ayudará en mis estudios futuros",18),
    ("Recomendación de familiares o amigos",18),
    ("Fue mi mejor opción disponible",18),
    ("Otro:",18),

    ("Aprender nuevas habilidades",19),
    ("Obtener un título o certificado",19),
    ("Conseguir empleo",19),
    ("Superación personal",19),
    ("Apoyo familiar",19),
    ("Cumplir mis metas",19),
    ("Otro:",19),

    ("Problemas económicos",20),
    ("Falta de interés",20),
    ("Problemas familiares",20),
    ("Problemas de salud",20),
    ("Exceso de trabajo",20),
    ("Problemas al entender los temas",20),
    ("Dificultades académicas",20),
    ("Tiempo de traslado",20),
    ("Ninguna",20),
    ("Otra:",20),

    ("Nunca",21),
    ("Rara vez",21),
    ("Algunas veces",21),
    ("Frecuentemente",21),

    ("Menos de 15 minutos",22),
    ("15 a 30 minutos",22),
    ("31 a 60 minutos",22),
    ("1 a 2 horas",22),
    ("Más de 2 horas",22),

    ("Caminando",23),
    ("Bicicleta",23),
    ("Transporte público",23),
    ("Carro",23),
    ("Moto",23),
    ("Otro:",23),

    ("Más ejercicios prácticos",24),
    ("Asesorías adicionales",24),
    ("Material extra",24),
    ("Técnicas de organización y estudio",24),
    ("Otro:",24);

    --pregunta 25


