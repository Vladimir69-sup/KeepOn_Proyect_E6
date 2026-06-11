DROP DATABASE keep_on_db;
CREATE DATABASE IF NOT EXISTS keep_on_db;
USE keep_on_db;	

CREATE TABLE infoGeneralUsuario
(
    idUsuario INT NOT NULL AUTO_INCREMENT,
    fechaNacimiento VARCHAR(10) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    primerApellido VARCHAR(50) NOT NULL,
    segundoApellido VARCHAR(50),
    foto_perfil TEXT,
    PRIMARY KEY (idUsuario)
);

--INFORMACION ESPECIFICA DEL USUARIO
CREATE TABLE infoMaestro
(
    idMaestro INTEGER NOT NULL AUTO_INCREMENT,
    numTrabajador VARCHAR(30) NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY(idUsuario) REFERENCES infoGeneralUsuario(idUsuario),
    PRIMARY KEY(idMaestro)
);

CREATE TABLE grupo
(
    idGrupo INTEGER NOT NULL AUTO_INCREMENT,
    nombreGrupo VARCHAR(3) NOT NULL,
    idMaestro INTEGER NOT NULL,      
    FOREIGN KEY(idMaestro) REFERENCES infoMaestro(idMaestro),    
    PRIMARY KEY(idGrupo)
);

CREATE TABLE infoAlumno
(
    idAlumno INTEGER NOT NULL AUTO_INCREMENT,
    numeroCuenta INTEGER NOT NULL,
    idGrupo INTEGER NOT NULL,
    idUsuario INT NOT NULL,
    asistencia INT NOT NULL DEFAULT 0,
    FOREIGN KEY (idGrupo) REFERENCES grupo(idGrupo),
    FOREIGN KEY(idUsuario) REFERENCES infoGeneralUsuario(idUsuario),	
    PRIMARY KEY(idAlumno)
);

CREATE TABLE infoAdministrador
(
    idAdmin INTEGER NOT NULL AUTO_INCREMENT,
    numTrabajador VARCHAR(30) NOT NULL,
    idUsuario INT NOT NULL,
    FOREIGN KEY(idUsuario) REFERENCES infoGeneralUsuario(idUsuario),
    PRIMARY KEY(idAdmin)
); 


---ACTIVIDADES
CREATE TABLE actividad         
(
    idActividad INTEGER NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    hora VARCHAR(5) NOT NULL,
    fecha VARCHAR(10) NOT NULL,
    modulo INTEGER NOT NULL CHECK(modulo BETWEEN 1 AND 5)	,
    idGrupo INTEGER NOT NULL,
    FOREIGN KEY(idGrupo) REFERENCES grupo(idGrupo),
    PRIMARY KEY(idActividad)
);

CREATE TABLE actividadAlumno      
(
	idActividadAlumno INTEGER NOT NULL AUTO_INCREMENT,
	entregado BOOL,
    calificacion INTEGER CHECK(calificacion BETWEEN 0 AND 10),
    idActividad INTEGER NOT NULL,
	FOREIGN KEY(idActividad) REFERENCES actividad(idActividad),
	PRIMARY KEY(idActividadAlumno)
);	

--FORMULARIOS
CREATE TABLE formulario 
(
	idFormulario INTEGER NOT NULL AUTO_INCREMENT,
	idGrupo INTEGER,
	titulo TEXT NOT NULL,
	descripcion TEXT NOT NULL,
    rendimiento_esperado INT NOT NULL,
    FOREIGN KEY (idGrupo) REFERENCES grupo(idGrupo),
	PRIMARY KEY(idFormulario)
);

CREATE TABLE formularioAlumno(
    idFormularioAlumno INTEGER NOT NULL AUTO_INCREMENT,
    entregado BOOL,
    calificacion INTEGER CHECK(calificacion BETWEEN 0 AND 10),
    rendimiento_alumno INT NOT NULL,
    idFormulario INTEGER NOT NULL,
    FOREIGN KEY(idFormulario) REFERENCES formulario(idFormulario),
    PRIMARY KEY(idFormularioAlumno)
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
    idTipoPregunta INTEGER NOT NULL,
    puntaje_rendimiento INTEGER NOT NULL CHECK(puntaje_rendimiento BETWEEN 1 AND 5),
	FOREIGN KEY (idFormulario) REFERENCES formulario(idFormulario),
	FOREIGN KEY(idTipoPregunta) REFERENCES tipoPregunta(idTipoPregunta),
	PRIMARY KEY(idPregunta)
);

