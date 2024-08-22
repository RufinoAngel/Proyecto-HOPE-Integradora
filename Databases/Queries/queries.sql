--Seleccionar los usuarios que solo son donantes.
SELECT tipo_usuario FROM usuarios WHERE tipo_usuario='donante';

--Seleccionar las personas_sin hogar que sean mayores a 30
SELECT*FROM personas_sin_hogar where edad>30;

--Seleccionar los albergues que tengan tres o mas de tres vacantes disponibles
SELECT 
        `albergue`.`albergue_id` AS `albergue_id`,
        `albergue`.`nombre` AS `nombre`,
        `albergue`.`vacantes` AS `vacantes`,
        `albergue`.`dirección` AS `dirección`
    FROM
        `albergue`
    WHERE
        (`albergue`.`vacantes` >= 3)

--Mostrar la suma de total de las donaciones
    SELECT 
        SUM(`donaciones`.`cantidad`) AS `total_donaciones`
    FROM
        `donaciones`

--Mostrar a los usuarios que solo son administradores
    SELECT 
        `usuarios`.`usuario_id` AS `usuario_id`,
        `usuarios`.`nombre` AS `nombre`,
        `usuarios`.`correo` AS `correo`,
        `usuarios`.`contrasenna` AS `contrasenna`,
        `usuarios`.`tipo` AS `tipo`,
        `usuarios`.`telefono` AS `telefono`,
        `usuarios`.`fecha_registro` AS `fecha_registro`,
        `usuarios`.`estatus` AS `estatus`,
        `usuarios`.`id_albergue` AS `id_albergue`
    FROM
        `usuarios`
    WHERE
        (`usuarios`.`tipo` = 'admi')