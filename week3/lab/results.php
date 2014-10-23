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
            if(!empty($_POST))
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

                    $pdo->exec("insert into userdata set fullname='".$_POST["fullname"]."', email='".$_POST["email"]."', phone='".$_POST["phone"]."', zip='".$_POST["zip"]."';");

                    $users = $pdo->query("select * from userdata")->fetchAll(PDO::FETCH_ASSOC);

                    foreach($users as $user)
                    {
                        foreach($user as $key => $value)
                        {
                            echo "<p>", $key, ": ", $value, "</p>";
                        }
                    }
                }
                else{     
                    echo "<p style='color:red;font-weight:bold'>", $msg, "</p>";
                    $pdo = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

                    $users = $pdo->query("select * from userdata")->fetchAll(PDO::FETCH_ASSOC);

                    foreach($users as $user)
                    {
                        foreach($user as $key => $value)
                        {
                            echo "<p>", $key, ": ", $value, "</p>";
                        }
                    }
                }
            }
        ?>
    </body>
</html>
