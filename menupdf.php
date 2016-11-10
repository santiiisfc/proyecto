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
	
        <meta charset="utf-8">
		<link rel="stylesheet" href="estilos.css" />
    <title>Adminitrar usuarios</title>
  </head>
  
<body>
<div class="row">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-10">
			 <div class="btn-group btn-group-justified">
			  <a class="btn btn-primary" href="grafica_pedidosusu.php">Todos los pedidos en PDF</a></td>
			 
			 
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>
	<a href="paneltotal.php" target="_self"> <input type="button" name="boton" value="Volver atras" /> </a></td>
				</table>
				
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>
	</body>
	</html>

	<?php
}else{
	header('location:index.php');
}
	?>