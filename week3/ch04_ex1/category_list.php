<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $categories = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Product Manager</h1>
    </div>

    <div id="main">

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
    <!-- add code for the rest of the table here -->
    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=my_guitar_shop1", "root", "");
        $categories = $pdo->query("select * from categories")->fetchAll(PDO::FETCH_ASSOC);

        foreach($categories as $category)
        {
            foreach($category as $key => $value)
            {
                if($key === "categoryName")
                {
                    echo "<tr>";
                    echo "<td>", $value, "</td>";
                    echo "<td> <form action='delete_category.php' method='post'> <input type='hidden' name='name' value='$value'> <input type='submit' value='Delete'> </form> </td>";
                    echo "</tr>";
                }
            }
        }
    ?>
    </table>
    <br />

    <h2>Add Category</h2>
    
    <form action="add_category.php" method="post">
        <label>Name:</label>
        <input type="text" name ="name" />
        <input type="submit" value="Add" />
        
    </form>
    
    
    <br />
    <p><a href="index.php">List Products</a></p>

    </div> <!-- end main -->

    <div id="footer">
        <p>
            &copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.
        </p>
    </div>

    </div><!-- end page -->
</body>
</html>