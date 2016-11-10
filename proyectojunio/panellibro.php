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
    <title>Administrar libros</title>
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
         if ($result = $connection->query("SELECT l.codigol AS ID, l.isbn AS ISBN, l.titulo AS Titulo, e.nombre AS Editorial, l.genero AS Genero, l.cantidad AS Stock, l.precio AS Precio, CONCAT(CONCAT(a.nombre, ' '), a.apellidos) AS Autor FROM (libro l JOIN editorial e ON l.codigoedi = e.codigoedi) JOIN autor a ON a.codigo = l.autor;")) {
             printf("<p></p>", $result->num_rows);
              } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
         ?>
<div class="row">
		<div class="col-xs-12">
			<div class="well" style="width:90%;margin-left:auto; margin-right:auto;">
				<table class="table table-striped">
					<thead>
						<tr>
							<td><b>ISBN</b></td>
							<td><b>T&iacute;tulo</b></td>
							<td><b>G&eacute;nero</b></td>
							<td><b>Editorial</b></td>
							<td><b>Autor</b></td>
							<td><b>Stock</b></td>
							<td><b>Precio</b></td>
							<td></td>
							<td></td>
							<td></td>
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
			echo "<td>".$obj->Genero."</td>";
		    echo "<td>".$obj->Editorial."</td>";
			echo "<td>".$obj->Autor."</td>";
			echo "<td>".$obj->Stock."</td>";
			echo "<td>".$obj->Precio."</td>";
          
			echo " <td><a href='editar.php?id=".$obj->ID."'><img src='editar.png' width='45px' ></td>";
			echo " <td><a href='insertarlibro.php'><img src='masd.png' width='45px' ></a></td>";
			echo " <td><a href='elimilibros.php?id=".$obj->ID."'><img src='eliminar.jpeg' width='45px' ></a></td>";

          echo "</tr>";
      }
      ?>
				 </tbody>
	<td> 
		<a href="paneltotal.php" target="_self"> <input type="button" name="boton" value="Volver atras" /> </a></td>
				</table>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>
		
	<?php
}else{
	header('Refresh:1; url='.$_SERVER['HTTP_REFERER'],true,303);

}
	?>
