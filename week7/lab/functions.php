<?php

function checkEmail($email)
{
	$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
	$dbs = $db->prepare("select email from signup where email = :email");
	$dbs->bindParam(':email', $email);
	
	if ( $dbs->execute()  && $dbs->rowCount() > 0) 
	{	
		return true;
	}
	else
	{
		return false;
	}
}

function checkPassword($password)
{
	$password = sha1($password);
	$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
	$dbs = $db->prepare("select password from signup where password = :password");
	$dbs->bindParam(':password', $password);
	
	if ( $dbs->execute()  && $dbs->rowCount() > 0) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function checkLogin($email, $password)
{
	$password = sha1($password);
	$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");
	$dbs = $db->prepare("select email, password from signup where password = :password and email = :email");
	$dbs->bindParam(':password', $password);
	$dbs->bindParam(':email', $email);
	
	if ( $dbs->execute()  && $dbs->rowCount() > 0) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateEmail($email)
{
     if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false )
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validatePassword($password)
{
	if ( strlen($password) < 4 )
	{
		return false;
	}
	else
	{
		return true;
	}
}