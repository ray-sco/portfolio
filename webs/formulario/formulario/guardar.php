      <?php
 
      // Dirección o IP del servidor MySQL
      $host = "localhost";
 
      // Puerto del servidor MySQL
      $puerto = "3306";
 
      // Nombre de usuario del servidor MySQL
      $usuario = "root";
 
      // Contraseña del usuario
      $contrasena = "";
 
      // Nombre de la base de datos
      $baseDeDatos ="prueba";
 
      // Nombre de la tabla a trabajar
      $tabla = "datos";
 
      function Conectarse()
      {
         global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
 
         if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
         { 
            echo "Error conectando a la base de datos.<br>"; 
            exit(); 
            }
         else
         {
            echo "Listo, estamos conectados.<br>";
         }
         if (!mysqli_select_db($link, $baseDeDatos)) 
         { 
            echo "Error seleccionando la base de datos.<br>"; 
            exit(); 
         }
         else
         {
            echo "Obtuvimos la base de datos $baseDeDatos sin problema.<br>";
         }
      return $link; 
      } 
 
      $link = Conectarse();
 
      if($_POST)
      {
         $queryInsert = "INSERT INTO $tabla (nombre, correo, mensaje) VALUES ('".$_POST['nombre']."', '".$_POST['correo']."', '".$_POST['mensaje']."');";
 
         $resultInsert = mysqli_query($link, $queryInsert); 
 
         if($resultInsert)
         {
            echo "<strong>Se ingresaron los registros con exito</strong>. <br> <a href='index.html'>Volver</a>";
         }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }
 
      }
 
      $query = "SELECT nombre, correo, mensaje FROM $tabla;";
 
      $result = mysqli_query($link, $query); 
 
      ?>