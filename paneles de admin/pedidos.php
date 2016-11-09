<?php
session_start();
include_once ("cabecerausu2.php");



?>
  <html>
    <head>
       <style>
			.well{
				background-color: #98764b !important;
			}
	   </style>
    </head>
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
          if($result = $connection->query("SELECT p.idpedido AS Pedido, p.fecha AS Realizado, SUM(dp.cantidad) AS Articulos, SUM(dp.cantidad*dp.precio) AS Total FROM detallespedido dp, pedidos p WHERE p.codigou=".$_SESSION['id']." AND dp.idpedido = p.idpedido GROUP BY p.idpedido;")){
    ?>
	<div class="row">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-8">
			<div class="well">
				<table class="table table-striped">
					<thead>
					  <tr>

    <td><b>Pedido</td></b>
    <td><b>Realizado</td></b>
	<td><b>Art&iacute;culos</td></b>
	<td><b>Total</td></b>
</tr>
					</thead>
					<tbody>
      <?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td>".$obj->Pedido."</td>";
                   echo "<td>".$obj->Realizado."</td>";
				   
                    echo "<td>".$obj->Articulos."</td>";
                    echo "<td>".$obj->Total."</td>";
                   echo "<td><a href='verPedido.php?idpedido=".$obj->Pedido."'>Ver</a></td>";
                   echo "</tr>";
               }
          }
            
      ?>
   </tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>

</body>
</html>