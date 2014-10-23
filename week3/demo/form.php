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
        
        <form action="#" method="post">
            
            <label>Full Name:</label>
            <input type="text" name="fullname" value=""><br>
            <label>Email:</label>
            <input type="text" name="email" value=""><br>
            <label>Phone:</label>
            <input type="text" name="phone" value=""><br>
            <label>Zip Code:</label>
            <input type="text" name="zip" value=""><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        // put your code here
        if(!empty($_POST))
        {
            
            $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
                
            $pdo->exec("insert into users set fullname='".$_POST["fullname"]."', email='".$_POST["email"]."', phone='".$_POST["phone"]."', zip='".$_POST["zip"]."';");
            
            $users = $pdo->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($users as $user)
            {
                foreach($user as $key => $value)
                {
                    echo "<p>", $key, ": ", $value, "</p>";
                }
            }
        }
        ?>
    </body>
</html>
