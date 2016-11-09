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
<body background="blue" >
<div id="group">
<div id="group">
<?php if (!isset($_POST["submit"])) : ?> 
<table border="1" style="background-color:#C1BABA" align="center">
  <form action="insertareditorial.php" method="POST">

  
       
	   <tr>
	   <td>
	        <label for="titulo">Nombre<span><em>(requerido)</em></span></label>
      <input type="text" name="nedi"  required/> 
      
    </td></tr>
	   <tr>
      
<td>
    
     <center> <input name="submit" type="submit" value="Añadir editorial" /></center>
    </td></tr>
	   
  </form>
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
      if ($result = $connection->query("insert into editorial (nombre) VALUES ('".$_POST['nedi']."')")) {

		header('Refresh:0.1; url=paneleditorial.php' ,true,303);

	
	  }
	  
	
	  



	  
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
