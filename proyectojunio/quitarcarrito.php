<?php
    session_start();
    include_once("./db_configuration.php");
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = [];
    }
    if(isset($_REQUEST['id']) && $_REQUEST['id'] != ''){
        if(isset($_SESSION['carrito'][$_REQUEST['id']]) && intval($_SESSION['carrito'][$_REQUEST['id']]) > 0){
            $_SESSION['carrito'][$_REQUEST['id']]--;
            
        } else{
            unset($_REQUEST['carrito'][$_REQUEST['id']]);
        }
    }
    if(intval($_SESSION['carrito'][$_REQUEST['id']]) == 0){
        unset($_SESSION['carrito'][$_REQUEST['id']]);
    }
    header("location: ".$_SERVER['HTTP_REFERER']);

?>
