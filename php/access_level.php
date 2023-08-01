<?php
    if (!isset($_SESSION)) session_start();

     //check if there's a variable in the session that identify acess_level
   if (!isset($_SESSION['acess_level']) ){
     // detroy the session for security 
     session_destroy();
     //redirect user to login page
     header("Location: ..\home.html"); exit;
     }
     else   if ($_SESSION['acess_level'] == '1'){
      header("Location: ..\home_members.html"); exit;      
    }
  
     else   if ($_SESSION['acess_level'] == '2'){
      header("Location: ..\home_parents.html"); exit;      
    }
    
    else   if ($_SESSION['acess_level'] == '3'){
      header("Location: ..\home_admin.html"); exit;      
    }
    
?>