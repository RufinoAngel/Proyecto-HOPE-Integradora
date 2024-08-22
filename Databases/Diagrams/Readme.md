# DIAGRAMS ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
---
En este apartado se mostrara el diagrama entidad relación basandonos en los requerimientos funcionales de la aplicacion, asi obteniendo las cardinalidades para al final poder gestionar la base de datos.
Se realizo una nueva actualización sobre el diagrama, tambien se subio un archivo en donde se creo paso a paso.
 También se agregara el Modelo Entidad Relación de Workbench


![Diagrama](/Databases/Diagrams/Diagrama_ER.png)<br>
**1.-Usuario:** El usuario se registra con datos personales como nombre, apellidos, fecha de nacimiento y edad, tambien generando una contraseña

Del usuario se heredaran otras dos entidades las cuales son: 

**Administrador:** Es quien estara adiministrando las cuentas

**Donante:** Este apartado o entidad sera exclusivamente solo para donar, no necesariamente tendra que crear una cuenta. Sera una entidad externa. Este puede realizar una donacion ya sea monetaria, alimenticia o medicamento y de vestimenta


**1.-Persona sin hogar:** Persona que necesitara de ayuda, se le asignara aparte su id_usuario y se tomaran los datos personales

**2.- Habilidades:** Se creara un ofrmulario de habilidades dónde la persona que ayudara registre las habilidades que posee la persona sin hogar para conseguirle algun trabajo.

**2.- Encuesta:** Se le hara una encuesta a la persona sin hogar para saber que satisfacción tuvo con el servicio y comentarios para mejorar.

**3.-Albergues:** Esta es la busqueda de albergues mas cercanos que pueda encontrar el usuario, se le proporcionara el numero de telefono del albegue, la ubicacion y la disponibilidad de vacantes, para realizar la solicitud.

**4.-Encargado:** Los albergues tendran a una persona encargada de validar las solicitudes de los usuarios

**5.-Donaciones:** Se administraran las donaciones que donen los usuarios

**6.-Reportes:** El usuario tendra un apartado para poder realizar reportes o comentarios si estuvo en algun desacuerdo con el servicio brindado

**7.- Calendario:** Cada albergue tendra su propio calendario de disponiblilidad, esto sera para saber cuantas vancantes tendra.

   ## Estructura de Archivos
   >|-Databases <br>
   >|__ Backups<br>
   >|__ Data Dictionary<br>
   >**|__ Diagrams**<br>
   >|__ Queries <br>
   >|__Scripts<br>
   >|__Triggers<br>
   >|__USPs<br>
   <br> 

   |Integrante|Contacto|Rol|Observaciones|
   |----------|--------|---|-------------|
   |Balderas Gomez Dulce|[@DulceBal](https://github.com/Josue-Martinez-Otero)|Líder de Databases|✅ Revisado y aprobado.|
   |Vargas Galindo Guadalupe Idai  |[@IdaiVG](https://github.com/IdaiVG)|Desarrollora Backend y encargada de Documentación|❌ Sin revisar.|
   |Rufino Mendoza Ángel de Jesús|[@RufinoAngel](https://github.com/RufinoAngel)|Desarrollador Frontend|❌ Sin revisar|


