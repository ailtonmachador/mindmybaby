<?php
  
  require("connection.php");
  require("create_tables_script.php");

  $conect = new mysqli($host,  $user,  $password, $db);
function create_tables_for()
{
    require("connection.php");
    $conect = new mysqli($host,  $user,  $password, $db);

    $table = 'login'; //table to be create
    //create table if it doesn't exists
    $login_table = "CREATE TABLE IF NOT EXISTS  $table (       
    id int(30),   
    acess_level int (1),
    email VARCHAR(45),
    user_password VARCHAR(45) ,
    users_name VARCHAR(45),
    PRIMARY KEY (email) 
   )ENGINE = innodb;";

    $parent_testimonial_table = "CREATE TABLE IF NOT EXISTS parent_testimonial(
   cod_testimonial  int (30),
   email VARCHAR(45) NULL,
   services VARCHAR(45) NULL,
   firstname VARCHAR(45) NULL,
   comment VARCHAR(100) NULL,
   displayed VARCHAR(45) NULL,
   days_date VARCHAR(45) NULL,
   PRIMARY KEY (cod_testimonial), 
   INDEX email_idx (email ASC) VISIBLE,
   CONSTRAINT email
     FOREIGN KEY (email)
     REFERENCES child_care.login (email)
     ON DELETE CASCADE
     ON UPDATE CASCADE) ENGINE = innodb;";
      
    
      $child = "  CREATE TABLE child (
        cod_child int (30) NOT NULL,  
        child_name VARCHAR(45) NOT NULL,
        days_in_childcare VARCHAR(45) NULL,
        course_time VARCHAR(45) NULL,
        categories VARCHAR(45) NULL,
        email VARCHAR(45) NOT NULL,        
        PRIMARY KEY (`cod_child`, `child_name`),
        INDEX `email_idx` (`email` ASC) VISIBLE,
        CONSTRAINT `parents_email`
          FOREIGN KEY (`email`)
          REFERENCES `child_care`.`login` (`email`)
          ON DELETE CASCADE
          ON UPDATE CASCADE) ENGINE = innodb;";

    $event = "CREATE TABLE IF NOT EXISTS  events(       
        event_name VARCHAR(30),   
        event_text_body VARCHAR (200),        
        PRIMARY KEY (event_name) 
     )ENGINE = innodb;";

    $Contact_us = "CREATE TABLE IF NOT EXISTS Contact_us(
        name varchar(256) NOT NULL,
        email varchar(256) NOT NULL,
        Phone_no varchar(255) NOT NULL,
        message TEXT(65535) NOT NULL,
        PRIMARY KEY(email)
      );";

      


    $run  = @mysqli_query($conect, $login_table); // Run create login table.
    $run2  = @mysqli_query($conect, $parent_testimonial_table); // Run create parent_testimonial table.
    $run3  = @mysqli_query($conect, $child); // Run create child table.
    $run4   =@mysqli_query($conect, $Contact_us); // Run create contact us table.
    $run5   =@mysqli_query($conect, $event); // Run create event table.
    
    $errors = array(); // create an errors array to record errors if any.

    //check if table was create
    if ($run) {
    } else {

        $errors[] = "error to create login table!";
    }

    if ($run2) {
    } else {

        $errors[] = "error to create parent_testimonial table!";
    }
    if ($run3) {
    } else {

        $errors[] = "error to create child table!";
    }
    if ($run4) {
    } else {

        $errors[] = "error to create contact_us table!";
    }
    if ($run5) {
    } else {

        $errors[] = "error to create event table!";
    }
}
//if event is null then print msg "new events comming soon..."
$check_if_event_is_empty = "SELECT * FROM events;";
$select_all_events_sql = mysqli_query($conect, $check_if_event_is_empty); //run query              
//$line =  mysqli_fetch_assoc($select_all_events_sql);           //put data into an array
if( mysqli_num_rows($select_all_events_sql) < 1){
    $insert_run_query = "INSERT INTO  events (event_name)
    VALUES ('comming soon');";
    $run_event_insert = @mysqli_query($conect, $insert_run_query);    //run query insert values
}






   //remove blank space and hyphen
    function replace_function($string){
        $str = $string;
        $remove_blank_space = str_replace(' ', '', $str);
        $remove_hyphen = str_replace('-', '', $remove_blank_space);
        $str_after_replace =  $remove_hyphen;
        return $str_after_replace;
    }

    //create a unic ID for each person register
    function createID(){
        $id = rand(1, 10000);
        return($id);
    }

   
   
 
  if($_SERVER['REQUEST_METHOD'] == "POST"){  
    require("create_tables_script.php");
    // create_tables_for_bd();
    create_tables_for();
    

    
  $table = 'login'; //table to be create

  $conect = new mysqli($host,  $user,  $password, $db);

  
//    $conect = new mysqli($host,  $user,  $password, $db);

//    $table = 'login'; //table to be create
  
//    //create table if it doesn't exists
//    $sql = "CREATE TABLE IF NOT EXISTS  $table (       
//     id int(30),   
//     acess_level int (1),
//     email VARCHAR(45),
//     user_password VARCHAR(45) ,
//     users_name VARCHAR(45) 
//    );";    
// //end create table


// $run  = @mysqli_query($conect, $sql); // Run create table.


// $errors = array(); // create an errors array to record errors if any.

// //check if table was create
// if($run){ 
    
   
// }else{

//   $errors[] = "error to create table!";
// }

     //validate user name 
     $name =  $_POST["name"]; 
     if(empty($name))  $errors[] = "name can't be empyt";
    //end validate user name 

    //validate email
    $email =  $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); //SANITIZE EMAIL
    
    if(empty($_POST['email'])){
        $errors[] = "email can't be empty";                
    }    
     
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {         
          //check if the email is already in the system
          $check_email_sql   = "SELECT email FROM $table where email = '$email';";  //check if email exist in the table
          $result_check_email_sql = mysqli_query($conect, $check_email_sql);        //run query $check_email_sql
          if($result_check_email_sql) {                                             //if run query succesfuly
             $num = mysqli_num_rows($result_check_email_sql);
             if($num >= 1) {                                                        //return number of rows in database with the email, to check if email is already registered
             $errors [] = "email already registered in the system";    
             }
         }  
         }else{
            $errors[] = "email has to be in correct formact: username@email.com"; 
           
     }
    //end validate email    

    //validate password
    $password =$_POST["psw"];

    if(empty($password)){
        $errors[] = "please check password field, it can't be empty";
    }

    $repeat_password  =  $_POST["psw-repeat"];
    

    if(password_verify( $password, $repeat_password) == 1){
        echo password_verify( $password, $repeat_password) == false;
        $errors[] = "passwords are different!, please check filed and try again";
    } //check if passwords are equals

    // end validate password
    
    //---------------------------- creating id --------------------------------------------------------------
    $id = createID();                                                   //call method to create id using the function rand
    $try_new_id = true;                                                 //it's set as true to goes to while loop
    while($try_new_id = true){
        //now it's set as false for don't reapet again
        $try_new_id = false;
        $check_id_sql   = "SELECT id FROM $table where id = '$id';";    //check if vin exist in the table
        $result_id_sql = mysqli_query($conect, $check_id_sql);          //run query $check_vin_sql
        if($result_id_sql) {                                            //if run query succesfuly
            $num = mysqli_num_rows($result_id_sql);
            if($num >= 1) {                                             //return number of rows in database with the id, to check if id is already registered
            $id = createID();                                           //id already in, then do  a new id
            $try_new_id = true;                                         //repeat the while and check again if the id is already in 
            }else $try_new_id = false;  break;                          //if id not in, get out of looping
        } 
    }
    //------------------------- end creating id ------------------------------------------------------------------

    //---------------------------- acess level--------------------------------------------------------------------
    //access level will difiny what kind of content the user can see
    //for a simple registration (member with no children registrated in this childcare) the access level is 1
    //if this user register any child in the system, the access level will raise for 2
    // admin will have access level 3
    $access_level = 1;
    //------------------------ end  acess level--------------------------------------------------------------------

   

    if (empty($errors)) { // if no errors process input
        // $q = "INSERT INTO  $table (email, user_password, users_name, childs_name, course_time, days_in_childcare)
        // VALUES ('$email', '$password',  '$name', '$child_name', '$course_time', '$days_in_childcare');";

        $q = "INSERT INTO  $table (id, acess_level, email, user_password,  users_name)
        VALUES ('$id','$access_level', '$email', '$password', '$name');";
       $run3 = @mysqli_query($conect, $q);    //run query insert values
             

       if($run3){                                  
        echo "register made successfully, redirecting page...";      
        header("Refresh: 3;url=..\login.html");
    }else{
        $errors[] = "error insert into";                 
    }   

    } else {
            echo "<h2>Error!</h2><h3>The following error(s)
            occurred:</h3>";
            foreach ($errors as $msg) {
            echo "- $msg <br/>";
            echo "<h3><a href='register.html'>return</a></h3>";
        }
    } //end for errors   


  }//end if $_SERVER
  ?>