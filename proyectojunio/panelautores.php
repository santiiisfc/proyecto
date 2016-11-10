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
	<style>
			.well{
				background-color: #98764b !important;
			}
	   </style>
    <title>Adminitrar autores</title>
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
         if ($result = $connection->query("select * from autor;")) {
             printf("<p></p>", $result->num_rows);
              } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
         ?>
<<div class="row">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-8">
			<div class="well">
				<table class="table table-striped">
					<thead>
					  <tr>

    <td><b>codigo</td>
    <td><b>nombre</td>
    <td><b>apellidos</td>
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
          echo "<td>".$obj->nombre."</td>";
          echo "<td>".$obj->apellidos."</td>";
          echo " <td><a href='modificarautor.php?id=".$obj->codigo."&n=".$obj->nombre."&a=".$obj->apellidos."'><img src='editar.png' width='50px' ></a></td>";
          echo " <td><a href='insertarautor.php'><img src='masd.png' width='50px' ></a></td>";
          echo " <td><a href='elimana.php?id=".$obj->codigo."'><img src='eliminar.jpeg' width='50px' ></a></td>";

          echo "</tr>";
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
		
	<?php
}else{
	header('location:index.php');
}
	?>
	
