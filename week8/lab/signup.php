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
		include("header.php");
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

</body>
</html>
