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
		 
         $op1='SELECT idPedido FROM detallespedido WHERE idDetalle = '.$_REQUEST["id"];
		if($resultado = $connection->query($op1)){
			 $fila = $resultado->fetch_object();
			 $idPedido = $fila->idPedido;
			 $op1='SELECT COUNT(*) AS detalles FROM detallespedido WHERE idPedido = '.$idPedido;
			 if($resultado = $connection->query($op1)){
				 $fila = $resultado->fetch_object();
				 $totalDetalles = $fila->detalles;
				 
				 $op1='DELETE FROM detallespedido WHERE idDetalle ='.$_REQUEST["id"];
				 if($resultado = $connection->query($op1)){
					 if($totalDetalles-1 <= 0){
						$op1='DELETE FROM pedidos WHERE idPedido ='.$idPedido;
						$connection->query($op1);
					 }
				 }
			 }
			 
		}
		
          header('Refresh:1; url='.$_SERVER['HTTP_REFERER'],true,303);


         ?>
	<?php
}else{
	header('location:index.php');
}
	?>
