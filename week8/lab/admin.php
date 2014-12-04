<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #signup, #login, #testing, #admin{
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
		<div id="admin">
            <h3>Admin Page</h3>
            <?php
				include("header.php");
				session_start();
				
				if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true)
				{
					header("Location: login.php");
				}
				
				if ( !empty($_GET) && $_GET['logout'] === 'true' ) {
                    $_SESSION['loggedIn'] = false; 
                    header('Location: login.php');
                }
            ?>
        </div>

    </body>
</html>
