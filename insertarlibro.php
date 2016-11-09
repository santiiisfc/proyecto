


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
<title>Insertar  libro</title>
<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="group">
<div id="group">
<?php if (!isset($_POST["submit"])) :
	  
	  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
			if ($connection->connect_errno) {
			  printf("Connection failed: %s\n", $connection->connect_error);
			  exit();
		}
		
		?> 
<table border="1" style="background-color:#C1BABA" align="center">
  <form action="insertarlibro.php" method="POST">
  
    <tr><td>
		<label for="titulo">Titulo<span><em>(requerido)</em></span></label>
      <input type="text" name="tit"  required/> 
      </td></Tr><tr><td>
      <label for="isbn">isbn <span><em>(requerido)</em></span></label>
      <input type="text" name="isbn" required/>  
	  </td></Tr><tr><td>
	 <?php
	  
		$result1=$connection->query("SELECT * FROM editorial ");
		echo "<label >editorial<span><em>(requerido)</em></span></label>"; 
		echo "<select required name='cedi'>"; 
		while($obj=$result1->fetch_object()){
			$selected = '';
			if($obj->codigoedi == $editorial->codigoedi){
				$selected = 'selected';
			}
			echo "<option value=".$obj->codigoedi ." ".$selected.">".$obj->nombre ." </option>";
		}
		echo " </select></br>";
	  ?>
</td></Tr><tr><td>	  
<label for="genero">genero <span><em>(requerido)</em></span></label>
      <input type="text" name="gen" required/>
	  </td></Tr><tr><td>
<label for="precio">precio <span><em>(requerido)</em></span></label>
      <input type="text" name="pre"  required/>	  
	  </td></Tr><tr><td>
	  <label for="cantidad">cantidad<span><em>(requerido)</em></span></label>
      <input type="text" name="canti" required/>
	  </td></Tr><tr><td>
	  
	  <?php
	  
		$result1=$connection->query("SELECT * FROM autor ");
		echo "<label >autor<span><em>(requerido)</em></span></label>"; 
		echo "<select required name='au'>"; 
		while($obj=$result1->fetch_object()){
			$selected = '';
			if($obj->nombre == $libro->autor){
				$selected = 'selected';
			}
			echo "<option value=".$obj->codigo ." ".$selected.">".$obj->nombre ." ".$obj->apellidos ."</option>";
		}
		echo " </select></br>";
	  ?>
      
</td></Tr><tr><td>
    
     <center> <input name="submit" type="submit" value="insertar libro" /></center>
    </td></Tr><tr><td>
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
      if ($result = $connection->query("insert into libro (titulo, isbn,codigoedi,genero,precio,cantidad,autor) VALUES ('".$_POST['tit']."','".$_POST['isbn']."','".$_POST['cedi']."','".$_POST['gen']."','".$_POST['pre']."','".$_POST['canti']."','".$_POST['au']."')")) {

	header('Refresh:0.1; url=panellibro.php' ,true,303);

	
	  }
	  
	
	  



	  
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
