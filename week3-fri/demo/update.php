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
        // $id = $_GET['id'];
        $email = filter_input(INPUT_GET, 'email');
        // $email = $_GET['email'];
        
        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

        $dbs = $db->prepare('select * from users where id = :id or email = :email limit 1');
        
        $dbs->bindParam(':id', $id, PDO::PARAM_INT);
        $dbs->bindParam(':email', $email, PDO::PARAM_STR);
        
        
        if ( $dbs->execute() && $dbs->rowCount() > 0 ) 
        {
            $results = $dbs->fetch(PDO::FETCH_ASSOC);
            
            echo "<h1>ID: ",$results['id'],"</h1>";
            echo "<form>";
            echo '<input type="hidden" name ="id" value="',$id,'"/>';
            echo "<label>Name:</label>";
            echo '<input type="text" name ="name" value="',$results['fullname'],'"/></br>';
            echo '<label>Email:</label>';
            echo '<input type="text" name ="email" value="',$results['email'],'"/></br>';
            echo '<label>Phone:</label>';
            echo '<input type="text" name ="phone" value="',$results['phone'],'"/></br>';
            echo '<label>Zip:</label>';
            echo '<input type="text" name ="zip" value="',$results['zip'],'"/></br>';
            echo '<input type="submit" />';
            echo '</form>';

        } 
        else 
        {
            echo 'no data';
        }
        
        
        ?>
        <a href="viewpage.php">View Users</a>
    </body>
</html>
