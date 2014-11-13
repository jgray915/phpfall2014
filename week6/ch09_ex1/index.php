<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $message = 'Enter some data and click on the Submit button.';
        break;
    case 'process_data':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $error = false;
        /*************************************************
         * validate and process the name
         ************************************************/
        if($name != ''){
            $first = explode(' ', $name)[0];
        }   
        else{
            $error = true;
            $message = "Please enter a name.";
        }
        /*************************************************
         * validate and process the email address
         ************************************************/
        if(strpos($email, '@') == false || strpos($email, '.') == false){
            $error = true;
            $message = "Please enter a valid email.";
        }
        /*************************************************
         * validate and process the phone number
         ************************************************/
        $phone = str_replace('-', '', $phone);
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);
        if(strlen($phone) === 7 && is_numeric($phone)){
            $phone = substr_replace($phone, '-', 3, 0);
        }
        else if(strlen($phone) === 10 && is_numeric($phone)){
            $phone = substr_replace($phone, '-', 6, 0);
            $phone = substr_replace($phone, '-', 3, 0);
        }
        else{
            $error = true;
            $message = "Please enter a valid phone number.";
        }
        /*************************************************
         * Display the validation message
         ************************************************/
        
        if(!$error){
        $message = "Hello $first,\n\n".
                    "Thank you for entering this data:\n\n".
                    "Name: $name\n".
                    "Email: $email\n".
                    "Phone: $phone";
        }

        break;
}
include 'string_tester.php';
?>