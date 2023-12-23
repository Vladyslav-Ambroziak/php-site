<?php
global $database;
include '../connection.php';

if(isset($_POST["button-to-delete-product"])){
    $idProduct = htmlentities($_POST["id-product-to-delete"]);

    $database->query("DELETE FROM `products` WHERE `Id` = $idProduct");
    header("location: index.php");
}
?>