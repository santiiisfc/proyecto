 
    <?php
include_once ("cabecerausuario.php");
include_once("db_configuration.php");
 if(!isset($_SESSION)) 
    { 
        session_start(); 
		include_once("tema.php");
    } 


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
      $connection->set_charset("utf8");
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $mysqli->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
           /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT l.codigol AS codigol, l.isbn AS ISBN, l.titulo AS titulo, e.nombre AS Editorial, l.genero AS Genero, l.cantidad AS Stock, l.precio AS Precio, CONCAT(CONCAT(a.nombre, ' '), a.apellidos) AS Autor FROM (libro l JOIN editorial e ON l.codigoedi = e.codigoedi) JOIN autor a ON a.codigo = l.autor where Genero LIKE '%poesia%'")) {
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

    <td><b>Codigo editorial</td></b>
    <td><b>Nombre</td></b>
	<td><b>Autor</td></b>

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
				   
             echo "<td>".$obj->Autor."</td>";
                   echo "</tr>";
               }
      ?>

   
					  </tbody>
					<td> 
		<a href="catalogo.php" target="_self"> <input type="button" name="boton" value="Volver atras" /> </a></td>
				</table>
					
				</table>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>

</body>
         
