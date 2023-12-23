<?php
session_start();

global $database;
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/shop-page-style.css">
    <title>My shop</title>
</head>
<body>
<div class="up-bar">
    <div class="user-info">
        <label>Username: </label>
        <?php
        echo '<input class="user-info" style="font-size: 100%" value="' . $_SESSION['user']['Username'] . '" disabled/>';
        ?>

    </div>
    <form action="action-btn.php" method="post" class="group-btn">
        <button class="btn-cart">Cart</button>
        <button name="btn-log-out" class="btn-exit">Log out</button>
    </form>
</div>
<div class="list-products">
    <?php
        $listProducts = $database->query("SELECT * FROM `products`");
        
        foreach ($listProducts as $product){
            $shortNameProduct = "";
            echo '<form class="product-card" action="in-cart.php" method="post">';
            echo '<div class="img-center">';
            echo '<img src="'.$product['Image'].'" width="150em"/>';
            echo '</div>';
            echo '<div style="display: flex;">';
            echo '<div style="font-size: 10px; text-align: left">Код:</div>';
            echo '<input name="id-product" style="border: 0;" value="'.$product['Id'].'"/>';
            echo '</div>';
            if (iconv_strlen($product['Title']) > 45){
                $shortNameProduct = mb_substr($product['Title'], 0, 45).'...';
            }
            else
                $shortNameProduct = $product['Title'];
            echo '<p style="height: 3.7em;">'.$shortNameProduct.'</p>';
            echo '<div style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 0.9em;">';
            echo '<p>'.$product['Price'].'₴</p>';
            echo '<button class="btn-buy">Buy</button>';
            echo '</div></form>';
        }
    ?>
</div>
</body>
</html>

