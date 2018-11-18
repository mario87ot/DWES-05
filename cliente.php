<?php
$cliente = new SoapClient("http://localhost/tarea5/funciones.wsdl");

//Comprobamos la función accesoBD para ver si conecta correctamente a la BD
$mensaje = $cliente->accesoBD();
//echo $mensaje;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DWES Tarea 5 - Servicios Web con PHP 5 SOAP</title>
    <link type="text/css" href="css/estilos.css" rel="stylesheet" />
</head>

<body>
	<div id="contenedor">
	    <h1>Tarea 5 DWES - Servicios Web con PHP 5 SOAP</h1>
	    <br>
	    <h2>VOLUNTARIOS REGISTRADOS</h2>
	    
<?php
//Llamamos a la función getVoluntarios
$resultado = $cliente->getVoluntarios();
//Mostramos los datos en una tabla
echo "<table border='1'>";
echo "<thead><tr><th>Login</th><th>Email</th></tr>";
foreach ($resultado as $valor) {
    echo "<tr><td>" . $valor['login'] . "</td><td>" . $valor['email'] . "</tr>";
}
echo "<table>";


//Llamamos a la función getAnunciosPublicos
$anunciosPublicos = $cliente->getAnunciosPublicos();
//Mostramos los datos en una tabla
echo "<h2>ANUNCIOS PÚBLICOS</h2>";
echo "<table border='1'>";
echo "<thead><tr><th>Fecha</th><th>Contenido</th></tr>";
foreach ($anunciosPublicos as $valor) {
    echo "<tr><td>" . $valor['fecha'] . "</td><td>" . $valor['contenido'] . "</tr>";
}
echo "</table>";
echo "<br>";


//Creamos el formulario de Consulta participación
echo "<form action='cliente.php' name='formulario' method='post'>";
?>
<div class="divConsulta">
Consulta de participación<input type='text' name='login' id='login' value='<?php if (isset($_POST['login'])) echo $_POST['login'] ?>'>
<?php
echo "<input type='submit' name='consultar' value='Consulta participación' class='botonConsulta'>";
echo "</form>";
echo "<br>";
?>
</div>

<?php

//Si se ha clicado en el botón Consulta participación del formulario
if (isset($_POST['consultar'])) {
    //Guardamos el login
    $login = $_POST['login'];
    /* Llamamos a la función getParticipacionVoluntarios pasándole por parámetro el 
      login introducido y mostramos los datos o error en caso de que no exista ese login */
    $mensaje = $cliente->getParticipacionVoluntarios($login);

    echo $mensaje;
}
?>
  <footer>Mario David Ordóñez Tercero - Tarea 5 DWES - 2017/2018</footer>
	</div>
</body>
</html>


