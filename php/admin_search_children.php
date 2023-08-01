<?php   //this page seacher child by cod, this page it's called in admin_children.php when press the button to search by child_cod
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

//$_SESSION['cod_child_to_delete']; //store the cod_child that was searched

    if(!isset($_POST["search_cod_children"])){
        $errors[] = "cod. can't be empty!";
    }else{
        //get cod testimonial from html form
        $search_cod_child = replace_function($_POST["search_cod_children"]);
        $_SESSION['cod_child_to_delete'] =  $search_cod_child;
            $table = 'child';
            $check_cod_child_sql   = "SELECT cod_child, child_name,days_in_childcare, course_time, categories, child.email, users_name FROM $table JOIN login where cod_child =  $search_cod_child  AND  login.email = child.email";  
            $select_all_comment_sql = mysqli_query($db_c, $check_cod_child_sql); //run query $check_email_sql  
            
            $line =  mysqli_fetch_assoc($select_all_comment_sql);           //put data into an array

            $total = mysqli_num_rows($select_all_comment_sql);
            ?>
           <!DOCTYPE html>
<html>
<head>
    <title>Child</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
    <form action="admin_search_children.php" method="post" novalidate>
        <div id="divBusca">
            <input type="text" id="txtBusca" name="search_cod_children" id="search_cod_children" placeholder="Search by cod child" />
            <button type="submit">Search</button>
        </div>
    </form>
    <?php
    // If results > 0 show results
    if ($total > 0) {
        // Start loop to show all data
        do {
            $_SESSION['cod'] =  $line['cod_child'];

            echo "<div id='div_table' name='div_table'>";
            echo "<table class='table table-bordered table-hover'>
            <tr>
            <th>Cod. child</th>
            <th>Name</th>
            <th>Days in childcare</th>
            <th>Course time</th>        
            <th>Categories</th>
            <th>Email</th>        
            <th>Parent</th>   
            </tr>";

            echo "<tr>";
            echo "<td>" . $line['cod_child'] . "</td>";
            echo "<td>" . $line['child_name'] . "</td>";
            echo "<td>" . $line['days_in_childcare'] . "</td>";
            echo "<td>" . $line['course_time'] . "</td>";
            echo "<td>" . $line['categories'] . "</td>";
            echo "<td>" . $line['email'] . "</td>";
            echo "<td>" . $line['users_name'] . "</td>";
            echo "</div>";

            echo "<form action='delete_child.php' method='post' novalidate>";
            echo "Delete this child? <select name='optionsDelete' id='optionsDelete'>
            <option value='yes' name='yes'>Yes</option>
            <option value='no' name='yes'>No</option></div>
            </select>";
            echo "<button type='submit'>Send</button>    ";
            "</form>";

            // End loop and print results
        } while ($line = mysqli_fetch_assoc($select_all_comment_sql));
    // End if
    } else {
        echo "No results found!";
    }
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




