<?php
include_once ("cabecerausuario.php");

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


?>


<html>
<head>

	
		


</head>
<body>
 <div id="log" >
  <table border="1" style="background-color:#C1BABA">
<form action="mains.php" method="post" align="center">
  
  <tr><td><label for="exampleInputEmail1">Login</label></td></tr>
  <tr><td><input type="text"   name="log" required title="Ingrese Login"></td></tr>


  <tr><td><label for="exampleInputPassword1">Contraseña</label></tr>
  <tr><td><input type="password"  font="blue" name="cont" title="Ingrese Contraseña" required ></td></tr>
 
 
<tr><td><div align="center"><input type="submit" name="iniciar" value="Ingresar"  ></div></td></tr>
</form>
    </table>
 </div>
</body>

</html>