<?php
include_once ("cabeadmin.php");
session_start();
include_once("./db_configuration.php");
if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php if (!isset($_POST["modificar"])) : ?> 
<table border="1" style="background-color:#C1BABA" align="center">
  <form action="modificarautor.php" method="POST">
  <h2><em>editar Autor</em></h2>
  
      
		<input type="hidden" name="idautor" value="<?= $_GET['id'] ?>"/>
       <tr><td>
		<label for="nautor">Nombre<span><em>(requerido)</em></span></label>
		<input type="text" name="nautor" value="<?= $_GET['n'] ?>" required/> 
		</tr></td>
		<td>
		<label for="aautor">Apellidos<span><em>(requerido)</em></span></label>
		<input type="text" name="aautor" value="<?= $_GET['a'] ?>" required/> 
    
    </td></tr>
      
<tr><td>
    
	<center> <input name="modificar" type="submit" value="Modificar" /></center>
	</td></tr>
	</table>
    
  </form>
</div>
</body>
</html>

<?php
else:
 //CREATING THE CONNECTION
  
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
	

      if ($result = $connection->query("update autor set nombre='".$_POST['nautor']."', apellidos='".$_POST['aautor']."' where codigo='".$_POST['idautor']."'")) {
			header('Refresh:0.1; url=panelautores.php' ,true,303);

	
	  }
	  
	
	  



	  
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
