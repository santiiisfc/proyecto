 <?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

         //CREATING THE CONNECTION
         $connection = new mysqli("localhost", "root", "", "libreria");
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         //MAKING A SELECT QUERY
         /* Consultas de selección que devuelven un conjunto de resultados */
         $consulta='delete from usuario where codigou="'.$_GET["id"].'"';
         $connection->query($consulta);
      
         header('location: panelusuarios.php');
?>
	<?php
}else{
	header('location:index.php');
}
	?>