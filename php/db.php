<?php
$db_c = @mysqli_connect('localhost','root','Link-park1','child_care')
OR die("could not connect to MySQL!".mysqli_connect_error());
if (!mysqli_select_db($db_c, 'child_care')){
  die("Unable to select database:".mysqli_connect_error());
}
?>
