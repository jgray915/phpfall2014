<?php

$id = filter_input(INPUT_POST, 'id');
$fullname = filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$zip = filter_input(INPUT_POST, 'zip');

$db = new PDO("mysql:host=localhost;dbname=phpclassfall2014", "root", "");

$dbs = $db->prepare("update users set fullname = :fullname, email = :email, phone = :phone, zip = :zip where id = :id");

$dbs->bindParam(':id', $id, PDO::PARAM_INT);
$dbs->bindParam(':fullname', $fullname, PDO::PARAM_STR);
$dbs->bindParam(':email', $email, PDO::PARAM_STR);
$dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
$dbs->bindParam(':zip', $zip, PDO::PARAM_STR);

if ( $dbs->execute()  && $dbs->rowCount() > 0)  
{
    echo "<p>User updated</p>";
    echo '<a href="results.php">View Users</a>';
    echo  $dbs->rowCount();
}
else
{
    echo "<p>User not updated</p>";
    echo '<a href="results.php">View Users</a>';
}