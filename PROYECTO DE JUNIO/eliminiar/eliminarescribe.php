<?php
include_once ("cabeadmin.php");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'ADMINISTRADOR'){

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eliminar escribe</title>
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
     $valor1=$_GET['id1']; 
		 	 $valor2=$_GET['id2']; 
         $op1="delete from escribe where (codigo=$valor1) and (codigol=$valor2);";
         
         if ($result = $connection->query($op1)){
           echo "escribe eliminado"."</br>";
         }
      header('Refresh:3; url=panelescribe.php' ,true,303);
         


         ?>
	<?php
}else{
	header('location:index.php');
}
	?>