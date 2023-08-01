<?php
session_start();
require('db.php');
require('connection.php');

$conect = new mysqli($host,  $user,  $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = pass_input($_POST['name']);
    $email = pass_input($_POST['email']);
    $Phone_no = pass_input($_POST['Phone_no']);
    $message = pass_input($_POST['message']);

    $errors = array();
    $conect = new mysqli($host,  $user,  $password, $db);

    // name validation
    if (empty($_POST['name'])) {
        $errors[] = 'Please enter your name'; // display error if empty
    } else {
        $name = pass_input($_POST['name']);
        if (preg_match('~[0-9]+~', $name)) {
            $errors[] = 'Please input only alphabet'; // prints this error if user input alphabet
        }
    }

    // email validation
    $mail = $_POST["email"];
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL); // SANITIZE EMAIL

    if (empty($_POST['email'])) {
        $errors[] = "Enter your email";
    }


    // Phone_no validation
    if (empty($_POST['Phone_no'])) {
        $errors[] = "Enter your Phone Number";
    } elseif (!is_numeric($Phone_no)) {
        $errors[] = "Please only numbers";
    } elseif (!preg_match('/^\d{10}$/', $Phone_no)) {
        $errors[] = "Please enter a valid Phone number of 10 characters";
    } else {
        $Phone_no = pass_input($_POST['Phone_no']);
    }

    // message validation
    if (empty($_POST['message'])) {
        $errors[] = 'Please input your message'; // display error if empty
    } else {
        $message = pass_input($_POST['message']);
    }

    if (empty($errors)) {
        $query = "INSERT INTO Contact_us (name,email,Phone_no,message) VALUES ('$name','$email','$Phone_no','$message');";
       
      
        $run = @mysqli_query($conect, $query);        
        
        //$run = mysqli_query($db_c, $query);
        if ($run) {
            echo "Thank you for contacting us, we will reply as soon as possible. Redirecting...";
            header("Refresh: 3;url=access_level.php");
        } else {
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
            echo 'Error while running query!  ';
            echo $email;
        }
    } else {
        echo "<h3>There is an error!</h3><h3>The following error(s) occurred:</h3>";
        foreach ($errors as $msg) {
            echo "- $msg <br/>";
        }
        echo "<h4>Please <a href='contact_us.html'>go back</a> and enter details properly!</h4>";
    }
}

function pass_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = str_replace('-', '', $data);
    return $data;
}
?>
