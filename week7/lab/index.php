<!--
Now that your signup page is complete, we need to work on the next step.

Create some functions that will be needed to help with this application.

*check log in - function that will take an email and password and confirm that it
    is found in the database.
*check if email exist  - function to check if an email exist in the database
*valid email - function to check if an email is valid
*valid password - function to check if a password is valid

When  these functions are complete, please make sure to update the code to use 
these functions.

Also when error checking use an array to collect the error messages.  Once all 
error messages are collected you can loop and display them above the log in 
form. 

Hint: if you did this with $error_messages you can replace this with pushing the
message into the array.

if your wondering how to check the email or log in, you can have the function 
return true if the record is found in the database.

For example a user inputs test@test.com and test as the password.  You can then 
check if the email and the hash password exist in the database.  If a record is 
found then the user entered the correct email and password.
-->

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
        <div id="signup">
            <h3>Please Sign Up:</h3>
            <form action="#" method ="post">
                <label>Email:</label><br>
                <input type="text" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email']; ?>"/><br><br>
                <label>Password:</label><br>
                <input type="password" name="password"><br><br>
                <input type="submit">
            </form>
            <?php
				include("functions.php");
				
                if(isset($_POST['email']) && isset($_POST['password'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
					$messages = array();
                    $error = false;

                    if ( validateEmail($email) === false )
                    {
                        $error = true;
                        array_push($messages, "Must enter valid email.<br>");
                    }
                    if ( validatePassword($password) === false)
                    {
                        $error = true;
                        array_push($messages, "Password must be at least 4 characters.<br>");
                    }
					if ( checkEmail($email) === true)
                    {
                        $error = true;
                        array_push($messages, "Email already exists.<br>");
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
                            array_push($messages, "Signed up successfully.");
                        }
                    }
                    
					foreach($messages as $message)
					{
						echo '<p class="message">', $message, '</p>';
					}
                }
            ?>
        </div>
		
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
                if(isset($_POST['email2']) && isset($_POST['password2'])){
                    $email = $_POST['email2'];
                    $password = $_POST['password2'];
					$messages = array();
                    $error = false;

					if ( checkLogin($email, $password) === false)
                    {
                        echo '<p class="message">Email or password incorrect.</p>';
                    }
                    else
					{
						echo "Logged in successfully.";
                    }
                }
            ?>
        </div>
		
		<!--
		
		<div id="testing">
            <h3>TESTING</h3>
            <?php
				$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
				$dbs = $db->prepare("select * from signup");
				
				if ( $dbs->execute()  && $dbs->rowCount() > 0) 
				{
					foreach($dbs->fetchAll() as $row)
					{
						echo '<p>'.$row['email'].' -- '.$row['password'].'</p>';
					}
				}
				else
				{
					echo "Database error.";
				}
            ?>
        </div>
		
		-->
		
    </body>
</html>
