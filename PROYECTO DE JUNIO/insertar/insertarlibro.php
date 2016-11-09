
<?php
include_once ("cabeadmin.php");




?>

<html>
<head>
<meta charset="utf-8">
<title>Insertar libro</title>
<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="group">
<div id="group">
<?php if (!isset($_POST["submit"])) : ?> 
<table border="1" style="background-color:#C1BABA">
  <form action="insertarlibro.php" method="POST">

  <tr><td>
       
<label for="Codigo">Codigo <span><em>(requerido)</em></span></label>
      <input type="text" name="co"  required/>
       </td></tr>
	   <tr><td>
	        <label for="titulo">Titulo<span><em>(requerido)</em></span></label>
      <input type="text" name="tit"  required/> 
      </td></tr>
	  <tr><td>
      <label for="isbn">isbn <span><em>(requerido)</em></span></label>
      <input type="text" name="isbn" required/>  
	  </td></tr>
	  <tr><td>
<label for="genero">genero <span><em>(requerido)</em></span></label>
      <input type="text" name="gen"  required/>
	  </td></tr>
	  <tr><td>
	  
<label for="precio">precio <span><em>(requerido)</em></span></label>
      <input type="text" name="pre"  required/>	  
	  </td></tr>
	  <tr><td>
	  <label for="cantidad">cantidad<span><em>(requerido)</em></span></label>
      <input type="text" name="canti"  required/>
	  </td></tr>
	  <tr><td>
<label for="autor">autor <span><em>(requerido)</em></span></label>
      <input type="text" name="au"  required/>
      </td></tr>
	  <tr><td>

    
     <center> <input name="submit" type="submit" value="Añadir libro" /></center>
    </td></tr>
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
      if ($result = $connection->query("insert into libro (codigol,titulo, isbn,genero,precio,cantidad,autor) VALUES ('".$_POST['co']."','".$_POST['tit']."','".$_POST['isbn']."','".$_POST['gen']."','".$_POST['pre']."','".$_POST['canti']."','".$_POST['au']."')")) {

		echo "<p>libro añadido</p>";
		
	  
	  };
	  
	
	  
	  header('Refresh:10; url=panellibro.php',true,303);
	  
	  
	  
?>	  

<?php endif ?>