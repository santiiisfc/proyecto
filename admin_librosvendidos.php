<?php
include_once ("cabeadmin.php");
include_once("./db_configuration.php");
  $contenido = "";
 $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
  if ($connection->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      exit();
  }
  $contenido = "";
  if ($result = $connection->query("SELECT COUNT(*) AS pedidos, libro.titulo AS libro FROM detallespedido join libro on detallespedido.codigol=libro.codigol GROUP BY detallespedido.codigol ORDER BY libro.codigol DESC LIMIT 3 ;")) {
  while($obj = $result->fetch_object()) {
      if($contenido != ""){
        $contenido .= ', ';
      }
       $contenido.= '["'.$obj->libro.'", '.$obj->pedidos.']';
  }
//Free the result. Avoid High Memory Usages
$result->close();
unset($obj);
unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
?>
<html>
<a href="paneltotal.php" target="_self"> <input type="button" name="boton" value="Volver atras" /> </a>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar','corechart']});
      google.charts.setOnLoadCallback(drawStuff);
      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Cliente', 'Pedidos'],
          <?php
          echo $contenido;
           ?>
        ]);
        var options = {
          title: 'Libros más vendidos',
          width: 590,
          legend: { position: 'none' },
          chart: { title: 'Libros mas vendidos ',
                   subtitle: 'Libros más vendidos' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Libros'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };
        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;margin-top:40px;"></div>
  </body>
</html>
