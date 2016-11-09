<?php
include_once ("cabeadmin.php");

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){



?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
        <meta charset="utf-8">
		<link rel="stylesheet" href="estilos.css" />
    <title>Adminitrar usuarios</title>
  </head>
  


    

		 <table border="1" style="background-color:#C1BABA";>
  <tr>
    <td><b><a href="panelusuarios.php">Administrar usuarios</a></td>
    <td><b><a href="paneleditorial.php">Administrar editoriales</a></td>
    <td><b><a href="panelautores.php">Administrar autores</a></td>
  <td><b><a href="panelescribe.php">Administrar escribe</a></td>
  <td><b><a href="panellibro.php">Administrar libro</a></td>
    <td><b><a href="pedidosadmin.php">Administrar Pedidos</a></td>
	

    </tr>
	</tr>
    <tr>
      
    </table>
	</body>
	</html>
	<?php
}else{
	header('location:index.php');
}
	?>