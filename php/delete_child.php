<?php
if (!isset($_SESSION)) session_start();
require ('db.php');
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conect = new mysqli($host,  $user,  $password, $db);
    $errors = array();

     $cod_child = $_SESSION['cod_child_to_delete'];                      //retrive cod_child
     
     $optionsDelete = $_POST['optionsDelete'];          //retrive display option yes/no 
     $search_cod_children = $_SESSION["cod_child_to_delete"];
    if($optionsDelete == 'yes'){
            $delete_child  = "DELETE child, login from child INNER JOIN login ON login.email = child.email where cod_child = $search_cod_children;";                  
            $run3 = @mysqli_query($conect, $delete_child);    //run query insert values
            
            if( $run3 ){
                unset($_SESSION["cod"]); 
                echo "register made successfully, redirecting page...";      
                header("Refresh: 3;url=admin_children.php");
            }else{
                echo 'error';
            }
    }else{
        echo "register made successfully, redirecting page...";      
                header("Refresh: 3;url=admin_children.php");
    }
     
    }

?>