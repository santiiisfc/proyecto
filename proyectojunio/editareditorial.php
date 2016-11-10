<?php
include_once ("cabeadmin.php");
include_once("./db_configuration.php");
session_start();


if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insertar editorial</title>
<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php if (!isset($_POST["modificar"])) : ?> 

  <form action="editareditorial.php" method="POST">
  <h2><em>editar editorial</em></h2>
  
      <table border="1" style="background-color:#C1BABA" align="center">
      <input type="hidden" name="co" value="<?= $_GET['id'] ?>"/>
       <td>
	        <label for="nedi">Nombre<span><em>(requerido)</em></span></label>
      <input type="text" name="nedi" value="<?= $_GET['n'] ?>" required/> 
    </td>
    
      
<tr><td>
    
     <center> <input name="modificar" type="submit" value="Modificar" /></center>
	</td>
    </tr>
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
	

      if ($result = $connection->query("update editorial set nombre='".$_POST['nedi']."' where codigoedi='".$_POST['co']."'")) {
			
		}
	  
	  
	  
 header('Refresh:0.1; url=paneleditorial.php' ,true,303);

	  

	  
?>
<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
