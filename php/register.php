<?php
session_start();
require("connection.php");
if(!isset($_SESSION['acess_level'])){
    echo "<h1> you have to be loggin to register your child!!";
    echo "<a href='..\login.html'> login</a>";

}else{

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conect = new mysqli($host,  $user,  $password, $db);
//retriving acess level
$acces_level =  $_SESSION['acess_level'];
//end retriving acess level    
    
//validate course_time
    $course_time = $_POST["course_time"];
    if(empty($course_time)){
        $errors[] = "please check  course time period, it has to be part time or full time";
    }// end validate course_time
   
     //validate days_in_childcare
     $days_in_childcare = $_POST["days_in_childcare"];
     if(empty($days_in_childcare)){
         $errors[] = "please check  days in childcare field";
     }//end days_in_childcare

     //validate child_name
     $child_name = $_POST["child_name"];
     if(empty($child_name)){
        $errors[] = "please check child's name, it can't be empty";
     }        
     //end child_name

     //categories ---------------------------- 
     $categories =  $_POST["categories"]; 
    
     if($categories  == "choose"){
         $errors[] = "choose a category please.";
     }
     //end categories ------------------------

     $email     =  $_SESSION['email']; //get when user logged in
        
      //create a unic cod for each child register-------------
      function create_cod_child(){
        $id = rand(1, 10000);
        return($id);
        }
  
        $cod_child = create_cod_child();
        $try_new_cod = true;     
        while($try_new_cod = true){
          //now it's set as false for don't reapet again
          $try_new_cod = false;
          $check_cod_sql   = "SELECT cod_child FROM child where cod_child = '$cod_child';";    //check if vin exist in the table
          $result_cod_sql = mysqli_query($conect, $check_cod_sql);          //run query $check_vin_sql
          if($result_cod_sql) {                                             //if run query succesfuly
              $num = mysqli_num_rows($result_cod_sql);
              if($num >= 1) {                                               //return number of rows in database with the id, to check if id is already registered
                $cod_child = create_cod_child();                            //id already in, then do  a new id
                $try_new_cod = true;                                        //repeat the while and check again if the id is already in 
              }else $try_new_cod = false;  break;                           //if id not in, get out of looping
          } 
      }
      //-----end cod child ------------------------------

     if (empty($errors)) { // if no errors process input
        
        $table = 'child';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conect = new mysqli($host,  $user,  $password, $db);
            $email     =  $_SESSION['email'];      
            
            $cod_child2 = '111';
            
              $q = "INSERT INTO  child (cod_child, child_name, days_in_childcare, course_time, categories, email)
                    VALUES ('$cod_child', '$child_name', '$days_in_childcare','$course_time', '$categories', '$email');";
           

           
                $query_login   = "UPDATE login SET acess_level = '2' where email = '$email' AND acess_level='1';";            
               // $_SESSION['acess_level'] = '2';
                                              
       
       $run = @mysqli_query($conect, $q);    //run query insert values        
        $run2 =  @mysqli_query($conect, $query_login);    //run query set acess_level for 2 (user became a parent, different content will be show)       
        if($run){             
                  
        echo "<h1> child register made successfully</h1>";
        echo "<h3>redirecting page</a></h3>";
        header("Refresh: 3; url=access_level.php");
         }else{
              echo " error to insert ";        
              
            }   

    } else {
            echo "<h2>Error!</h2><h3>The following error(s)
            occurred:</h3>";
            foreach ($errors as $msg) {
            echo "- $msg <br/>";
            echo "<h3><a href='register.html'>return</a></h3>";
        }
    } //end for errors   
     }
    }
}
