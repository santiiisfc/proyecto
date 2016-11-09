<!doctype html>
<?php
include_once ("cabecerausuario.php");
include_once("./db_configuration.php");



 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include_once("tema.php");
?>
  
<html>
<head>
		
		<link href="estilos_r.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">


</head>

<body>
<?php if (!isset($_POST["submit"])) : ?> 
 <div class="row">
		<div class="col-xs-4">
		</div>
		<div class=" col-xs-4">
			<div class="well">
			  <h2 class="text-center">Registro</h2>
			  <form action="registro.php" method="post" role="form">
				<div class="form-group">
				  <label for="log">Nombre:</label>
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre">
				</div>
				<div class="form-group">
				  <label for="cont">Contraseña:</label>
				  <input type="password" class="form-control" id="password" name="password" placeholder="Introduzca Contraseña">
				</div>
				<div class="form-group">
				  <label for="log">Apellidos:</label>
				  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca apellidos">
				</div>
				<div class="form-group">
				  <label for="log">Email:</label>
				  <input type="text" class="form-control" id="email" name="email" placeholder="Introduzca email">
				</div>
				<div class="form-group">
				  <label for="log">Nick:</label>
				  <input type="text" class="form-control" id="nick" name="nick" placeholder="Introduzca nick">
				</div>
				<button type="submit" name="submit" class="btn btn-default">Registrar</button>
			  </form>
			</div>
		</div>
		<div class="col-xs-4">
		</div>
	</div>
</body>
</html>

<?php else: ?>
<?php
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
       if ($result = $connection->query("insert into usuario (nombre, password, apellidos, email, nick) VALUES ('".$_POST['nombre']."',md5('".$_POST['password']."'),'".$_POST['apellidos']."','".$_POST['email']."','".$_POST['nick']."')")) {

		echo "<p>Su usuario se ha creado correctamente, <b>Bienvenido</b></p>";
		
	  
	  }else{
	  
	  echo "<p>correo o nombre en uso</p>";
	  
	
	  }
	  header('Refresh:2; url=index.php',true,303);
	  
	  
	  
?>	  

<?php endif ?>
