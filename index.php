<?php
include_once ("cabecerausuario.php");
include_once("./db_configuration.php");

 if(!isset($_SESSION)) 
    { 
        session_start(); 
		include_once("tema.php");
    } 


?>


	
		
		<center>		
			
			<div id="banner-slide">
				<ul class="bjqs">
					<li><img class="img-responsive" src="fotos/promocion1.jpg">
					</li>
					<li><img class="img-responsive" src="fotos/promocion2.jpg">
					</li>
					<li><img class="img-responsive" src="fotos/promocion3.jpg">
					</li>
					
				</ul>
			</div>
		</center>
		
		<script class="secret-source">
			jQuery(document).ready(function($) {

				$('#banner-slide').bjqs({
					animtype : 'slide',
					height : 290,
					width : 1200,
					showmarkers : false,
					responsive : true,
					randomstart : false,
					nexttext : '>',
					prevtext : '<'
				});

			});
		</script>
	</body>
</html>
