--creacion de las tablas para base de datos
CREATE SCHEMA `albergue` ;

CREATE TABLE `albergue`.`usuarios` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `tipo` ENUM('donante', 'administrador') NULL,
  `telefono` VARCHAR(45) NULL,
  `fecha_registro` DATE NOT NULL,
  PRIMARY KEY (`usuario_id`));

CREATE TABLE `albergue`.`donaciones` (
  `donacion_id` INT NOT NULL AUTO_INCREMENT,
  `tipo_donacion` ENUM('monetaria', 'ropa', 'alimenticia') NULL,
  `fecha_donacion` VARCHAR(45) NULL,
  `cantidad` DECIMAL(10,2) NULL,
  PRIMARY KEY (`donacion_id`));

CREATE TABLE `albergue`.`reportes` (
  `id_reporte` INT NOT NULL AUTO_INCREMENT,
  `contenido` VARCHAR(250) NULL,
  `fecha_hora` DATETIME NOT NULL,
  PRIMARY KEY (`id_reporte`));

CREATE TABLE `albergue`.`albergue` (
  `albergue_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `vacantes` INT NOT NULL,
  `dirección` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`albergue_id`));

CREATE TABLE `albergue`.`encargado` (
  `encargado_id` INT NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `edad` INT NOT NULL,
  PRIMARY KEY (`encargado_id`));

CREATE TABLE `albergue`.`calendario` (
  `calendario_id` INT NOT NULL AUTO_INCREMENT,
  `disponibilidad` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`calendario_id`));

CREATE TABLE `proyecto_albergue`.`donante` (
  `id_donante` INT NOT NULL,
  `nombre_donante` VARCHAR(45) NULL,
  `tipo_donacion` ENUM('monetaria', 'alimenticia', 'ropa') NULL,
  `donantecol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_donante`));

CREATE TABLE `albergue`.`persona_sin_hogar` (
  `persona_id` INT NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(45) NOT NULL,
  `curp` VARCHAR(18) NOT NULL,
  `enfermedades` ENUM('si', 'no') NOT NULL,
  `tipo_enfermedad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`persona_id`));

CREATE TABLE `albergue`.`habilidades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(45) NOT NULL,
  `edad` INT NOT NULL,
  `numero_identificador` INT NOT NULL,
  `habilidades` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `albergue`.`encuesta` (
  `id_encuesta` INT NOT NULL AUTO_INCREMENT,
  `satisfaccion` ENUM('1', '2', '3', '4', '5') NULL,
  `mejorar` VARCHAR(250) NULL,
  `comentarios` VARCHAR(250) NULL,
  PRIMARY KEY (`id_encuesta`));

--Crecion de una funcion almacenada para realizar la suma de las donaciones que ha realizado un 
--usuario en especifico
  CREATE DEFINER=`root`@`localhost` FUNCTION `contar_donaciones`(usuario_id INT) RETURNS int(11)
    DETERMINISTIC
BEGIN
    DECLARE cantidad INT;
    SELECT COUNT(*) INTO cantidad
    FROM donaciones
    WHERE usuario_id = usuario_id;
    RETURN cantidad;
END
--Ceación de una función almaacenada para poder ingresar o registrar los albergues
CREATE DEFINER=`root`@`localhost` FUNCTION `insertar_albergues`(
    nombre VARCHAR(100),
    vacantes INT,
	dirección VARCHAR(50)) RETURNS varchar(255) CHARSET utf8mb4
    DETERMINISTIC
BEGIN
    DECLARE mensaje VARCHAR(255);
    INSERT INTO albergue (nombre, vacantes, dirección)
    VALUES (nombre, vacantes, dirección);
    IF ROW_COUNT() > 0 THEN
        SET mensaje = 'Albergue registrado correctamente';
    ELSE
        SET mensaje = 'Albergue no registrado';
    END IF;

    RETURN mensaje;
END