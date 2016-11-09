<?php
    session_start();
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = [];
    }
    if(isset($_REQUEST['id']) && $_REQUEST['id'] != ''){
        if(isset($_SESSION['carrito'][$_REQUEST['id']]) && intval($_SESSION['carrito'][$_REQUEST['id']]) >= 0){
            $_SESSION['carrito'][$_REQUEST['id']]++;
        }else{
            $_SESSION['carrito'][$_REQUEST['id']] = 1;
        } 
    }
    header("location: ".$_SERVER['HTTP_REFERER']);
?>
