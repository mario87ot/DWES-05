# DWES-05

Vamos a usar la base de datos de la tarea 3 (voluntarios3.sql).
Deberás utilizar PHP5 SOAP para crear un servicio web con las siguientes funciones que presentan información a los clientes de nuestra base de datos:
- accesoBD: No recibe parámetros, establece la conexión a la BD y devuelve error en caso de no poder realizarse. 
- getVoluntarios: No recibe parámetros y devuelve el listado con los login y correos electrónicos de los voluntarios registrados en la base de datos. 
- getAnunciosPublicos: No recibe parámetros y devuelve el listado de la fecha y el contenido de los anuncios públicos de todos los voluntarios. 
- getParticipacionVoluntarios: Recibe como parámetro el login del autor, comprueba su existencia y en caso de existir devuelve el número de anuncios públicos y el número de anuncios privados que ha creado. 
Todas estas funciones deben estar declaradas como públicas en el fichero llamado funciones.php. En el caso de necesitar más funciones, las declararemos como privadas.
La declaración del servicio web se realizará en el archivo servicio.php mediante el uso del archivo funciones.wsdl previamente creado a partir de funciones.php.
Además, deberás crear el fichero cliente.php, haciendo uso del servicio programado anteriormente, en el que se mostrará lo siguiente:
- En primer lugar el texto "Voluntarios registrados:" y a continuación la tabla con la información de los voluntarios (login y email). Usa para ello la función getVoluntarios. 
- A continuación de esto, el texto " Anuncios públicos:" seguido de la tabla con la información de todos los anuncios públicos (fecha y contenido). Usa para ello la función getAnunciosPublicos. 
- Por último, el texto " Consulta de participación:" seguido de un campo de texto para introducir el login del voluntario y un formulario que contendrá un botón "Consulta participación". Pulsando el botón, si el voluntario no existe se mostrará un anuncio de error, y si sí existe se mostrará una tabla con el título “Participación del voluntario login:” seguido de una tabla que muestre el número de anuncios públicos del voluntario y el número de anuncios privados del voluntario. 
Como veis, la aplicación en sí es sencilla, pero la introducción del uso de servicios web puede ser complicada. Por ello, a continuación os indico los pasos que deberíais hacer para que el desarrollo de la tarea discurra sin problemas:
- Paso 1: Desarrollo del archivo funciones.php, incluyendo las funciones anteriores y todas las que creamos necesarias. Añadiremos además la documentación de la funciones (recordad que si al inicio de la función ponéis /** y clicáis Enter, os genera la estructura de comentarios de forma automática). 
- Paso 2: Generación del archivo funciones.wsdl. Para ello necesitaréis la clase WDSLDocument.php (que encontraréis por ejemplo en esta dirección: https://github.com/sarcastron/wsdlDocument); y además necesitaréis el código PHP de generación de wsdl que encontrarás en el último apartado de los apuntes de la unidad 5
      
Una vez que ejecutéis el archivo de generación os aparecerá la documentación de las funciones públicas del archivo funciones.php y para ver el archivo xml debéis de pulsar botón derecho del ratón y seleccionar “Ver código fuente de la página”. Entonces copiáis todo el texto desde que pone <?xml hasta el final y lo pegáis en el archivo funciones.wsdl. 
- Paso 3: Creáis el archivo servicio.php donde declaráis el servicio web a partir del archivo funciones.wsdl. Recordad usar rutas detectadas automáticamente (mediante las variables de $_SERVER) y no absolutas, ya que la corrección de la tarea se realiza en mi ordenador y la ruta seguramente varíe. 
- Paso 4: Creáis el archivo cliente.php donde solicitáis ser clientes del servicio web anteriormente declarado y realizáis los accesos a las funciones públicas necesarias. 
