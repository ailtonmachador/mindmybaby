<?php
session_start();
require ('db.php');
require("connection.php");  
 if($_SERVER['REQUEST_METHOD'] == "POST"){   
    
 
        //retrive events from bd to send to the services page (services.php)
        //adm can change the contend of events on the page services_adm.php
        //then it is send update on bd
    $conect = new mysqli($host,  $user,  $password, $db);
    $table = 'events';
    $check_events_sql   = "SELECT * FROM $table ";  //select all events 
            $select_all_events_sql = mysqli_query($db_c, $check_events_sql); //run query $check_events_sql  
            
            $line =  mysqli_fetch_assoc($select_all_events_sql);           //put data into an array
            $total = mysqli_num_rows($select_all_events_sql);              //calc how many data retrives

            $event_name;                                                    //to store from bd the event_name 
            $event_text_body;                                               //to store from bd the content of text to print in services.php
           
            $event = $_POST['event'];                                        //data from textArea

            $update_event = "UPDATE events SET event_text_body = '$event';";
            $run3 = @mysqli_query($conect, $update_event);    //run query insert values
     
        if( $run3 ){                   
            header("Location: services_adm.php");            
        }else{
            echo 'error';
        }

        // $_SESSION['event_name']      =  $event_name;  //it could be done storing "$line['event_name']" direct on session, but i'm stupid
        // $_SESSION['event_text_body'] =  $event_text_body;  //the same here

       
    }else{
 }

?>