<?php

class Funciones {

    /**
     * Función que establece la conexión a la base de datos voluntarios3,
     * si no puede conectarse, devuelve el mensaje de error
     * @return string
     */
    public function accesoBD() {
        
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=voluntarios3', 'dwes', 'dwes');
            $conexion->exec("set names utf8");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mensaje="Conexión establecida correctamente con la base de datos";
        } catch (Exception $ex) {
            $mensaje = "Error: " . $ex->getMessage();
        }

        return $mensaje;
    }

    /**
     * Función que muestra por pantalla el login y el email de todos
     * los anunciantes registrados en la base de datos
     * @return array
     */
    public function getVoluntarios() {
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=voluntarios3', 'dwes', 'dwes');
            $conexion->exec("set names utf8");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }

        $sql = "SELECT login, email FROM anunciantes";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        //Guardamos los datos de la consulta en un array
        $resultado = $sentencia->fetchAll();
        //Si existen datos, devolvemos el array
        if ($resultado) {
            return $resultado;
            //Si no, avisamos al usuario
        } else {
            return "<p class='error'>No existen usuarios en la base de datos</p>";
        }
    }

    /**
     * Función que muestra la fecha y el contenido de todos
     * los anuncios que sean públicos
     * @return array
     */
    public function getAnunciosPublicos() {
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=voluntarios3', 'dwes', 'dwes');
            $conexion->exec("set names utf8");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }

        $sql = "SELECT fecha, contenido FROM anuncios WHERE privado=0";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        //Guardamos los datos en un array
        $resultado = $sentencia->fetchAll();
        //Si existen datos, devolvemos el array
        if ($resultado) {
            return $resultado;
            //Si no, avisamos al usuario
        } else {
            return "<p class='error'>No existen anuncios públicos en la base de datos</p>";
        }
    }

    /**
     * Función que muestra el total de anuncios públicos y el total de anuncios privados
     * del voluntario con login pasado por parámetro 
     * @param string
     * @return string
     */
    public function getParticipacionVoluntarios($login) {
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=voluntarios3', 'dwes', 'dwes');
            $conexion->exec("set names utf8");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            return "Error: " . $ex->getMessage();
        }
        
        //Primero consultamos si el login existe
        $sql = 'SELECT * FROM anunciantes WHERE login=:login';
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(':login', $login);
        $resultado->execute();
        
        //Si existe un usuario con ese login
        if ($resultado->rowCount() == 1) {
            //Consultamos si son privados o no los anuncios de dicho usuario
            $sql = "SELECT privado FROM anuncios WHERE autor='$login'";
            $resultado = $conexion->query($sql);
            //Si existen anuncios
            if ($resultado) {
                $totalPublicos = 0;
                $totalPrivados = 0;
                //Mientras encuentre anuncios
                while ($registro = $resultado->fetch()) {
                    //Si es privado, incrementamos el total de anuncios privados en uno en cada vuelta de bucle
                    if ($registro['privado'] == 0) {
                        $totalPublicos++;
                    }
                    //Si es público, incrementamos el total de anuncios públicos en uno en cada vuelta de bucle
                    if ($registro['privado'] == 1) {
                        $totalPrivados++;
                    }
                }
                return "<h2>Participación del voluntario " . $login . ":</h2><table border='1'><thead><tr><th>Número de anuncios públicos</th><th>Número de anuncios privados</th></tr></thead><tr><td align=center>" . $totalPublicos . "</td><td align=center>" . $totalPrivados . "</td></tr></table>";
            }
            //Si el login no existe, avisamos al usuario
        } else {
            return "<p class='error'>No existe usuario con ese login</p>";
        }
    }

}
