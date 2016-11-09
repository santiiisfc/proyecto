<?php
include_once ("cabeadmin.php");

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){



?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <style>
			.well{
				background-color: #98764b !important;
			}
	   </style>
    <title>Adminitrar tabla escribe</title>
  </head>
  <body>

	</div><br><br><br>
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
         if ($result = $connection->query("select * from escribe;" )) {
             printf("<p></p>", $result->num_rows);
              } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
         ?>
<div class="row">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-8">
			<div class="well">
				<table class="table table-striped">
					<thead>
					  <tr>

    <td><b>Codigo autor</td>
    <td><b>Codigo libro</td>
        
</tr>
					</thead>
					<tbody>
     
      <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
			echo "<tr>";
			echo "<td>".$obj->codigo."</td>";
			echo "<td>".$obj->codigol."</td>";
          
			echo " <td><a href='modificarescribe.php?id1=".$obj->codigo."&id2=".$obj->codigol."'><img src='editar.png' width='70px' ></a></td>";
			echo " <td><a href='insertarescribe.php'><img src='masd.png' width='70px' ></a></td>";
			echo " <td><a href='eliminarescribe.php?id1=".$obj->codigo."&id2=".$obj->codigol."'><img src='eliminar.jpeg' width='70px' ></a></td>";

			echo "</tr>";
      }
      ?>
</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>

	<?php
}else{
	header('location:index.php');
}
	?>