<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/styles.css">
    <title>Add Product</title>
</head>

<body>

    <form action="index.php" method="POST" id="product_form">

        <input type="hidden" name="page" value="add-item">

        <div class="options">
            <h1>Product ADD</h1>
            <div class="buttons">
                <input type="submit" name="action" value="Save">
                <input type="submit" name="action" value="Cancel">
            </div>
        </div>

        <div class="column">
            <div class="input-field">
                <label for="sku">SKU</label>
                <input type="text" name="sku" id="sku" value="<?php echo $_POST['sku'] ?? '' ?>">
            </div>

            <div class="input-field">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?? '' ?>">
            </div>

            <div class="input-field">
                <label for="price">Price ($)</label>
                <input type="text" name="price" id="price" value="<?php echo $_POST['price'] ?? '' ?>">
            </div>

            <div class="input-field">
                <label for="type">Type Switcher</label>
                <select name="type" id="productType" onChange="updateForm()">
                    <option value="none" hidden>Type Switcher</option>
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>

            <div class="hidden input-field">
                <label for="size">Disk Size (MB)</label>
                <input type="text" name="size" id="size" class="dvd" value="<?php echo $_POST['size'] ?? '' ?>">
            </div>

            <div class="hidden input-field">
                <label for="weight">Weight (KG)</label>
                <input type="text" name="weight" id="weight" class="book" value="<?php echo $_POST['weight'] ?? '' ?>">
            </div>

            <div class="hidden input-field">
                <label for="height">Height (cm)</label>
                <input type="text" name="height" id="height" class="furniture" value="<?php echo $_POST['height'] ?? '' ?>">
                <br>
                <label for="width">Width (cm)</label>
                <input type="text" name="width" id="width" class="furniture" value="<?php echo $_POST['width'] ?? '' ?>">
                <br>
                <label for="length">Length (cm)</label>
                <input type="text" name="length" id="length" class="furniture" value="<?php echo $_POST['length'] ?? '' ?>">
            </div>

            <div class="description"></div>

            <div class="error">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                }
                ?>
            </div>

        </div>

        <footer>Scandiweb test assignment</footer>

    </form>

</body>

</html>

<script src="./views/main.js"></script>
<script type="text/javascript">
    document.getElementById('productType').value = "<?php echo $_POST['type']; ?>";
    updateForm();
</script>