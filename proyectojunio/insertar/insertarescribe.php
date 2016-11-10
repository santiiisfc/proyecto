<?php
include_once ("cabeadmin.php");


session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insertar libro</title>
<link href="estilos_r.css" rel="stylesheet" type="text/css">
</head>

<body>


<?php if (!isset($_POST["colibro"])) : ?> 

  <form action="insertarescribe.php" method="POST">
  <h2><em></em></h2>

<?php

      $connection = new mysqli("localhost", "root", "", "libreria");
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
     
     $result1=$connection->query("SELECT * FROM autor ");
  $result3=$connection->query("SELECT * FROM libro");
  echo "<h3>Autores:</h3>"; 
  echo "<select required multiple name='coautor'>"; 
        while($obj=$result1->fetch_object()){
        echo "<option value=".$obj->codigo .">"."Nombre: ".$obj->nombre ." Apellidos: ".$obj->apellidos ."</option>";
  
        }
        echo " </select></br>";
  echo "<h3>Libros:</h3>"; 
  echo "<select required multiple name='colibro'>"; 
        while($obj2=$result3->fetch_object()){
  echo "<option value=".$obj2->codigol .">".$obj2->titulo ." </option>";
        }	  
?> 
<input name="submit" type="submit" value="Insertar" /></center>
</form>

		<?php else: ?>  
<?php
      $connection = new mysqli("localhost", "root", "", "libreria");
        if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      if ($result = $connection->query("insert into escribe (codigo,codigol) VALUES ('".$_POST['coautor']."','".$_POST['colibro']."')")) {

		echo "<p>Registros añadidos</p>";
	  header('Refresh:2; url=panelescribe.php',true,303);
	  
	  } 
	  
?>	  



<?php endif ?>


</div>
</body>
</html>
	<?php
}else{
	header('location:index.php');
}
	?>