CREATE TABLE opcionPregunta
(
	idOpcionPregunta INTEGER NOT NULL AUTO_INCREMENT,
	opcion TEXT,
	idPregunta INTEGER NOT NULL,
    correcta BOOL,
	FOREIGN KEY (idPregunta) REFERENCES pregunta(idPregunta),
	PRIMARY KEY(idOpcionPregunta)
);

CREATE TABLE respuestaUsuario
(
    idRespuestaUsuario INTEGER NOT NULL AUTO_INCREMENT,
    textoRespuesta TEXT NOT NULL,
    idUsuario INTEGER NOT NULL,
    idPregunta INTEGER NOT NULL,
    idOpcionPregunta INTEGER NOT NULL,
    calificacion_por_pregunta INTEGER NOT NULL,
    puntaje_por_pregunta INTEGER NOT NULL CHECK(puntaje_por_pregunta BETWEEN 0 AND 5),
    FOREIGN KEY  (idUsuario) REFERENCES infoGeneralUsuario(idUsuario),
    FOREIGN KEY (idPregunta) REFERENCES pregunta(idPregunta),
    FOREIGN KEY  (idOpcionPregunta) REFERENCES opcionPregunta(idOpcionPregunta),
    PRIMARY KEY(idRespuestaUsuario)
);



--AYUDAS EXTRAS 
CREATE TABLE comentario 
(
     idComentario INTEGER AUTO_INCREMENT NOT NULL,
     comentario TEXT NOT NULL ,
     idAlumno INTEGER NOT NULL,
     FOREIGN KEY (idAlumno) REFERENCES infoAlumno(idAlumno),
     idMaestro INTEGER NOT NULL,
     FOREIGN KEY (idMaestro) REFERENCES infoMaestro(idMaestro),
     PRIMARY KEY(idComentario)
);

CREATE TABLE recursos
(
     idRecurso INTEGER NOT NULL AUTO_INCREMENT,
     titulo VARCHAR(30) NOT NULL,
     url TEXT NOT NULL,
     idGrupo INTEGER NOT NULL,
     FOREIGN KEY (idGrupo) REFERENCES grupo(idGrupo),
     PRIMARY KEY(idRecurso)
);

CREATE TABLE asesoria
(
    idAsesoria INTEGER NOT NULL AUTO_INCREMENT,
    hora VARCHAR(5) NOT NULL,
    fecha VARCHAR(10) NOT NULL,
    tema VARCHAR(60) NOT NULL,
    idMaestro INTEGER NOT NULL,
    FOREIGN KEY(idMaestro) REFERENCES infoMaestro(idMaestro),
    idAlumno INTEGER,
    FOREIGN KEY(idAlumno) REFERENCES infoAlumno(idAlumno),
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
   idMensajeAlumno INT NOT NULL, 
   idMensaje INT NOT NULL, 
   FOREIGN KEY (idMensajeAlumno) REFERENCES mensajeAlumno(idMensajeAlumno),
   FOREIGN KEY (idMensaje) REFERENCES mensaje(idMensaje),
   PRIMARY KEY (idRespuestaProfesor)
);

-- ==== POBLAMOS BASE DE DATOS === -- 

-- == USUARIOS GENERALES     == --
INSERT INTO infoGeneralUsuario (fechaNacimiento, correo, nombre, primerApellido, segundoApellido)
VALUES
    ("03/09/2009", "325302041@alumno.enp.unam.mx", "Karla Elizabeth", "Hernández", "Santiago"),
    ("31/07/2008", "324002346@alumno.enp.unam.mx", "Ruben Isaac", "Peña", "González"),
    ("18/11/2006", "luana.alvarez@ciencias.unam.mx", "Luana Sofia", "Alvarez", "Molina"),
    ("04/06/2009", "123456789@alumno,enp.unam.mx", "Vladimir", "Ortiz", "Ochoa"),
    ("22/08/2008", "987654321@alumno,enp.unam.mx", "Gabriela Abigail", "Escamilla", "Flores"),
    ("15/12/2009", "246813579@alumno,enp.unam.mx", "Evelin Guadalupe", "Martínez", "Sevilla"),
    ("20/08/2003", "luis.falcon@ingenieria.unam.mx", "Luis Adrian", "Gonzalez", "Falcon"),
    ("19/03/1980", "AngelaVillanueva@unam.mx", "Angela Eugenia", "Villanueva", "Vilchis");

INSERT INTO infoMaestro (numTrabajador, idUsuario)
VALUES
    ("322157000", 3),
    ("012345678", 7);

INSERT INTO grupo(nombreGrupo, idMaestro)
VALUES
    ("61B", 1),
    ("61D", 2);

