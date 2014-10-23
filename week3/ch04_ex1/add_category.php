<?php

    $category = $_POST['name'];

    require_once('database.php');
    
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$category')";
    
    $db->exec($query);
    
    include 'category_list.php';
?>