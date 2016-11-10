


<?php
include_once("./db_configuration.php");
session_start();
if(isset($_POST['log']) && isset($_POST['cont'])){
	$log=$_POST['log']; /// recibo los datos de login
	$cont=$_POST['cont']; // recibo los datos de la contraseña
	
	$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
	$sql="SELECT * FROM usuario WHERE nick='$log' and password='" . md5($cont). "'"; // realizo la comparación con la base de datos
	
	$result0=$connection->query($sql);
	if ($result0->num_rows > 0){
			
			$obj=$result0->fetch_object();
			if($obj != null){
				$_SESSION['id']=$obj->codigou; // descargo id de la bd
				$_SESSION['nom']=$obj->nombre; // descargo el nombre de la base de datos
				$_SESSION['ns'] =$obj->categoria;
				$ns=$obj->categoria; // descargo el niver de usuario
				if($ns=='ADMINISTRADOR'){ // relizo la comparacion para saber a q menu de usuario me va direcionar si es NivelUsuario 1 va al pagina inicio administrador
					header("refresh:0.1 ;url=paneltotal.php");
				}else{
					header("refresh:0.1 ;url=indexusuario.php"); //si el NivelUsuario es mayor o diferente a 1 va la pagina inicio del usuario normal
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

	
