<?php
include_once ("cabecerausuario.php");

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>


<html>
<head>

	
		


</head>
<body>
	<div class="row">
		<div class="col-xs-4">
		</div>
		<div class=" col-xs-4">
			<div class="well">
			  <h2 class="text-center">Login</h2>
			  <form action="mains.php" method="post" role="form">
				<div class="form-group">
				  <label for="log">Login:</label>
				  <input type="text" class="form-control" id="log" name="log" placeholder="Introduzca Login">
				</div>
				<div class="form-group">
				  <label for="cont">Contraseña:</label>
				  <input type="password" class="form-control" id="cont" name="cont" placeholder="Introduzca Contraseña">
				</div>
				<button type="submit" name="iniciar" class="btn btn-default">Conectar</button>
			  </form>
			</div>
		</div>
		<div class="col-xs-4">
		</div>
	</div>
</body>

</html>
