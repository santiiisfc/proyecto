<?php
session_start();
include_once("./db_configuration.php");
if(isset($_POST['log']) && isset($_POST['cont'])){
	$log=$_POST['log']; 
	$cont=$_POST['cont']; 
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
	$sql="SELECT * FROM usuario WHERE nick='$log' and password='" . md5($cont). "'"; 
	$result0=$connection->query($sql);
	if ($result0->num_rows > 0){
			
			$obj=$result0->fetch_object();
			if($obj != null){
				$_SESSION['id']=$obj->codigou; // 
				$_SESSION['nom']=$obj->nombre; //
				$_SESSION['ns'] =$obj->categoria;
				$ns=$obj->categoria; 
				if($ns=='ADMINISTRADOR'){  
					header("refresh:0.1 ;url=paneltotal.php");
				}else{
					header("refresh:0.1 ;url=indexusuario.php"); l
				}
			}
		}else{
		//echo"<script language='javascript'>alert('Error En el Usuario o Contraseña Intente de Nuevo'); </script>";
			header("refresh:0.1 ;url=login.php");
	}
}else{

	header("refresh:0.1 ;url=login.php");
}

?> 
