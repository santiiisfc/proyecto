<?php
include_once ("cabeadmin.php");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eliminar autor</title>
  </head>
  <body>
    <?php
         //CREATING THE CONNECTION
         $connection = new mysqli("localhost", "root", "", "libreria");
         //TESTING IF THE CONNECTION WAS RIGHT
         if ($connection->connect_errno) {
             printf("Connection failed: %s\n", $mysqli->connect_error);
             exit();
         }
         //MAKING A SELECT QUERY
         /* Consultas de selección que devuelven un conjunto de resultados */
         $op1='delete from autor where codigo='.$_GET["id"];
         
         if ($result = $connection->query($op1)){
           echo "Autor eliminado"."</br>";
         }
      
          header('Refresh:2; url=panelautores.php',true,303);


         ?>
	<?php
}else{
	header('location:index.php');
}
	?>