INSERT INTO infoAlumno (numeroCuenta, idGrupo, idUsuario)
VALUES
    ("325302041", 1, 1),
    ("324002346", 2, 2),
    ("123456789", 1, 4),
    ("987654321", 2, 5),
    ("246813579", 1, 6);

INSERT INTO infoAdministrador (numTrabajador, idUsuario) 
VALUES
    ("12398765", 8);

INSERT INTO actividad (titulo, descripcion, hora, fecha, modulo, idGrupo) VALUES
('Entrega de Proyecto Integrador', 'Subir el avance del proyecto en formato PDF con la estructura solicitada.', '23:59', '2026/06/15', 1, 1),
('Examen Parcial 1', 'Evaluación teórica de los temas correspondientes a la primera unidad.', '08:00', '2026/06/18', 2, 1),
('Foro de Discusión', 'Participar en el foro debatiendo sobre las arquitecturas de software limpias.', '14:30', '2026/06/20', 3, 1),
('Práctica de Laboratorio 3', 'Desarrollo de la API REST utilizando el framework seleccionado en clase.', '10:00', '2026/06/16', 2, 2),
('Exposición de Casos', 'Presentación en equipo sobre el análisis de requerimientos del cliente.', '11:30', '2026/06/19', 4, 2),
('Cuestionario de Retroalimentación', 'Responder las preguntas sobre el desempeño y dudas del módulo actual.', '16:00', '2026/06/22', 5, 2);


-- == FORMULARIO DE CONDICIONES DE ESTUDIO == --
INSERT INTO formulario(titulo, descripcion, rendimiento_esperado)
VALUES 
    ("Formulario sobre condiciones de estudio", "Cuestionario para obtener información del alumnado del estudio técnico en computación que permita desarrollar mejores modelos de enseñanza y aprendizaje adaptado", 51);
	
INSERT INTO tipoPregunta(tipo)
VALUES
    ('radio'), 
    ('checkbox'),
    ('textarea');

INSERT INTO pregunta(pregunta,idFormulario,idTipoPregunta, puntaje_rendimiento)
VALUES
('1. ¿Cuántas horas estudias o haces tareas al día?',1,1, 1),
('2. ¿Dónde estudias la mayor parte del tiempo?',1,1, 1),
('3. ¿En qué horario te concentras mejor para estudiar?',1,1, 1),
('4. ¿Cómo estudias normalmente? (Marca las que apliquen)',1,2, 1),
('5. ¿Cuáles de las siguientes formas te ayuda más a aprender?',1,2, 1),
('6. ¿Con cuáles de los siguientes recursos cuentas para estudiar?',1,2, 1),
('7. Si tienes computadora, ¿es?',1,1, 3),
('8. ¿Qué recursos utilizas con mayor frecuencia para estudiar?',1,2, 1),
('9. ¿Te distraes con facilidad al estudiar?',1,1, 2),
('10. ¿Qué suele distraerte más?',1,2,1),
('11. ¿Cómo consideras tu organización para entregar tareas?',1,1, 3),
('12. ¿Cuáles consideras que son tus principales fortalezas académicas? (Marca máximo 5)',1,2, 1),
('13. Menciona la habilidad académica en la que más destacas',1,3, 1),
('14. ¿Cuáles consideras que son tus principales dificultades?',1,2, 1),
('15. ¿Qué materias se te dificultan más?',1,2, 1),
('16. ¿Por qué se te dificultan esas materias?',1,2, 1),
('17. ¿Has tenido alguna de estas complicaciones académicas?',1,2,3),
('18. ¿Por qué decidiste entrar al estudio técnico?',1,2, 5),
('19. ¿Qué es lo que más te motiva a continuar estudiando?',1,1, 5),
('20. ¿Qué situaciones podrían hacer que abandonaras el ETE?',1,2, 5),
('21. Actualmente, ¿has pensado en abandonar tus estudios?',1,1, 5),
('22. ¿Cuánto tiempo tardas en llegar a la escuela?',1,1, 3),
('23. ¿Cuál es tu principal medio de transporte?',1,1, 1),
('24. ¿Qué tipo de apoyo consideras que te ayudaría más a mejorar tu desempeño?',1,1, 1),
('25. ¿Hay alguna situación personal o académica que consideres importante
 que tus profesores conozcan para apoyarte mejor?',1,3, 1);

INSERT INTO opcionPregunta(opcion,idPregunta)
VALUES 
    ("Menos de 1 hora",1),
    ("1 a 2 horas",1),
    ("2 a 3 horas",1),
    ("3 a 4 horas",1),
    ("Más de 4 horas",1),

    ("En casa",2),
    ("Biblioteca",2),
    ("Escuela",2),
    ("Casa de un familiar o amigo",2),
    (" Otro:",2),

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


