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
	if ($result = $connection->query("select * from pedidos where idpedido = '".$_REQUEST['id']."';")) {
	$pedidos = $result->fetch_assoc();
		printf("<p></p>", $result->num_rows);
	}
	?>
<!doctype html>
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
  <form action="modificarpedido.php" method="POST">

  
     <tr>
	 <td>
	 <tr><td>
      <input type="hidden" name="idpedido" value="<?= $pedidos['idpedido'] ?>" required/>
       </td></Tr><tr><td>
      
	  <tr>
	  <td>
      <label for="fecha">Fecha <em>(requerido)</em></label>
      <input type="date" name="fecha"  value="<?= $pedidos['fecha'] ?>" required/>    
</td>
	  </tr>
	  <tr>
	  <td>

     
<?php
     
  $result1=$connection->query("SELECT * FROM usuario ");
		echo "<label >usuario<span><em>(requerido)</em></span></label>"; 
		echo "<select required name='cu'>"; 
		while($obj=$result1->fetch_object()){
			$selected = '';
			if($obj->codigou == $pedidos->codigou){
				$selected = 'selected';
			}
			echo "<option value=".$obj->codigou ." ".$selected.">".$obj->nombre ." ".$obj->apellidos ."</option>";
		}
		echo " </select></br>";
	  ?>
      	  
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
      if ($result = $connection->query("update pedidos set  fecha = '".$_POST['fecha']."', codigou = '".$_POST['cu']."' WHERE idpedido = '".$_POST['idpedido']."'")) {

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
