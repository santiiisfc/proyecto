<?php
include_once ("cabeadmin.php");
include_once("./db_configuration.php");


session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminitrar editorial</title>
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
         ?>
<table border="1" style="background-color:#C1BABA";>
  <tr>
    <td><b>Id Pedido</td>
    <td><b>Fecha</td>
	  <td><b>codigou</td>
     
    
		

    </tr>
      <?php
         if ($result = $connection->query("select * from pedidos;")) {
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
			echo "<tr>";
			echo "<td>".$obj->idpedido."</td>";
			echo "<td>".$obj->fecha."</td>";
		    echo "<td>".$obj->codigou."</td>";
			  
			echo " <td><a href='modificarpedido.php?id=".$obj->idpedido."'><img src='editar.png' width='70px' ></td>";
			echo " <td><a href='insertarpedido.php'><img src='masd.png' width='70px' ></a></td>";
			echo " <td><a href='eliminarpedido.php?id=".$obj->idpedido."'><img src='eliminar.jpeg' width='70px' ></a></td>";

          echo "</tr>";
      }
      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
      ?>
    </table>
	<?php
}else{
	header('location:index.php');
}
	?>
