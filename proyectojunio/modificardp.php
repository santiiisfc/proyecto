<?php
include_once ("cabeadmin.php");

include_once("./db_configuration.php");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

  $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
	 
	 if ($connection->connect_errno) {
		 printf("Connection failed: %s\n", $mysqli->connect_error);
		 exit();
	 }
	 
	$pedidos = '';
	if ($result = $connection->query("select * from detallespedido where iddetalle = '".$_REQUEST['id']."';")) {
	$detallespedido = $result->fetch_assoc();
		printf("<p></p>", $result->num_rows);
	}
	?>
<!doctype html>
<body>

<div id="group">
<div id="group">
<?php if (!isset($_POST["modificar"])) : ?>
<table border="1" style="background-color:#C1BABA" align="center">
  <form action="modificardp.php" method="POST">

  
     <tr>
	 <td>
	 <tr><td>
      <input type="hidden" name="iddetalle" value="<?= $detallespedido['iddetalle'] ?>" required/>
       </td></Tr><tr><td>
      
	  <tr>
	  <td>
      <label for="cantidad">Cantidad <em>(requerido)</em></label>
      <input type="text" name="cantidad"  value="<?= $detallespedido['cantidad'] ?>" required/>    
</td>
	  </tr>
	  <tr>
	  <td>
      <label for="precio">Precio <span><em>(requerido)</em></span></label>
      <input type="text" name="precio"  value="<?= $detallespedido['precio'] ?>" required/>	  
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
      if ($result = $connection->query("update detallespedido set  cantidad = '".$_POST['cantidad']."', precio = '".$_POST['precio']."' WHERE iddetalle = '".$_POST['iddetalle']."'")) {

		echo "<p>Su pedido se ha modificado correctamente</p>";
		
	  
	  }else{
	  
	  echo "<p>error al modificar</p>";
	  
	  }
	  
	  header('location: pedidosadmin.php');
	  
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
