<?php
session_start();

require ('db.php');
$errors = array();

$table = 'parent_testimonial';
$check_email_sql   = "SELECT * FROM $table ";  //select all comments 
            $select_all_comment_sql = mysqli_query($db_c, $check_email_sql); //run query $check_email_sql  
            
            $line =  mysqli_fetch_assoc($select_all_comment_sql);           //put data into an array

            $total = mysqli_num_rows($select_all_comment_sql);              //calc how many data retrives
?>

<html>
	<head>
	<title>Testimonial</title>
</head>
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
?>
		<p><div id="showMysql">
        <form >
            
            <div><p>cod. testimonial</p><?=$line['cod_testimonial']?> </div>
            <div><p>email:</p><?=$line['email']?> </div>
            <div><p>service:</p><?=$line['services']?> </div>
            <div><p>date:</p> <?=$line['days_date']?></div>
            <div><p>name:</p> <?=$line['firstname']?>  </div>            
            <div><p>display: <?=$line['displayed']?></p></div>
            <div><p>commet:</p> <p><?=$line['comment']?> </p> </div>        
            </div>
            <hr>

           
        </form>
            
<?php
		// end loop and print results
		}while($line = mysqli_fetch_assoc($select_all_comment_sql));
	// end if
	}
?>
</body>
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

</style>