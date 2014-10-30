<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $result = $db->query($query);
    return $result;
}

function get_category_name($category_id) {
    global $db;
    $query = "SELECT * FROM categories
              WHERE categoryID = $category_id";
    $category = $db->query($query);
    $category = $category->fetch();
    $category_name = $category['categoryName'];
    return $category_name;
}

function add_category($id, $name) {
    global $db;
    $dbs = $db->prepare('insert into categories(categoryID, categoryName) values (:id, :name);');
    $dbs->bindParam(':name', $name, PDO::PARAM_STR);
    $dbs->bindParam(':id', $id, PDO::PARAM_INT);
    if ( $dbs->execute() && $dbs->rowCount() > 0 )  
    {
        return "Category $name with ID $id created.";
    }
    else 
    {
        return 'Category was not created.';
    }
}

function delete_category($id) {
    global $db;
    $dbs = $db->prepare('delete from categories where categoryID = :id');
    $dbs->bindParam(':id', $id, PDO::PARAM_INT);
    if ( $dbs->execute() && $dbs->rowCount() > 0 )  
    {
        return "Category with ID $id deleted.";
    }
    else 
    {
        return 'Category was not deleted.';
    }
}
