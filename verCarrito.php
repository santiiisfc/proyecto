<?php

session_start();
include_once ("cabecerausu2.php");
include_once("./db_configuration.php");
include_once("tema_index.php");




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
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          $lista = "";
		if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $codigo => $cantidad){
            if($lista!=""){
                $lista.=",";
            }
            $lista.=$codigo;
        }
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * FROM libro where codigol IN (".$lista.") ;")) {
              printf("<p></p>", $result->num_rows);
    }
    ?>
<div class="row">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-8">
			<div class="well">
				<table class="table table-striped">
					<thead>
					  <tr>
    <td><b>Codigo</td></b>
    <td><b>Nombre</td></b>
	<td><b>Cantidad</td></b>
	<td><b>Precio</td></b>
	<td><b>Total</td></b>
	
  </tr>
					</thead>
					<tbody>
      <?php
               //FETCHING OBJECTS FROM THE RESULT SET
               //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                $totalPedido = 0;
               while($obj = $result->fetch_object()) {
                   //PRINTING EACH ROW
                   echo "<tr>";
                   echo "<td>".$obj->codigol."</td>";
                   echo "<td>".$obj->titulo."</td>";
				   
                    echo "<td>".$_SESSION['carrito'][$obj->codigol]."</td>";
                    echo "<td>".$obj->precio."</td>";
                    echo "<td>".$_SESSION['carrito'][$obj->codigol]*$obj->precio."</td>";
                   echo "<td><a href='addcarrito.php?id=".$obj->codigol."'>A&ntilde;adir</a></td>";
                   echo "<td><a href='quitarcarrito.php?id=".$obj->codigol."'>Quitar</a></td>";
                   echo "</tr>";
                   $totalPedido+=$_SESSION['carrito'][$obj->codigol]*$obj->precio;
               }
      ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td><?php echo $totalPedido; ?></td>
            <td><a href="completarPedido.php">Completar pedido</a></td>
            <td></td>
        </tr>
    </table>
	<?PHP
	
            }else{
			
	?>
		<div class="row">
			<div class="col-xs-3">
			</div>
			<div clasS="col-xs-6">
				<div class="well">
					<h1 class="text-center">No hay art&iacute;culos en el carrito</h1>
				</div>
			</div>
			<div clasS="col-xs-3">
			</div>
		</div>
	<?PHP
		}
	?>

</body>
</html>
