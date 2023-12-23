<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin-style.css">
    <title>Admin</title>
</head>

<body>
<?php
global $database;
global $idProductUpdate;
include 'update-product.php';
include '../connection.php';

$catalogProducts = $database->query("SELECT * FROM `products`");
?>
<div class="option-panel">
    <h3>Admin panel</h3>
    <form class="added panel" action="add-product.php" method="post">
        <p class="add title-option">Add product</p>
        <div class="input-container name-product">
            <input type="text" name="title-product" required=""/>
            <label>Title</label>
        </div>
        <div class="input-container price-product">
            <input type="number" name="price-product" required=""/>
            <label>Price</label>
        </div>
        <div class="input-container url-img-product">
            <input type="text" name="image-product" required=""/>
            <label>Url image</label>
        </div>
        <button class="base-btn btn-add" name="button-add-product">ADD</button>
    </form>
    <form class="deleted panel" action="delete-product.php" method="post">
        <p class="delete title-option">Delete product</p>
        <div class="input-container id-product">
            <input type="number" name="id-product-to-delete" required=""/>
            <label>Id</label>
        </div>
        <button class="btn-del" name="button-to-delete-product">DELETE</button>
    </form>
    <div class="updated panel">
        <p class="update title-option">Update product</p>
        <form class="find-product" action="index.php" method="post">
            <div class="input-container id-product">
                <input type="number" name="id-update-product" required=""/>
                <label>Id</label>
            </div>
            <button class="btn-del" name="button-find-product">FIND</button>
        </form>
        <?php
        if (isset($_POST["button-find-product"])) {
            $idProduct = htmlentities($_POST["id-update-product"]);
            $updProduct = $database->query("SELECT * FROM `products` WHERE `Id` = $idProduct");
            $idProductUpdate = $idProduct;
            if ($updProduct->num_rows == 1) {
                foreach ($updProduct as $item)
                echo '<form class="panel change-product" action="update-product.php" method="post">';
                echo '<input type="text" name="id-product-change" class="id-prod-update" value="'.$item["Id"] . '"/>';
                echo '<div class="input-container name-product">';
                echo '<input type="text" name="old-name-product" required="" value="' . $item["Title"] . '"/>';
                echo '<label>Title</label>';
                echo '</div>';
                echo '<div class="input-container price-product">';
                echo '<input type="number" name="old-price-product" required="" value="' . $item["Price"] . '"/>';
                echo '<label>Price</label>';
                echo '</div>';
                echo '<div class="input-container url-img-product">';
                echo '<input type="text" name="old-image-product" required="" value="' . $item["Image"] . '" />';
                echo '<label>Url image</label>';
                echo '</div>';
                echo '<button class="base-btn btn-add" name="button-update-product">UPDATE</button>';
                echo '</form>';
            } else {
                echo "<p>Not find product</p>";
            }
        }
        ?>
    </div>
</div>
<div class="list-products">
    <div class="name-columns">
        <p style="border-right: solid;">Id</p>
        <p style="border-right: solid;">Image</p>
        <p style="border-right: solid;">Name product</p>
        <p>Price (₴)</p>
    </div>
    <?php
    foreach ($catalogProducts as $product) {
        echo '<div class="info-product">';
        echo '<p style="border-right: solid;">' . $product['Id'] . '</p>';
        echo '<div style="border-right: solid; padding-top: 3%;">';
        echo '<img src="' . $product['Image'] . '" alt="" width="90%">';
        echo '</div>';
        echo '<p style="border-right: solid;">' . $product['Title'] . '</p>';
        echo '<p>' . $product['Price'] . '</p>';
        echo '</div>';
    }
    ?>
</div>
</div>
</body>

</html>

