<?php
if (!isset($_SESSION)) session_start();
require ("db.php");
require("connection.php");
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conect = new mysqli($host,  $user,  $password, $db);

    $service = pass_input($_POST['service']);
    $days_date = pass_input($_POST['days_date']);
    $firstname = pass_input($_POST['firstname']);
    $comment = pass_input($_POST['comment']);
    $mail =  $_SESSION["email"];
    $errors = array();

      //service validation
      if(empty($_POST['service'])) {
      $errors[] = 'Please choose a service'; // display error if empty
      } else {
      $service =  pass_input($_POST['service']);
      }


      //The Date validation
      if(empty($_POST['days_date'])) {
      $errors[] = 'Please select date'; // display error if empty
      } else {
      $days_date =  pass_input($_POST['days_date']);
      }

      //First Name validation
      if(empty($_POST['firstname'])) {
      $errors[] = 'Please input your first name'; // display error if empty
      } else {
      $firstname =  pass_input($_POST['firstname']);
      //(preg_match('~[0-9]+~', $string))
      if (preg_match('~[0-9]+~',$firstname)) {
      $errors[] = 'Please input only alphabet';//prints this error if user input alphabet
      }
      }



      //comment validation
      if(empty($_POST['comment'])) {
      $errors[] = 'Please add a feedback'; // display error if empty
      } else {
      $comment =  pass_input($_POST['comment']);      
      }


      //create a unic cod for each testimonial register-------------
     function create_cod_testimonial(){
      $id = rand(1, 10000);
      return($id);
      }

      $cod_testimonial = create_cod_testimonial();
      $try_new_cod = true;     
      while($try_new_cod = true){
        //now it's set as false for don't reapet again
        $try_new_cod = false;
        $check_cod_sql   = "SELECT cod_testimonial FROM parent_testimonial where cod_testimonial = '$cod_testimonial';";    //check if vin exist in the table
        $result_cod_sql = mysqli_query($conect, $check_cod_sql);          //run query $check_vin_sql
        if($result_cod_sql) {                                            //if run query succesfuly
            $num = mysqli_num_rows($result_cod_sql);
            if($num >= 1) {                                             //return number of rows in database with the id, to check if id is already registered
            $cod_testimonial = create_cod_testimonial();                                           //id already in, then do  a new id
            $try_new_cod = true;                                         //repeat the while and check again if the id is already in 
            }else $try_new_cod = false;  break;                          //if id not in, get out of looping
        } 
    }
    //-----end cod testimonial------------------------------


        if(empty($errors)){          
          $query = "INSERT INTO parent_testimonial(cod_testimonial, services, days_date, firstname, comment, email, displayed )
          VALUES('$cod_testimonial', '$service','$days_date','$firstname','$comment', '$email', '$displayed' )";

              $run = mysqli_query($conect,$query);

          echo "Thank you for giving your feedback, redirecting...";
          header("Location:access_level.php"); exit;   

        }else {
          echo "<h3>There is an error!</h3><h3>The following error(s)
          occurred:</h3>";
          foreach ($errors as $msg) {
          echo "- $msg <br/>";
          }
          echo "<h4>Please <a href='testimonial_add.html'>go back</a> and enter
          details properly!</h4>";
        
        }


  }

  function pass_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = str_replace('-', '', $data);
  return $data;
  }

  // function replace_function($string){
  //     $str = $string;
  //     $remove_blank_space = str_replace(' ', '', $str);
  //     $remove_hyphen = str_replace('-', '', $remove_blank_space);
  //     $str_after_replace =  $remove_hyphen;
  //     return $str_after_replace;
  // }


 ?>
