<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/styles.css">
    <title>Product List</title>
</head>

<body>

    <form action="index.php" method="POST" id="">

        <input type="hidden" name="page" value="product-list">

        <div class="options">
            <h1>Product List</h1>
            <div class="buttons">
                <input type="submit" name="action" value="ADD" id="add-product-btn">
                <input type="submit" name="action" value="MASS DELETE" id="delete-product-btn">
            </div>
        </div>

        <div class="column list">
            <?php
            // fetch data then display
            $db = new DatabaseActions();
            $products = $db->selectAllGetAssoc();
            $product_attr = array('book' => 'Weight', 'furniture' => 'Dimensions', 'dvd' => 'Size');

            foreach ($products as $product) {
                echo "<div class='product-placeholder'>";

                echo $product['sku'] . '<br>';
                echo $product['name'] . '<br>';
                echo $product['price'] . '.00 $<br>';
                echo $product_attr[$product['product_type']] . ': ' . $product['product_specific'] . '<br>';
                echo "<input type='checkbox' name='selected[]' id='selected' value='$product[id]' class='delete-checkbox'/>";

                echo '</div>';
            }
            ?>
        </div>

        <footer>Scandiweb test assignment</footer>

    </form>

</body>

</html>