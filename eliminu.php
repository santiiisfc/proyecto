<?php
session_start();
include_once ("cabeadmin.php");
include_once("./db_configuration.php");
if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

         //CREATING THE CONNECTION
         $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         //MAKING A SELECT QUERY
         /* Consultas de selección que devuelven un conjunto de resultados */
         $op1='delete from detallespedido where idpedido IN(SELECT idPedido FROM pedidos WHERE codigou='.$_GET["id"].')';
		 
         if ($result = $connection->query($op1)){
			$op1='delete from pedidos where codigou='.$_GET["id"];
			
			if ($result = $connection->query($op1)){
				$op1='delete from usuario where codigou='.$_GET["id"];
				
			if ($result = $connection->query($op1)){

					
				}
			}
         }
      
        header('Refresh:0.1; url=panelusuarios.php' ,true,303);


         ?>
	<?php
}else{
	header('location:index.php');
}
	?>
