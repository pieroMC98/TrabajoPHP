
ALTER TABLE `persona`
ADD INDEX `fk_persona_far_table_idx` (nombre ASC),
ADD CONSTRAINT `fk_persona_far_table`
  FOREIGN KEY (nombre)
  REFERENCES usuario (nick)
  ON DELETE NO ACTION
  ON UPDATE CASCADE


ALTER TABLE `ClaveEsterna2`
ADD INDEX `fk_ClaveEsterna2_far_table_idx` (id ASC, nombre ASC),
ADD CONSTRAINT `fk_ClaveEsterna2_far_table`
  FOREIGN KEY (id, nombre)
  REFERENCES ClaveExterna (id, nombre)
  ON DELETE NO ACTION
  ON UPDATE CASCADE

ALTER TABLE `ClaveEsterna2`
ADD INDEX `fk_ClaveEsterna2_far_table_idx` (id ASC),
ADD INDEX `fk_nombre_far_table_idx` (nombre ASC),
ADD CONSTRAINT `fk_ClaveEsterna2_far_table` FOREIGN KEY (id, nombre) REFERENCES ClaveExterna (id, nombre)
  ON DELETE NO ACTION
  ON UPDATE CASCADE

ALTER TABLE `trabaja`
ADD INDEX `fk_trabaja_far_table_idx` (title_film ASC, dropyear ASC, gener ASC),
ADD INDEX `fk_trabaja_far_table_idx` (nombre ASC, Fnac ASC),
ADD CONSTRAINT `fk_trabaja_far_table`
  FOREIGN KEY (title_film, gener, dropyear)
  REFERENCES Pelicula (title, gener, dropYear), 
    ON DELETE NO ACTION
  ON UPDATE CASCADE

  FOREIGN KEY (nombre, Fnac)
  REFERENCES Empleado (nombre, Fnac), 
  ON DELETE NO ACTION
  ON UPDATE CASCADE
