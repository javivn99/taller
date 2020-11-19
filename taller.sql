CREATE TABLE IF NOT EXISTS `taller`.`TALLER` (
  `NIF` INT(3) NOT NULL,
  `NOMBRE` VARCHAR(45) NOT NULL,
  `LOCALIDAD` VARCHAR(60) NOT NULL,
  `COD_POSTAL` INT(5) NOT NULL,
  `TLF` INT(9) NOT NULL,
  PRIMARY KEY (`NIF`),
  UNIQUE INDEX `NIF_UNIQUE` (`NIF` ASC) VISIBLE,
  UNIQUE INDEX `TLF_UNIQUE` (`TLF` ASC) VISIBLE)
ENGINE = InnoDB;

INSERT INTO  `taller`.`TALLER` (`NIF`, `NOMBRE`, `LOCALIDAD`, `COD_POSTAL`, `TLF`) VALUES
(1, 'COCHE REPAIR',  'VALLECAS', 28031, 983654710),
(2, 'ARREGLA TODO', 'VALLADOLID', 47400, 983201364),
(3, 'TALLER PISTON', 'SALAMANCA', 37002, 983429730);


CREATE TABLE IF NOT EXISTS `taller`.`MECANICO` (
  `DNI_M` VARCHAR(9) NOT NULL,
  `NOMBRE` VARCHAR(20) NOT NULL,
  `APELLIDOS` VARCHAR(45) NOT NULL,
  `EMAIL_M` VARCHAR(80) NOT NULL,
  `CONTRASEÑA_M` VARCHAR(80) NOT NULL,
  `F_NACIMIENTO` DATE NOT NULL,
  PRIMARY KEY (`DNI_M`),
  UNIQUE INDEX `M_EMAIL_UNIQUE` (`EMAIL_M` ASC) VISIBLE)
ENGINE = InnoDB;

INSERT INTO  `taller`.`MECANICO` (`DNI_M`, `NOMBRE`, `APELLIDOS`, `EMAIL_M`,  `CONTRASEÑA_M`, `F_NACIMIENTO`) VALUES
('12549876S', 'EMILIO', 'NUÑEZ DE LA SIERRA', 'admin1@gmail.com','admin1', '1985-05-24'),
('19865478E', 'RAUL', 'SAEZ HERNANDEZ', 'admin2@gmail.com','admin2', '1999-12-03'),
('14783256A', 'SARA', 'REDONDO LOPEZ', 'admin3@gmail.com','admin3', '1974-08-14'),
('10365487M', 'PAULA', 'CUADRADO SERRANO', 'admin4@gmail.com','admin4', '1988-01-01'),
('12563048U', 'ARTURO', 'NIETO ROCHAS', 'admin5@gmail.com','admin5', '1992-11-13'),
('12498654P', 'EZEQUIEL', 'FERNANDEZ ESPINOSA', 'admin6@gmail.com','admin6', '1995-07-05');

CREATE TABLE IF NOT EXISTS `taller`.`TALLER_MECANICO` (
  `NIF` INT(3) NOT NULL,
  `DNI_M` VARCHAR(9) NOT NULL,
  CONSTRAINT  `T_M_nif` FOREIGN KEY (`NIF`) REFERENCES `TALLER` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT  `T_M_dni` FOREIGN KEY (`DNI_M`) REFERENCES `MECANICO` (`DNI_M`) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY(`NIF`,`DNI_M`))
ENGINE = InnoDB;

INSERT INTO `taller`.`TALLER_MECANICO`(`NIF`,`DNI_M`) VALUES
('1','12549876S'), ('1','19865478E'), ('2','14783256A'), 
('2','10365487M'), ('3','12563048U'), ('3','12498654P');

CREATE TABLE IF NOT EXISTS `taller`.`VEHICULO` (
  `MATRICULA` VARCHAR(7) NOT NULL,
  `INCIDENCIA` VARCHAR(100) NOT NULL,
  `COSTE` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`MATRICULA`))
ENGINE = InnoDB;

INSERT INTO  `taller`.`VEHICULO` (`MATRICULA`, `INCIDENCIA`, `COSTE`) VALUES
('5874LSD', 'CAMBIO DE NEUMATICOS', '50€'),
('2654YTU', 'CAMBIO DE ACEITE', '10€'),
('9786BPM', 'CAMBIO DE PASTILLAS DE FRENO', '65€'),
('9345FQV', 'CAMBIO DE PARACHOQUES FRONTAL Y LUNA FRONTAL', '1599€'),
('8976CNV', 'CAMBIO DE RETROVISOR DERECHO', '320€'),
('0982HTY', 'LIMPIEZA DEL TUBO DE ESCAPE', '225€'),
('2345LKJ', 'CAMBIO LIQUIDO ANTI-CONGELANTE', '15€');

