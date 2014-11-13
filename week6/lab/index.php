<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #wrapper{
                width:500px;
                margin:auto;
                border:1px solid black;
                background-color: lightblue;
                padding: 1em;
            }
            #message{
                
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <h3>Please Sign Up:</h3>
            <form action="#" method ="post">
                <label>Email:</label><br>
                <input type="text" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email']; ?>"/><br><br>
                <label>Password:</label><br>
                <input type="text" name="password"><br><br>
                <input type="submit">
            </form>
            <?php
                if(isset($_POST['email']) && isset($_POST['password'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $message = "";
                    $error = false;

                    if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false )
                    {
                        $error = true;
                        $message = "Must enter valid email.<br>";
                    }
                    if ( strlen($password) < 4 )
                    {
                        $error = true;
                        $message = "Password must be at least 4 characters.<br>";
                    }
                    if($error == false)
                    {
                        $password = sha1($password);
                        
                        $db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
                        $dbs = $db->prepare("insert into signup(email,password) values (:email, :password)");
                        $dbs->bindParam(':email', $email);
                        $dbs->bindParam(':password', $password);
                        
                        if ( $dbs->execute()  && $dbs->rowCount() > 0)  
                        {
                            $message = "Signed up successfully.";
                        }
                    }
                    
                    echo '<p id="message">', $message, '</p>';
                }
            ?>
        </div>
    </body>
</html>
