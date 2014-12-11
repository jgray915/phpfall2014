<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #signup, #login, #testing{
                width:500px;
                margin:1em auto;
                border:1px solid black;
                background-color: lightblue;
                padding: 1em;
            }
			#login
			{
				background-color: lightgreen;
			}
			#testing
			{
				background-color: pink;
			}
            .message{
                
            }
        </style>
    </head>
    <body>
		<div id="login">
            <h3>Please Log In:</h3>
            <form action="#" method ="post">
                <label>Email:</label><br>
                <input type="text" name="email2" value="<?php if(isset($_POST['email2']))echo $_POST['email2']; ?>"/><br><br>
                <label>Password:</label><br>
                <input type="password" name="password2"><br><br>
                <input type="submit">
            </form>
            <?php
			include("Validator.php");
			include("header.php");
                        $v = new Validator;
			session_start();
			
                if(isset($_POST['email2']) && isset($_POST['password2'])){
                    $email = $_POST['email2'];
                    $password = $_POST['password2'];
					$messages = array();
                    $error = false;

					if ( $v->checkLogin($email, $password) === false)
                    {
                        echo '<p class="message">Email or password incorrect.</p>';
                    }
                    else
					{
						$_SESSION["loggedIn"] = true;
						header("Location: admin.php");
                    }
                }
            ?>
        </div>

    </body>
</html>
