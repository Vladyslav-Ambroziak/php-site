<?php
global $database;
include '../connection.php';

if (isset($_POST["button-add-product"])) {
    $nameProduct = htmlentities($_POST["title-product"]);
    $priceProduct = htmlentities($_POST["price-product"]);
    $imageProduct = htmlentities($_POST["image-product"]);

    $database->query("INSERT INTO `products`(`Title`, `Price`, `Image`) VALUES ('$nameProduct','$priceProduct','$imageProduct')");
    header("location: index.php");
}

?>
