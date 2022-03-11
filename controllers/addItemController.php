<?php

class AddItemController extends Controller
{

    public function defaultAction()
    {
        include 'views/add-item.php';
    }

    public function cancelAction()
    {
        include 'views/product-list.php';
    }

    public function saveAction()
    {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        // creates product object based on selected type
        $className = $_POST['type'];
        $type = $className;
        if ($className !== 'none') {
            include "models/products/" . $className . ".php";
            $className = ucfirst($className);
            $product = new $className();

            // validates numeric fields
            $validation = new Validation();
            $exceptions = array('sku', 'name');
            $product->performActionForEachInput($validation, 'validateNumeric', $exceptions);

            // validates empty fields 
            $product->performActionForEachInput($validation, 'validateEmpty');

            // sets all properties, also SQL escapes values
            $prodProperties = $product->getPropertiesArray();
            foreach ($prodProperties as $property => $key) {
                if (isset($_POST[$property])) {
                    $value = mysqli_real_escape_string($dbc, $_POST[$property]);
                    $action = 'set' . ucfirst($property);
                    $product->$action($value);
                }
            }
            $product->setProduct_specific();
            $product->setProduct_type($type);

            // no errors -> insert record to database
            if (!isset($_SESSION['error'])) {

                $db = new DatabaseActions($dbc);
                $sku = $product->getSku();
                $name = $product->getName();
                $price = $product->getPrice();
                $product_specific = $product->getProduct_specific();
                $product_type = $product->getProduct_type();
                $table_name = 'products';

                // create table if doesn't exist
                $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                 sku VARCHAR(50) NOT NULL, `name` VARCHAR(50) NOT NULL, price INT(6) UNSIGNED NOT NULL,
                 product_specific VARCHAR(20) NOT NULL, product_type VARCHAR(20) NOT NULL)";
                $db->executeQuery($sql);

                // insert row
                $sql = "INSERT INTO `$table_name`(sku, `name`, price, product_specific, product_type)
                 VALUES ('$sku', '$name', '$price', '$product_specific', '$product_type')";
                $db->executeQuery($sql);

                include 'views/product-list.php';
            } else {
                // if errors present
                include 'views/add-item.php';
                // shold i unset session errors after include ?
            }
        } else {
            // type not selected
            $_SESSION['error'] = 'Please, select product type';
            include 'views/add-item.php';
        }
    }
}
