<?php
session_start();

require ('db.php');
$errors = array();

$table = 'parent_testimonial';
$check_email_sql   = "SELECT * FROM $table WHERE displayed = 'no'";  //select all comments 
            $select_all_comment_sql = mysqli_query($db_c, $check_email_sql); //run query $check_email_sql  
            
            $line =  mysqli_fetch_assoc($select_all_comment_sql);           //put data into an array

            $total = mysqli_num_rows($select_all_comment_sql);              //calc how many data retrives
?>

<html>
	<head>
	<title>Testimonial</title>
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- css bootstrap library -->
    <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <!-- jQuery bootstrap library -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
    <!-- javaScript bootstrap library -->
    <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- Local css style file -->
       <link rel="stylesheet" href="../style.css">
       <nav class="navbar navbar-light">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsible button for mobile -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobile">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Name and logo -->
                    <a class="navbar-brand" href="access_level.php">LittleHumans <span><img src="../assets/logo.png" height="70px"> </span></a>
                </div>

                <!-- Collapse div -->
                <div class="collapse navbar-collapse" id="mobile">
                    <ul class="nav navbar-nav">

                        <li><a href="../services_adm.html"><span class="glyphicon glyphicon-heart-empty"></span> Services</a></li>
                        <li><a href="admin_children.php"><span class="glyphicon glyphicon-education"></span> Register child</a></li>
                        <li><a href="../Testimonial_options.html"><span class="glyphicon glyphicon-stats"></span> Testemonials</a></li>                                                                   

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="contact_us.php"><span class="glyphicon glyphicon-send"></span> Contact us</a></li>

                        <!-- Login dropdown menu -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> User<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="../login.html">Login <span class="glyphicon glyphicon-log-in"></span></a> </li>
                                <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
<body>
<form action="approve_testimonial.php" method="post" novalidate>
<div id="divBusca">
  <input type="text" id="txtBusca" name="search_cod_testimonial" id="search_cod_testimonial" placeholder="search by cod testimonial"/>
  <button type="submit">search</button>
</div>
</form>
<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
            "<div id='div_table' name='div_table'>";
            echo "<table width='100%' align='left' border='1'  cellpadding='4' >
        <tr>
        <th>cod. comment</th>
        <th>email</th>
        <th>services</th>
        <th>date</th>        
        <th>name</th>
        <th>displayed</th>
        <th>comment</th>
        </tr>";
    
        echo "<tr>";
        echo "<td>" . $line['cod_testimonial'] ."</td>";
        echo "<td>" . $line['email'] ."</td>";
        echo "<td>" . $line['services'] ."</td>";
        echo "<td>" . $line['days_date'] ."</td>";
        echo "<td>" . $line['firstname'] ."</td>";
        echo "<td>" . $line['displayed'] ."</td>";
        echo "<td>" . $line['comment'] ."</td>";
        "</div>";
		// end loop and print results
		}while($line = mysqli_fetch_assoc($select_all_comment_sql));
	// end if
	}    
    
?>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
</body>
<style>
   table{
  width: 100% !important;
}

table {
    border: 1px solid blueviolet;
    width: 100% !important;
    margin: auto;
    padding-left: 20rem;
    background-color:whitesmoke;
    opacity: 80%;
    text-align: center;
}
table th{
    align-items: center;
    text-align: center;
}

.div_table{
    padding-left: 20rem;
    background-color: white;
    color: red;
}

</style>
</html>
<?php

mysqli_free_result($select_all_comment_sql);
?>



<style>
    #showMysql{
        padding: 2rem;    
    }

    #showMysql div {
        display: inline-block;    
        padding-left: 7rem;
    }

    #showMysql p
    {
        color: blueviolet;
    }


</style>