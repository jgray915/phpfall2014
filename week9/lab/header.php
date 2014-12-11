<p><a href='index.php'>Home</a></p>

<p><a href='admin.php'>Admin</a></p>

<p><a href='signup.php'>Sign Up</a></p>
<?php
session_start();

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) 
{
	echo "<p><a href='?logout=true'>Log out</a></p>";
    
} 
else 
{
	echo "<p><a href='login.php'>Log in</a></p>";
}

if ( !empty($_GET) && $_GET['logout'] === 'true' ) {
                    $_SESSION['loggedIn'] = false; 
                    header('Location: login.php');
                }
?>