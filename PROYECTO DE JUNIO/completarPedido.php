<?php
include_once("./db_configuration.php");
    session_start();
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = [];
    }
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $mysqli->connect_error);
          exit();
    }
    $connection->query("INSERT INTO pedidos VALUES(NULL, '".date("Y-m-d")."', ".$_SESSION['id'].") ;");
    $result = $connection->query("SELECT MAX(idPedido) AS Pedido FROM pedidos WHERE codigou = ".$_SESSION['id'].";");
    $obj = $result->fetch_object();

    foreach($_SESSION['carrito'] as $producto => $cantidad){
        $resultado = $connection->query("SELECT precio, cantidad FROM libro WHERE codigol = ".$producto.";");
        $libro = $resultado->fetch_object();
        echo '<pre>'.print_r($libro,true).'</pre>';
        echo '<pre>'.print_r($obj,true).'</pre>';
        if($libro->cantidad-$cantidad >= 0){
            $connection->query("INSERT INTO detallespedido VALUES(NULL, ".$producto.", ".$obj->Pedido.", ".$cantidad.", ".$libro->precio.");");
            $connection->query("UPDATE libro SET cantidad = cantidad-".$cantidad." WHERE codigol = ".$producto.";");
        }
    }
	unset($_SESSION['carrito']);
    header("location: indexusuario.php");

?>
