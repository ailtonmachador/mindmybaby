<?php
session_start();
require("db.php");
require("connection.php");
$errors = array();

$table = 'child';
$check_email_sql;

if (isset($_POST["optionsDisplay"])) {
    //if filter was selected do:
    if ($_POST["optionsDisplay"] == "child_name") {
        $check_email_sql = "SELECT cod_child, child_name, days_in_childcare, course_time, categories, child.email, users_name FROM $table
             JOIN login WHERE login.email = child.email
             ORDER BY child_name";  // order by child name                   
    } else {
        $check_email_sql = "SELECT cod_child, child_name, days_in_childcare, course_time, categories, child.email, users_name FROM $table
             JOIN login WHERE login.email = child.email
            ORDER BY users_name";  //order by parent name
    }
} else {
    $check_email_sql = "SELECT cod_child, child_name, days_in_childcare, course_time, categories, child.email, users_name FROM $table
                    JOIN login WHERE login.email = child.email";  //select all comments           
}

$select_all_comment_sql = mysqli_query($db_c, $check_email_sql); //run query $check_email_sql              
$line =  mysqli_fetch_assoc($select_all_comment_sql);           //put data into an array
$total = mysqli_num_rows($select_all_comment_sql);              //calc how many data retrieves

?>
<!DOCTYPE html>
<html>
<head>
    <title>CHILDREN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- css bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery bootstrap library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- javaScript bootstrap library -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Local css style file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        #tableColor{            
            background-color: blanchedalmond;
        }
    </style>
</head>
<body>
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
                <a class="navbar-brand" href="access_level.php">LittleHumans <span><img src="../assets/logo.png" height="70px"></span></a>
            </div>

            <!-- Collapse div -->
            <div class="collapse navbar-collapse" id="mobile">
                <ul class="nav navbar-nav">
                    <li><a href="../services_adm.html"><span class="glyphicon glyphicon-heart-empty"></span> Services</a></li>
                    <li><a href="admin_children.php"><span class="glyphicon glyphicon-education"></span> Register child</a></li>
                    <li><a href="../Testimonial_options.html"><span class="glyphicon glyphicon-stats"></span> Testimonials</a></li>
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

    <form action="admin_search_children.php" method="post" novalidate>
        <div id="divBusca">
            <input type="text" id="txtBusca" name="search_cod_children" id="search_cod_children" placeholder="search by cod student" />
            <button type="submit">search</button>
        </div>
        <h2><p>  <center> Total students <?php echo ($total); ?></center></h2>
    </form>

    <form action="admin_children.php" method="post" novalidate>
        <div>
            filter
            <select name="optionsDisplay" id="optionsDisplay">
                <option value="child_name" name="child_name">child name</option>
                <option value="parent_name" name="parent_name">parent name</option>
            </select>
            <button type="submit">send</button>
        </div>
    </form>

    <!-- Table to display data -->
    <?php
    if ($total > 0) {
        echo "<div id='tableColor' name='tableColor>";
        echo "<div id='div_table' name='div_table'>";
        echo "<table class='table table-bordered table-hover'>
        <tr>
        <th>cod. child</th>
        <th>name</th>
        <th>day in childcare</th>
        <th>course time</th>        
        <th>categories</th>
        <th>email</th>        
        <th>parent</th>   
        </tr>";

        // Loop through data and print table rows
        do {
            echo "<tr>";
            echo "<td>" . $line['cod_child'] . "</td>";
            echo "<td>" . $line['child_name'] . "</td>";
            echo "<td>" . $line['days_in_childcare'] . "</td>";
            echo "<td>" . $line['course_time'] . "</td>";
            echo "<td>" . $line['categories'] . "</td>";
            echo "<td>" . $line['email'] . "</td>";
            echo "<td>" . $line['users_name'] . "</td>";
            echo "</tr>";
        } while ($line = mysqli_fetch_assoc($select_all_comment_sql));

        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<p>No data found.</p>";
    }
    // No need to call mysqli_free_result() here
    ?>
</body>
</html>
