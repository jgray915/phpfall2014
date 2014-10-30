<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

if ($action == 'list_products') {
    // Get the current category ID
    $category_id = $_GET['category_id'];
    if (!isset($category_id)) {
        $category_id = 1;
    }

    // Get product and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);

    // Display the product list
    include('product_list.php');
} else if ($action == 'delete_product') {
    // Get the IDs
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    // Delete the product
    delete_product($product_id);

    // Display the Product List page for the current category
    header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('product_add.php');
} else if ($action == 'add_product') {
    $category_id = $_POST['category_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Validate the inputs
    if (empty($code) || empty($name) || empty($price)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_product($category_id, $code, $name, $price);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
}

else if ($action == 'list_categories') 
{
    $categories = get_categories();
    
    echo '<table border="1">'; 
    echo '<tr><th>ID</th><th>Name</th></tr>';
    foreach ($categories as $value) {
        echo '<tr>';
         echo '<td>', $value['categoryID'] ,'</td>';
         echo '<td>', $value['categoryName'] ,'</td>';         
        echo '</tr>';
    }
    echo '</table>';
}

else if ($action == 'add_category') 
{
    include 'add_category.php';
    if(!empty($_POST['add_id']) && !empty($_POST['add_name']))
    {
        echo add_category($_POST['add_id'], $_POST['add_name']);
    }
}

else if ($action == 'delete_category') 
{
    include 'delete_category.php';
        if(!empty($_POST['del_id']))
    {
        echo delete_category($_POST['del_id']);
    }
}

?>