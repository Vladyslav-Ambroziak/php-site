<?php
global $database;
include '../connection.php';

if(isset($_POST["button-update-product"])){
    $idProductUpdate = intval(htmlentities($_POST["id-product-change"]));
    $newNameProduct = htmlentities($_POST["old-name-product"]);
    $newPriceProduct = htmlentities($_POST["old-price-product"]);
    $newImageProduct = htmlentities($_POST["old-image-product"]);
    $database->query("UPDATE `products` SET `Title`='".$newNameProduct."',`Price`='".$newPriceProduct."',`Image`='".$newImageProduct."' WHERE `Id`= $idProductUpdate");
    header("location: index.php");
}
?>