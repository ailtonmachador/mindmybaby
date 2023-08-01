<?php
    $host = "localhost";
    $user ="root";
    $password = "Link-park1";
    $db = "child_care";

    $mysqli = new mysqli($host,  $user,  $password, $db);

    if( $mysqli -> connect_errno)
        echo "fail to connect : (" .$mysqli -> connect_errno.") ". $mysqli-> connect_error;
    
    
?>