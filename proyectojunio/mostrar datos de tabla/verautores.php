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
    <title>autores</title>
  </head>
  <body>
  <html>
    <head>
        <meta charset="utf-8">
 
    </head>
    <body>
   <body>

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
          if ($result = $connection->query("SELECT * FROM autor;")) {
              printf("<p><b>Autores registrados.</p>", $result->num_rows);
    }
    ?>
<table border="1" style="background-color:#58FAAC";>
  <tr>
    <td><b>Codigo</td></b>
    <td><b>Nombre</td></b>
    <td><b>Apellidos</td></b>

    </tr>
    
      <?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td>".$obj->codigo."</td>";
                   echo "<td>".$obj->nombre."</td>";
                   
                   echo "<td>".$obj->apellidos."</td>";
                   
                   echo "</tr>";
               }
      ?>

    </table>

</body>
</html>