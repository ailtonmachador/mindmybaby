<?php
session_start();
$event =  $_SESSION['event'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta content="text/html; charset=ISO-8859-1"
http-equiv="content-type">
<title>FORMULARIO DE TESTE</title>
</head>
<body>
<br><p> <?php echo "$event"; ?> </p>
</body></html>