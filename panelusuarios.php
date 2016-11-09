<?php
include_once ("cabeadmin.php");
include_once("./db_configuration.php");
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
    <title>Adminitrar usuarios</title>
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
         if ($result = $connection->query("select * from usuario;")) {
             printf("<p></p>", $result->num_rows);
              } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
         ?>
<div class="row">
		<div class="col-xs-12">
			<div class="well" style="width:90%;margin-left:auto; margin-right:auto;">
				<table class="table table-striped">
					<thead>
						<tr>
							<td><b>Codigou</td>
							<td><b>Nombre</td>
							<td><b>Apellidos</td>
							<td><b>Login</td>
							<td><b>Email</td>
							<td><b>Categor&iacute;a</td>
							<td><b></td>
							<td><b></td>
							<td><b></td>
						</tr>
					</thead>
					<tbody>
     
    
	
						  <?php
						  //FETCHING OBJECTS FROM THE RESULT SET
						  //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
						  while($obj = $result->fetch_object()) {
							  //PRINTING EACH ROW
							  echo "<tr>";
							  echo "<td>".$obj->codigou."</td>";
							  echo "<td>".$obj->nombre."</td>";
							  echo "<td>".$obj->apellidos."</td>";
							  echo "<td>".$obj->nick."</td>";
							  echo "<td>".$obj->email."</td>";
							  echo "<td>".$obj->categoria."</td>";
							  echo " <td><a href='modificarusuario.php?id=".$obj->codigou."'><img src='editar.png' width='50px' ></a></td>";
          echo " <td><a href='insertarusuario.php'><img src='masd.png' width='50px' ></a></td>";
          echo " <td><a href='eliminu.php?id=".$obj->codigou."'><img src='eliminar.jpeg' width='50px' ></a></td>";

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
	</div>
	<?php
}else{
	header('location:index.php');
}
	?>
		
