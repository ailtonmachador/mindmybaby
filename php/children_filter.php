<?php
if (!isset($_SESSION)) session_start();
require ('db.php');
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conect = new mysqli($host,  $user,  $password, $db);
    $errors = array();    

    $options_filter = $_POST['optionsDisplay'];    //retrive filter (child_name / parent name)

    //it will filter admin_children.php by childname or parent name
     $select_filter_children  = "SELECT  cod_child, child_name,days_in_childcare, course_time, categories, child.email, users_name FROM child
     JOIN login WHERE login.email = child.email ORDER BY $options_filter;";                  

     $run3 = @mysqli_query($conect, $select_filter_children);    //run query insert values
     
     if( $run3 ){
        header("Refresh: 0,1 ;url=\..\admin_children.php");
     }else{
         echo 'error';
     }
    }

?>