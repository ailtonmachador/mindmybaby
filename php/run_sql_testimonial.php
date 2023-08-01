<?php
if (!isset($_SESSION)) session_start();
require ('db.php');
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conect = new mysqli($host,  $user,  $password, $db);
    $errors = array();

     $cod_testimonial = $_SESSION['cod'];           //retrive cod_testimonial

     $optionsDisplay = $_POST['optionsDisplay'];    //retrive display option yes/no 

     $update_display_testimonial  = "UPDATE parent_testimonial SET displayed = '$optionsDisplay' WHERE cod_testimonial = '$cod_testimonial';";                  
     $run3 = @mysqli_query($conect, $update_display_testimonial);    //run query insert values
     
     if( $run3 ){
        unset($_SESSION["cod"]); 
        echo "register made successfully, redirecting page...";      
        header("Refresh: 3;url=testimonia_search.php");
     }else{
         echo 'error';
     }
    }

?>