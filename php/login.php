<?php
session_start();
    require("connection.php");
    require("create_tables_script.php");
     
    echo $email =  $_POST["email"];
 
    //remove blank space and hyphen
     function replace_function($string){
         $str = $string;
         $remove_blank_space = str_replace(' ', '', $str);
         $remove_hyphen = str_replace('-', '', $remove_blank_space);
         $str_after_replace =  $remove_hyphen;
         return $str_after_replace;
     }
     
  
   if($_SERVER['REQUEST_METHOD'] == "POST"){   
    $conect = new mysqli($host,  $user,  $password, $db);

    $table = 'login';

    $errors = array(); // create an errors array to record errors if any.
        
        //validate email
        $email =  $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); //SANITIZE EMAIL
        
        if(empty($_POST['email'])){
            $errors[] = "email can't be empty";                
            header("Location: ..\login.html"); exit; //if email blank then return to login.html
           
        }    

         //validate password
         $password = $_POST["psw"];
         
    
         if(empty($password)){
             $errors[] = "please check password field, it can't be empty";
         }    
         // end validate password

         $real_password;

        //check if email exist in database
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {         
            //check if the email is already in the system
            $check_email_sql   = "SELECT * FROM $table where email = '$email';";  //check if email exist in the table
            $result_check_email_sql = mysqli_query($conect, $check_email_sql); //run query $check_email_sql
            if($result_check_email_sql) {                                    //if run query succesfuly
               $num = mysqli_num_rows($result_check_email_sql);
               if($num == 0) {                        //return number of rows in database with the email, to check if email is already registered
                    $errors [] = "email not registered in the system, please register as a member";    
               }else{                   
                  if($result_check_email_sql ){                       
                          while ($row = mysqli_fetch_array($result_check_email_sql)) {  
                              $id = $row['id'];
                              $access_level = $row['acess_level'];                              
                              $user_name = $row['users_name'];
                              $email = $row['email'];
                              $real_password = $row['user_password'];  
                              //store all data in a string
                              $result = mysqli_fetch_assoc($result_check_email_sql);
                               // if session does not exist, then a session is started

                              
                                //--------------------------------------------------------------------test
                            if (!isset($_SESSION)) session_start();
                                  //store it on sessions to be used later to know if user is logged in
                                  $_SESSION['acess_level'] =  $access_level;
                                  $_SESSION['id'] =  $id;                                  
                                  $_SESSION['user_name'] =  $user_name;
                                  $_SESSION['user_password'] =   $real_password;
                                  $_SESSION['email'] =  $email;                                                                  

                                  header("Location: access_level.php"); exit; //if email and password valide then redirect to home page
                                  //it has to move to be improved to get the access level 
                                  //to redirect for the right page to the right access

                                //-------------------------------------------------------------------test  
                              
                                if($real_password != $password){                                     
                                  $errors[] = "password does not match, please check it again!";                                    
                              } //check if passwords are equals
                          }
                      
                  }
               }
           }
         } else{
            $errors[] = "email has to be in correct formact: username@email.com";                
         }
        //end validate email    
        if (empty($errors)) { // if no errors process input
           
                echo "<h1> redirect for home page</h1>";
              
        
            } else {
                    echo "<h2>Error!</h2><h3>The following error(s)
                    occurred:</h3>";
                    foreach ($errors as $msg) {
                    echo "- $msg <br/>";
                    echo "<h3><a href='../login.html'>return</a></h3>";
                }
            } //end for errors   
        
          }//end if $_SERVER
?>