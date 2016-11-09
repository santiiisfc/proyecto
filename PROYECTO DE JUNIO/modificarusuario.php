<?php
include_once ("cabeadmin.php");
include_once("./db_configuration.php");

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){



	 //CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
	 //TESTING IF THE CONNECTION WAS RIGHT
	 if ($connection->connect_errno) {
		 printf("Connection failed: %s\n", $mysqli->connect_error);
		 exit();
	 }
	 //MAKING A SELECT QUERY
	 /* Consultas de selección que devuelven un conjunto de resultados */
	$usuario = '';
	if ($result = $connection->query("select * from usuario where codigou = '".$_REQUEST['id']."';")) {
		$usuario = $result->fetch_assoc();
		 printf("<p></p>", $result->num_rows);
	} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
  

  
<html>
<head>
<div><br><br><br>
		
		<link href="estilos_r.css" rel="stylesheet" type="text/css">
	</div><br><br><br>
<meta charset="utf-8">
<title></title>

</head>

<body>

<div id="group">
<div id="group">
<?php if (!isset($_POST["modificar"])) : ?> 
<table border="1" style="background-color:#C1BABA" align="center">
  <form action="modificarusuario.php" method="POST">

  
     <tr>
	 <td>
      <label for="nombre">Nombre <em>(requerido)</em></label>
      <input type="hidden" name="id" value="<?= $usuario['codigou'] ?>" required/>   
      <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required/>   
	  </td>
	  </tr>
	  <tr>
	  <td>
      <label for="apellido">Apellidos <em>(requerido)</em></label>
      <input type="text" name="apellidos"  value="<?= $usuario['apellidos'] ?>" required/>    
</td>
	  </tr>
	  <tr>
	  <td>
      <label for="email">Email <span><em>(requerido)</em></span></label>
      <input type="email" name="email"  value="<?= $usuario['email'] ?>" required/>	  
</td>
	  </tr>
	  <tr>
	  <td>
      <label for="nick">Nick <span><em>(requerido)</em></span></label>
      <input type="text" name="nick"  value="<?= $usuario['nick'] ?>" required/>       
</td>
	  </tr>
	  <tr>
	  <td>
    
     <center> <input name="modificar" type="submit" value="Modificar" /></center>
    </td>
	  </tr>
	  <tr>
  </form>
</div>
</body>
</html>

<?php else: 
     $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("update usuario set nombre = '".$_POST['nombre']."', apellidos = '".$_POST['apellidos']."', email = '".$_POST['email']."', nick = '".$_POST['nick']."' WHERE codigou = '".$_POST['id']."'")) {

		header('Refresh:0.1; url=panelusuarios.php' ,true,303);

	
      }
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
