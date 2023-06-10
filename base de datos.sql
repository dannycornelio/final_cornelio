
CREATE TABLE alumnos(
  id_alumnos SERIAL PRIMARY KEY,
  alu_nombre VARCHAR(100) NOT NULL,
  alu_apellido VARCHAR (100) NOT NULL,
  alu_grado VARCHAR(50) NOT NULL,
  alu_arma VARCHAR(50) NOT NULL,
  alu_nac VARCHAR(50) NOT NULL,
  detalle_situacion CHAR(1) DEFAULT '1'
   );




CREATE TABLE materias(
  id_materias SERIAL PRIMARY KEY,
  ma_nombre VARCHAR(50) NOT NULL,
  detalle_situacion CHAR(1) DEFAULT '1'
);


CREATE TABLE calificaciones(
  id_calificaciones SERIAL PRIMARY KEY,
  calif_alumno  INT NOT NULL,
  calif_materia INT NOT NULL,
  calif_punteo FLOAT NOT NULL,
  calif_resultado VARCHAR(10) NOT NULL,
  detalle_situacion CHAR(1) DEFAULT '1',
  FOREIGN KEY (calif_alumno) REFERENCES alumnos(id_alumnos),
  FOREIGN KEY (calif_materia) REFERENCES materias(id_materias)
 );




CREATE TABLE relacion_mat_alum(
  id_mat_alum SERIAL PRIMARY KEY,
  ma_alumno INT NOT NULL,
  ma_materia INT NOT NULL,
  FOREIGN KEY (ma_alumno) REFERENCES alumnos(id_alumnos),
  FOREIGN KEY (ma_materia) REFERENCES materias(id_materias)
);


INSERT INTO relacion_mat_alum (ma_alumno, ma_materia) VALUES (1, 1);

INSERT INTO relacion_mat_alum (ma_alumno, ma_materia) VALUES (2, 2);

INSERT INTO relacion_mat_alum (ma_alumno, ma_materia) VALUES (1, 2);



/*querys*/

SELECT alumnos.alu_nombre|| ' ' ||alu_apellido as Nombre, alumnos.alu_grado, alumnos.alu_arma, alumnos.alu_nac,  materias.ma_nombre, calificaciones.calif_punteo, calificaciones.calif_resultado
FROM alumnos
JOIN calificaciones ON alumnos.id_alumnos = calificaciones.calif_alumno
JOIN materias ON calificaciones.calif_materia = materias.id_materias
ORDER BY alumnos.alu_nombre, materias.ma_nombre, calificaciones.id_calificaciones;


SELECT alumnos.alu_nombre|| ' ' ||alu_apellido as Nombre, AVG(calificaciones.calif_punteo) AS Promedio
FROM alumnos
JOIN calificaciones ON alumnos.id_alumnos = calificaciones.calif_alumno
GROUP BY alumnos.alu_nombre;