<?php

require_once 'controllers/Controller.php';
require_once 'models/databaseConnection.php';
require_once 'models/products/product.php';
require_once 'models/validation.php';
require_once 'models/databaseActions.php';

DatabaseConnection::connect('localhost', 'kachok', 'kachok123', 'products');

$page = $_GET['page'] ?? $_POST['page'] ?? 'product-list';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

if ($page == 'add-item') {
    include 'controllers/addItemController.php';
    $addItemController = new AddItemController();
    $addItemController->runAction($action);
} else {
    include 'controllers/productListController.php';
    $productListController = new ProductListController();
    $productListController->runAction($action);
}
