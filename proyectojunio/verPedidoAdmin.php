<?php
session_start();
include_once ("cabeadmin.php");

include_once("./db_configuration.php");


?>
  <html>
    <head>
       <style>
	.navbar{
		background-color: #98764b !important;
	}
	.navbar a{
		color:#ffffff;
	}
	.navbar a:hover{
		color:#ffffff;
		background-color: #381e0b !important;
	}
</style>
    </head>
    <body>



    <?php

          //CREATING THE CONNECTION
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
          //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if(isset($_REQUEST['idpedido']) && $result = $connection->query("SELECT dp.iddetalle AS ID, l.isbn AS ISBN, l.titulo AS Titulo, dp.cantidad AS Cantidad, dp.precio AS Precio, (dp.cantidad*dp.precio) AS Total FROM detallespedido dp, libro l WHERE dp.idpedido = ".$_REQUEST['idpedido']." AND l.codigol=dp.codigol;")){
    ?>
<div class="row">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-8">
			<div class="well">
				<table class="table table-striped">
					<thead>
					  <tr>
    <td><b>ISBN</td></b>
    <td><b>T&iacute;tulo</td></b>
	<td><b>Cantidad</td></b>
	<td><b>Precio</td></b>
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
                   echo "<td>".$obj->ISBN."</td>";
                   echo "<td>".$obj->Titulo."</td>";
				   
                    echo "<td>".$obj->Cantidad."</td>";
                    echo "<td>".$obj->Precio."</td>";
                    echo "<td>".$obj->Total."</td>";
					echo " <td><a href='modificardp.php?id=".$obj->ID."'><img src='editar.png' width='70px' ></td>";
			echo " <td><a href='eliminardp.php?id=".$obj->ID."'><img src='eliminar.jpeg' width='70px' ></a></td>";
                   echo "</tr>";
               }
          }
            
      ?>
      </tbody>
      <td> 
		<a href="paneltotal.php" target="_self"> <input type="button" name="boton" value="Volver atras" /> </a></td>
				</table>
				</table>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>

</body>
</html>
