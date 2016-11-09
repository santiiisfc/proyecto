<?php


session_start();



?>
<html><meta charset="UTF-8">
	
	
	<head>
		<script type="text/javascript" src="jscript/jquery.js"></script>
		<!--<link rel="stylesheet" href="css/main.css">-->
		<!--<link rel="stylesheet" href="css/bjqs.css">-->
		<script src="jscript/bjqs-1.3.min.js"></script>
		<!--<link rel="stylesheet" href="css/demo.css">	-->
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
<style>
	.navbar{
		background-color: #98764b !important;
	}
	.navbar a{
		color:#ffffff;
	}
	.navbar a:hover{
		color:#ffffff;
		background-color: #381e0b !important;
	}
</style>
	
		<title>Libreria Santiago </title>
	</head>
	
	<body background="fotos/biblioteca.jpg" >
		
		<div>
			<ul id= "banner">
				<a href="ofertasusuario.php"><img src="fotos/libros1.jpg"width="97%" height="200"/></a>
			</ul>
			<nav class="navbar">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Libreria Santiago</a>
				</div>
				<ul class="nav navbar-nav">
				  <li class="active"><a href="ofertasusuario.php"> Ofertas </a></li>
				  <li><a href="catalogousuario.php"> Catálogo de libros </a></li>
				  <li><a href="pedidos.php"> Mis pedidos</a></li>
				  <li><a href="cerrar.php"> Cerrar Sesion</a></li>
				  <li>
                    <?php 
                        $total = 0;
                        if(isset($_SESSION['carrito'])){
                            foreach($_SESSION['carrito'] as $producto => $cantidad){
                                $total+=$cantidad;
                            }   
                        }
					   echo '<a href="verCarrito.php"><i class="fa fa-shopping-cart"></i> <span class="badge">'.$total.'</span></a>';
                    ?>
					</li>
				</ul>
			  </div>
			</nav>
		</div>
		<br />
		<br />
		<br />
		
