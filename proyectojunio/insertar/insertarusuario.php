<?php
include_once ("cabeadmin.php");

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){



?>

  
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
<?php if (!isset($_POST["submit"])) : ?> 
<table border="1" style="background-color:#C1BABA">
  <form action="insertarusuario.php" method="POST">


     <tr>
	 <td>
      <label for="nombre">Nombre <em>(requerido)</em></label>
      <input type="text" name="nombre"  required/>   
	  </td>
	  </tr>
	  <tr>
	   <td>
	        <label for="password">Password <em>(requerido)</em></label>
      <input type="password" name="password"  required/> 
      </td>
	  </tr>
	  <tr>
	  <td>
      <label for="apellido">Apellidos <em>(requerido)</em></label>
      <input type="text" name="apellidos"  required/>    
</td>
	  </tr>
	  <tr>
	  <td>
      <label for="email">Email <span><em>(requerido)</em></span></label>
      <input type="email" name="email"  required/>	  
</td>
	  </tr>
	  <tr>
	  <td>
      <label for="nick">Nick <span><em>(requerido)</em></span></label>
      <input type="text" name="nick"  required/>       
</td>
	  </tr>
	  <tr>
	  <td>
	  <?php
	  
		
		  echo "<select required name='val5'>";
                                echo "<option value='ADMINISTRADOR'>Administrador</option>";
                                echo "<option value='NORMAL'>Normal</option>";
                             echo " </select></br>";
	  ?>
    
     <center> <input name="submit" type="submit" value="Alta" /></center>
    </td>
	  </tr> 
	  <tr>
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
      if ($result = $connection->query("insert into usuario (nombre, password, apellidos, email, categoria, nick) VALUES ('".$_POST['nombre']."',md5('".$_POST['password']."'),'".$_POST['apellidos']."','".$_POST['email']."','".$_POST['val5']."','".$_POST['nick']."')")){
 
		echo "<p>Su usuario se ha añadido correctamente</p>";

	  
	  }else{
	  
	  echo "<p>correo o nombre en uso</p>"; 
	  
	
	  }
	  header('Refresh:2; url=panelusuarios.php',true,303);
	  
	  
?>	  

<?php endif ?>
	<?php
}else{
	header('location:index.php');
}
	?>
