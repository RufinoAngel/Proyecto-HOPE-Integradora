--Creación de trigger inserta una nueva fila en la tabla usuarios_historial.
CREATE DEFINER=`root`@`localhost` TRIGGER `usuarios` BEFORE INSERT ON `usuarios` FOR EACH ROW BEGIN 
INSERT INTO usuarios_historial 
(usuario_id, nombre, correo, contrasenna,tipo,telefono,fecha_registro,estatus,id_albergue, accion) 
VALUES 
(new.usuario_id, new.nombre, new.correo, new.contrasenna,new.tipo,new.telefono,new.fecha_registro,
new.estatus,new.id_albergue, 'Before insert'); 
END

--El trigger inserta automáticamente una fila en la tabla usuarios_historial para registrar 
--la acción que acaba de ocurrir. En este caso, registra los detalles que realiza en la tabla
-- de usuarios y la acción realizada ('After insert'). 
CREATE DEFINER=`root`@`localhost` TRIGGER `usuarios_after` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN 
INSERT INTO usuarios_historial 
(usuario_id, nombre, correo, contrasenna,tipo,telefono,fecha_registro,estatus,id_albergue, accion) 
VALUES 
(new.usuario_id, new.nombre, new.correo, new.contrasenna,new.tipo,new.telefono,new.fecha_registro,
new.estatus,new.id_albergue, 'After insert');  
END

--El trigger inserta automáticamente una fila en la tabla usuarios_historial para registrar la 
--acción que acaba de ocurrir. En este caso, registra los detalles que realiza en la tabla de 
--usuarios y la acción realizada (‘Before update').
CREATE DEFINER=`root`@`localhost` TRIGGER `usuarios_before_update` BEFORE UPDATE ON `usuarios` FOR EACH ROW BEGIN 
INSERT INTO usuarios_historial 
(usuario_id, nombre, correo, contrasenna,tipo,telefono,fecha_registro,estatus,id_albergue, accion) 
VALUES 
(old.usuario_id, old.nombre, old.correo, old.contrasenna,old.tipo,old.telefono,old.fecha_registro,
old.estatus,old.id_albergue, 'Before update');  
END