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
    <title>Adminitrar compras</title>
  </head>
  <body>
    <?php
         //CREATING THE CONNECTION
         $connection = new mysqli("localhost", "root", "", "libreria");
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         //MAKING A SELECT QUERY
         /* Consultas de selección que devuelven un conjunto de resultados */
         if ($result = $connection->query("select * from compra;")) {
             printf("<p></p>", $result->num_rows);
              } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
         ?>
<table border="1" style="background-color:#58FAAC";>
  <tr>
    <td><b>Codigou</td>
    <td><b>codigol</td>
    <td><b>fecha_compra</td>
	<td><b>cantidad</td>
	
    <td><b><img src="eliminar.jpeg" width="70px" ></td>  </b>
		<td><b><a href="insertacompra.php"><img src="masd.png" width="50px" ></a>
		<td><b><a href="vercompra.php"><img src="ojo.png" width="50px" ></a>

    
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
		echo "<td><a href='eliminarcompra.php?id1=$obj->codigou&id2=$obj->codigol'><img width=26 src='eliminar.jpeg'/></a></td>";
          echo "</tr>";
      }
      ?>
	  
    </table>