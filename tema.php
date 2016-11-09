<?php
echo "<h1><font face='Comic Sans MS' color='white' >Elige un tema:</font></br></h1>";
echo "<a href='index.php?tema=tema1'><img style='margin: 6px 6px 6px 6px' width='45px' height='30px' src='puntorojo.png'/></a>";
echo "<a href='index.php?tema=tema2'><img style='margin: 6px 6px 6px 6px' width='45px' height='30px' src='puntoverde.png'/></a>";
echo "<a href='index.php?tema=tema3'><img style='margin: 6px 6px 6px 6px' width='45px' height='30px' src='puntoazul.png'/></a></br>";
echo "<h2><a href='index.php?tema=tema0'>(Por defecto)</a></h2>";
if (isset($_GET['tema'])){
	$_SESSION['tema']=$_GET['tema'];
}
else {
	
}
if (isset($_SESSION['tema'])){
		if ($_SESSION['tema']=='tema1'){
				echo "<style type='text/css'>#tema1{background: red;}
				body{background: red}
				'></style>";
		}
		elseif ($_SESSION['tema']=='tema2'){
				echo "<style type='text/css'>#tema2{background: green;}
			body{background: green;}
			'></style>";
		}
		
		elseif ($_SESSION['tema']=='tema3'){
				echo "<style type='text/css'>#tema3{background: blue;}
				body{background: blue;'></style>";
		}
		else {
		}
}
	else {}

?>