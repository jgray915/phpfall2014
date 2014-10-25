<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        
        <?php
        // put your code here
        
        $id = filter_input(INPUT_GET, 'id');

        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

        $dbs = $db->prepare('delete from users where id = :id');

        $dbs->bindParam(':id', $id, PDO::PARAM_INT);
        
        
        if ( $dbs->execute() && $dbs->rowCount() > 0 )  
        {
            echo "User with ID $id deleted.";
        }
        else 
        {
            echo 'User was not deleted.';
        }
        
        ?>
        <a href="results.php">View Users</a>
    </body>
</html>