CREATE TABLE IF NOT EXISTS `taller`.`MECANICO_VEHICULO` (
 `DNI_M` VARCHAR(9) NOT NULL,
 `MATRICULA` VARCHAR(7) NOT NULL,
 CONSTRAINT  `FK_DNI_M` FOREIGN KEY (`DNI_M`) REFERENCES `MECANICO` (`DNI_M`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT  `FK_MATR_V` FOREIGN KEY (`MATRICULA`) REFERENCES `VEHICULO` (`MATRICULA`) ON DELETE CASCADE ON UPDATE CASCADE,
 PRIMARY KEY (`MATRICULA`,`DNI_M`))
ENGINE = InnoDB;

INSERT INTO  `taller`.`MECANICO_VEHICULO` (`DNI_M`, `MATRICULA`) VALUES
('12549876S', '5874LSD'),
('19865478E', '2654YTU'),
('14783256A', '9786BPM'),
('10365487M', '9345FQV'),
('12563048U', '8976CNV'),
('12549876S', '0982HTY'),
('12498654P', '2345LKJ');

CREATE TABLE IF NOT EXISTS `taller`.`CLIENTE` (
  `DNI_C` VARCHAR(9) NOT NULL,
  `NOMBRE` VARCHAR(20) NOT NULL,
  `APELLIDOS` VARCHAR(45) NOT NULL,
  `EMAIL_C` VARCHAR(80) NOT NULL,
  `CONTRASEÑA_C` VARCHAR(80) NOT NULL,
  `F_NACIMIENTO` DATE NOT NULL,
  `MATRICULA` VARCHAR(7) NOT NULL,
  PRIMARY KEY (`DNI_C`),
  CONSTRAINT  `FK_MATR_C` FOREIGN KEY (`MATRICULA`) REFERENCES `VEHICULO` (`MATRICULA`) ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE INDEX `C_EMAIL_UNIQUE` (`EMAIL_C` ASC) VISIBLE)
ENGINE = InnoDB;

INSERT INTO  `taller`.`CLIENTE` (`DNI_C`, `NOMBRE`, `APELLIDOS`, `EMAIL_C`, `CONTRASEÑA_C`, `F_NACIMIENTO`, `MATRICULA`) VALUES
('14683000R', 'ERNESTO', 'URRUTIA GONZALEZ', 'user1@gmail.com', 'user1', '1977-01-02', '5874LSD'),
('15486548B', 'BRAULIO', 'VALDEMORO MARTIN', 'user2@gmail.com','user2', '1988-12-30', '2654YTU'),
('15487965J', 'INES', 'YLLERA MENDEZ', 'user3@gmail.com','user3', '1970-07-10', '9786BPM'),
('16541635T', 'EMMA', 'MARTIN SORIA', 'user4@gmail.com','user4', '1998-09-08', '9345FQV'),
('15487896P', 'RICK', 'VEGAS RODRIGUEZ', 'user5@gmail.com','user5', '1990-06-06', '8976CNV'),
('15687868L', 'ARNALDO', 'RUIPEREZ FUERTES', 'user6@gmail.com','user6', '1999-10-25', '0982HTY'),
('14300085K', 'CAROLO', 'SANCHEZ MARTINEZ', 'user7@gmail.com','user7', '1984-01-09', '2345LKJ');

CREATE TABLE IF NOT EXISTS `taller`.`RECAMBIO` (
  `ID` VARCHAR(3) NOT NULL,
  `PRODUCTO` VARCHAR(80) NOT NULL,
  `PRECIO` VARCHAR(15) NOT NULL,
  `NIF` INT(3) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT  `FK_NIF_RECAMB` FOREIGN KEY (`NIF`) REFERENCES `TALLER` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `taller`.`RECAMBIO`(`ID`, `PRODUCTO`, `PRECIO`, `NIF`) VALUES
('1','PASTILLAS DE FRENO','100€', '1'), ('2','TAPONES PARA LLANTA','3€', '1'), ('3','ACEITE PARA MOTOR','35€', '1'), 
('4','LIQUIDO ANTI-CONGELANTE','40€', '1'), ('5','LLANTAS DEPORTIVAS','600€', '1'),  ('6','LIMPIA PARABRISAS','25€', '2'), 
('7','JUNTA DE LA CULATA','600€', '2'), ('8','ESCAPE WALKER','90€', '2'), ('9','VOLANTE DE COMPETICION','55€', '2'), 
('10','NEUMATICOS MICHELIN','300€', '3'), ('11','NEUMATICOS PIRELLI','475€', '3'), ('12','DISCOS DE FRENO BREMBO','240€', '3'), 
('13','LUZ DE POSICION','1€', '3');