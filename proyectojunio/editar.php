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
<title>Modificar libro</title>
<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="group">
<div id="group">
<?php if (!isset($_POST["modificar"])) :
	  
	$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
			if ($connection->connect_errno) {
			  printf("Connection failed: %s\n", $connection->connect_error);
			  exit();
		}
		$result=$connection->query("SELECT * FROM libro where codigol='".$_GET['id']."' ");
		$libro = $result->fetch_object();
		?> 
<table border="1" style="background-color:#C1BABA" align="center">
  <form action="editar.php" method="POST">
  
    <tr><td>
      <input type="hidden" name="co" value="<?= $libro->codigol ?>" required/>
       </td></Tr><tr><td>
		<label for="titulo">Titulo<span><em>(requerido)</em></span></label>
      <input type="text" name="tit" value="<?= $libro->titulo ?>" required/> 
      </td></Tr><tr><td>
      <label for="isbn">isbn <span><em>(requerido)</em></span></label>
      <input type="text" name="isbn" value="<?= $libro->isbn ?>" required/>  
	  </td></Tr><tr><td>
	   <?php
	  
		$result1=$connection->query("SELECT * FROM editorial ");
		echo "<label >editorial<span><em>(requerido)</em></span></label>"; 
		echo "<select required name='cedi'>"; 
		while($obj=$result1->fetch_object()){
			$selected = '';
			if($obj->codigoedi == $libro->codigoedi){
				$selected = 'selected';
			}
			echo "<option value=".$obj->codigoedi ." ".$selected.">".$obj->nombre ." </option>";
		}
		echo " </select></br>";
	  ?>
</td></Tr><tr><td>	  
<label for="genero">genero <span><em>(requerido)</em></span></label>
      <input type="text" name="gen" value="<?= $libro->genero ?>" required/>
	  </td></Tr><tr><td>
<label for="precio">precio <span><em>(requerido)</em></span></label>
      <input type="text" name="pre" value="<?= $libro->precio ?>" required/>	  
	  </td></Tr><tr><td>
	  <label for="cantidad">cantidad<span><em>(requerido)</em></span></label>
      <input type="text" name="canti" value="<?= $libro->cantidad ?>" required/>
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
    
     <center> <input name="modificar" type="submit" value="Modificar datos" /></center>
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
      if ($result = $connection->query("update libro set titulo = '".$_POST['tit']."', isbn = '".$_POST['isbn']."',codigoedi = '".$_POST['cedi']."',genero = '".$_POST['gen']."',precio = '".$_POST['pre']."',cantidad = '".$_POST['canti']."',autor = '".$_POST['au']."' WHERE codigol = '".$_POST['co']."'")) {

	header('Refresh:0.1; url=panellibro.php' ,true,303);

	
	  }
	  
	
	  



	  
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
