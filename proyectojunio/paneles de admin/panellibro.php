<?php
include_once ("cabeadmin.php");


session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

?>

<html lang="en">
  <head>
  <style>
			.well{
				background-color: #98764b !important;
			}
	   </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar libros</title>
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
         if ($result = $connection->query("select * from libro;")) {
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
    <td><b>Codigo libro</td>
    <td><b>titulo</td>
	 <td><b>isbn</td>
	  <td><b>codigoedi</td>
     <td><b>genero</td>
	 
	   <td><b>precio</td>
	    <td><b>cantidad</td>
		 <td><b>autor</td>
    
	</tr>
					</thead>
					<tbody>
      <?php
      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
			echo "<tr>";
			echo "<td>".$obj->codigol."</td>";
			echo "<td>".$obj->titulo."</td>";
		    echo "<td>".$obj->isbn."</td>";
			  echo "<td>".$obj->codigoedi."</td>";
			    echo "<td>".$obj->genero."</td>";
				  echo "<td>".$obj->precio."</td>";
				    echo "<td>".$obj->cantidad."</td>";
					  echo "<td>".$obj->autor."</td>";
          
			echo " <td><a href='editar.php?id=".$obj->codigol."'><img src='editar.png' width='45px' ></td>";
			echo " <td><a href='insertarlibro.php'><img src='masd.png' width='45px' ></a></td>";
			echo " <td><a href='elimilibros.php?id=".$obj->codigol."'><img src='eliminar.jpeg' width='45px' ></a></td>";

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