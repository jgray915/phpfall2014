<?php
$action = 'home';
if ( !empty($_POST) && isset($_POST['action']) ) 
{
    $action = filter_input(INPUT_POST, 'action');
} 
else if ( !empty($_GET) && isset($_GET['action']) )
{
    $action = filter_input(INPUT_GET, 'action');
}
if ( $action === 'view_users' ) 
{
    include 'views/header.php';
    include 'views/view_users.php';
    include 'views/footer.php';
} 
else if ( $action === 'add_user' ) {
    include 'views/header.php';
    include 'views/add_user.php';
    include 'views/footer.php';
} 
else {
    include 'views/header.php';
    include 'views/home.php';
    include 'views/footer.php';
}