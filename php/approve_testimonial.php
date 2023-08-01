<?php
session_start();
require ('db.php');
require("connection.php");
if ($_SESSION['acess_level'] == 3 ){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conect = new mysqli($host,  $user,  $password, $db);
    $errors = array();

    //remove blank space and hyphen
function replace_function($vin)
{
    $str = $vin;
    $remove_blank_space = str_replace(' ', '', $str);
    $remove_hyphen = str_replace('-', '', $remove_blank_space);
    $str_after_replace =  $remove_hyphen;
    return $str_after_replace;
}

    if(!isset($_POST["search_cod_testimonial"])){
        $errors[] = "cod. can't be empty!";
    }else{
        //get cod testimonial from html form
        $search_cod_testimonial = replace_function($_POST["search_cod_testimonial"]);

            $table = 'parent_testimonial';
            $check_cod_testimonial_sql   = "SELECT * FROM $table where cod_testimonial =  $search_cod_testimonial ";  //select all comments 
            $select_all_comment_sql = mysqli_query($db_c, $check_cod_testimonial_sql); //run query $check_email_sql  
            
            $line =  mysqli_fetch_assoc($select_all_comment_sql);           //put data into an array

            $total = mysqli_num_rows($select_all_comment_sql);
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
	    //if results > 0 show results
	if($total > 0) {
		// start loop to show all data
		do {
            $_SESSION['cod'] =  $line['cod_testimonial'];


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
        echo "<td> " . $line['displayed'] ."</td>"; 
        echo "<td>" . $line['comment'] ."</td>";
        "</div>";

         echo "<form action='run_sql_testimonial.php' method='post' novalidate>";
         echo "print for user? <select name='optionsDisplay' id='optionsDisplay'>
        <option value='yes' name='yes'>yes</option>
        <option value='no' name='yes'>no</option></div>
        </select>"; 
        echo "<button type='submit'> send </button>    ";
        "</form>";
  
		// end loop and print results
		} while($line = mysqli_fetch_assoc($select_all_comment_sql));
	// end if
	}else echo "No results found!";
    ?>
</body>
</html>
<?php
mysqli_free_result($select_all_comment_sql);
?>
    
            <?php
    }
   

}


}else{
    header("Location: ../testimonial_add_or_show.html"); exit;
}
?>




