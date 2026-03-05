<!DOCTYPE html>
<html>
	<head>
		<title>Formulario De Contacto</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	</head>
   <body>
      <img src="img/icono.png" alt="logo de Prometheus"><br>
   </body>
</html>
      <?php
 
      // Dirección o IP del servidor MySQL
      $host = "localhost";
 
      // Puerto del servidor MySQL
      $puerto = "3306";
 
      // it de usuario del servidor MySQL
      $usuario = "root";
 
      // Contraseña del usuario
      $contrasena = "";
 
      // it de la base de datos
      $baseDeDatos ="helpdesk";
 
      // it de la tabla a trabajar
      $tabla = "reportes";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "<h2> Error conectando a la base de datos.</h2><br>"; 
            exit(); 
            }
         else
         {
            echo "<h2>Listo, estamos conectados.</h2><br>";
         }  
         if (!mysqli_select_db($link, $baseDeDatos)) 
         { 
            echo "Error seleccionando la base de datos.<br>"; 
            exit(); 
         }
         else
         {
            echo "<h2>Obtuvimos la base de datos $baseDeDatos sin problema.</h2><br>";
         }
      return $link; 
      } 
 
      $link = Conectarse();
 
      if($_POST)
      {
         $queryInsert = "INSERT INTO $tabla (it, dni, mensaje) VALUES ('".$_POST['it']."', '".$_POST['dni']."', '".$_POST['mensaje']."');";
 
         $resultInsert = mysqli_query($link, $queryInsert); 
 
         if($resultInsert)
         {
            echo "<h2>Se ingresaron los registros con exito.</h2> <br> <h2><a href='index.html'>Volver</a></h2>";
         }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }
 
      }
 
      $query = "SELECT it, dni, mensaje FROM $tabla;";
 
      $result = mysqli_query($link, $query); 
 
      ?>