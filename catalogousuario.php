<?php

include_once ("cabecerausu2.php");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['ns']) && $_SESSION['ns'] == 'NORMAL'){
include_once("tema_index.php");
?>


	
	<div class="row">
		<div class="col-xs-2">
		</div>
		<div class="col-xs-8">
			 <div class="btn-group btn-group-justified">
			  <a class="btn btn-primary" href="poesiausuario.php">Poesia</a>
			  <a class="btn btn-primary" href="novelausuario.php">Novela</a>
			  <a class="btn btn-primary" href="narrativausuario.php">Narrativa</a>
			  <a class="btn btn-primary" href="terrorusuario.php">Terror</a>
			</div>
		</div>
		<div class="col-xs-2">
		</div>
	</div>
	</body>
	</html>
	<?php
}else{
	header('location:index.php');
}
	?>

	


