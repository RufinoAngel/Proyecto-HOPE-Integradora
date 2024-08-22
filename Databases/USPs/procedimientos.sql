--Procediento almacemado para la eliminación de usuarios que se encuentran inactivos.
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuariosInactivos`()
BEGIN
    DELETE FROM usuarios
    WHERE estatus = 'inactivo';
END

--Procedimiento almacenado para buscar un reporte con una hora en especifico
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_reportes_por_hora`(IN p_hora TIME)
BEGIN
    SELECT *
    FROM reportes
    WHERE TIME(hora) = p_hora;
END

--Procedimiento almacenado para ingrear los datos o nuevos encargados.
CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_encargados`(IN nombre_completo VARCHAR(50),
    IN telefono VARCHAR(50),
    IN correo VARCHAR(50),
    IN edad INT,
    IN albergue_albergue_id INT
    )
BEGIN
    INSERT INTO encargado (nombre_completo,telefono, correo, edad,albergue_albergue_id)
    VALUES (nombre_completo,telefono, correo, edad,albergue_albergue_id);
END