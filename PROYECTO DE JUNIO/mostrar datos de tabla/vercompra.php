<?php
include_once ("cabeadmin.php");

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla compra</title>
  </head>
  <body>
  <html>
    <head>
   
        
        <!-- Importamos nuestra hoja de estilos CSS -->
        <link rel="stylesheet" href="estilos.css" />
    </head>
    <body>
   <body>
<
    <?php

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "root", "", "Libreria");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM compra;")) {
              printf("<p></p>", $result->num_rows);
    }
    ?>
<table border="1" style="background-color:#58FAAC";>
  <tr>
    <td><b>Codigo usuario</td></b>
    <td><b>codigo libro</td></b>
    <td><b>fecha</td></b>
	<td><b>cantidad</td></b>
	

    </tr>
    <tr>
      <?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td>".$obj->codigou."</td>";
                   echo "<td>".$obj->codigol."</td>";
                    echo "<td>".$obj->fecha_compra."</td>";
                   echo "<td>".$obj->cantidad."</td>";
                   
                   echo "</tr>";
               }
      ?>

    </table>

</body>
</html>