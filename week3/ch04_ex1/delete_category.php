<?php

    $category = $_POST['name'];

    require_once('database.php');
    
    $query = "DELETE FROM categories
              WHERE categoryName = '$category'";
    
    $db->exec($query);
    
    include 'category_list.php';
?>