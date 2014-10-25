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
            if(true)
            {
                $error = false;

                if(empty($_POST["fullname"]))
                {
                    $error = true;
                    $msg = "must enter name";
                }
                else if(empty($_POST["email"]))
                {
                    $error = true;
                    $msg = "must enter email";
                }
                else if(!is_numeric($_POST["phone"]))
                {
                    $error = true;
                    $msg = "invalid phone number";
                }
                else if(!is_numeric($_POST["zip"]))
                {
                    $error = true;
                    $msg = "invalid zip code";
                }
                
                if($error === false){
                    $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
                    $pdo->exec("insert into users set fullname='".$_POST["fullname"]."', email='".$_POST["email"]."', phone='".$_POST["phone"]."', zip='".$_POST["zip"]."';");
                }
                else{     
                    echo "<p style='color:red;font-weight:bold'>", $msg, "</p>";
                    $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
                }
                
                $users = $pdo->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);
                    
                    echo '<table border="1">'; 
                echo '<tr><th>Index</th><th>ID</th><th>Email</th>';
                echo '<th>fullname</th><th>phone</th><th>ZIP</th><th></th><th></th></tr>';
                foreach ($users as $key => $value) {
                    echo '<tr>';
                     echo '<td>', $key ,'</td>';
                     echo '<td>', $value['id'] ,'</td>';
                     echo '<td>', $value['email'] ,'</td>';
                     echo '<td>', $value['fullname'] ,'</td>';
                     echo '<td>', $value['phone'] ,'</td>';
                     echo '<td>', $value['zip'] ,'</td>';          
                     echo '<td><a href="update.php?id=',$value['id'],'">Update</a></td>';          
                     echo '<td><a href="delete.php?id=',$value['id'],'">Delete</a></td>';          
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>
    </body>
</html>
