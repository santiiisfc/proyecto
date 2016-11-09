<?php
include_once ("cabeadmin.php");

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insertar autor</title>
<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>


<?php if (!isset($_POST["submit"])) : ?> 
<table border="1" style="background-color:#C1BABA">
  <form action="insertarautor.php" method="POST">

<tr><td>
<label for="Codi">Codigo <span><em>(requerido)</em></span></label>
      <input type="text" name="codigo"  required/>
       </td></tr>
	   <tr><td>
	        <label for="titulo">Nombre<span><em>(requerido)</em></span></label>
      <input type="text" name="nombrea"  required/> 
	  </td></tr>
	   <tr><td>
	     <label for="titulo">Apellidos<span><em>(requerido)</em></span></label>
      <input type="text" name="ape"  required/>
</td></tr>
	   <tr><td>
    
     <center> <input name="submit" type="submit" value="Añadir autor" /></center>
    </td></tr>
	   <tr><td>
  </form>
</div>
</body>
</html>

<?php else: ?>
<?php
      $connection = new mysqli("localhost", "root", "", "libreria");
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("insert into autor (codigo,nombre, apellidos) VALUES ('".$_POST['codigo']."','".$_POST['nombrea']."','".$_POST['ape']."')")) {

		echo "<p>Autor añadido</p>";
		
	  
	  }else{
	  
	  echo "<p>error al insertar autor, revisa los codigos</p>";
	  
	
	  }
	  
	
	  
	  header('Refresh:2; url=panelautores.php',true,303);
	  
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>