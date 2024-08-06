# DIAGRAMS
---
En este apartado se mostrara el diagrama entidad relación basandonos en los requerimientos funcionales de la aplicacion, asi obteniendo las cardinalidades para al final poder gestionar la base de datos.
Se realizo una nueva actualización sobre el diagrama, tambien se subio un archivo en donde se creo paso a paso.


![Diagrama](/Databases/Diagrams/Diagrama.png)<br>
**1.-Usuario:** El usuario se registra con datos personales como nombre, apellidos, fecha de nacimiento y edad, tambien generando una contraseña

Del usuario se heredaran otras tres entidades las cuales son: 

**Administrador:** Es quien estara adiministrando las cuentas

**Voluntariado:** Sera la persona que quien auxilie a la persona que necesitara a la persona sin hogar, al igual sera quien pueda participar en actividades para ayuda de algun albergue

**Persona sin hogar:** Persona que necesitara de ayuda, se le asignara aparte su id_usuario y se tomaran los datos personales

**2.-Perfil:** El usuario ingresa a su perfil en busqueda de un albergue cercano
 
**3.-Albergues:** Esta es la busqueda de albergues mas cercanos que pueda encontrar el usuario, se le proporcionara el numero de telefono del albegue, la ubicacion y la disponibilidad de vacantes, para realizar la solicitud.

**4.-Encargado:** Los albergues tendran a una persona encargada de validar las solicitudes de los usuarios

**5.-Notificacion:** El perfil del albergue enviara la notificacion o validacion de los usuarios, y esta sera enviada al usuario para hacerle saber la validacion del albergue

**6.-Reportes:** El usuario tendra un apartado para poder realizar reportes o comentarios si estuvo en algun desacuerdo con el servicio brindado

**7.- Donante:** Este apartado o entidad sera exclusivamente solo para donar, no necesariamente tendra que crear una cuenta. Sera una entidad externa. Este puede realizar una donacion ya sea monetaria, alimenticia o medicamento y de vestimenta

**8.- Calendario:** Cada albergue tendra su propio calendario de disponiblilidad, esto sera para saber cuantas vancantes tendra.



