<?php

class ProductListController extends Controller
{

    public function defaultAction()
    {
        include 'views/product-list.php';
    }

    public function addAction()
    {
        include 'views/add-item.php';
    }

    public function massDeleteAction()
    {
        $db = new DatabaseActions();

        if (isset($_POST['selected'])) {
            $id_list = array();
            foreach ($_POST['selected'] as $val) {
                $id_list[] = (int) $val;
            }
        }

        if (empty($id_list)) {
            include 'views/product-list.php';
            return;
        }

        $db->deleteChecked($id_list, 'products');
        include 'views/product-list.php';
    }
}
