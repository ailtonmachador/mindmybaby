<?php
session_start();
require('db.php');
require("connection.php");

if (isset($_SESSION['acess_level']) == 3) {
    $conect = new mysqli($host,  $user,  $password, $db);

    $table = 'contact_us';
    $check_email_sql   = "SELECT * FROM $table ";  //select all comments 
    $select_all_comment_sql = mysqli_query($conect, $check_email_sql); //run query $check_email_sql  

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery bootstrap library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- javaScript bootstrap library -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
                <a class="navbar-brand" href="/access_level.php">LittleHumans <span><img src="../assets/logo.png" height="70px"> </span></a>
            </div>

            <!-- Collapse div -->
            <div class="collapse navbar-collapse" id="mobile">
                <ul class="nav navbar-nav">

                    <li><a href="../services.html"><span class="glyphicon glyphicon-heart-empty"></span> Services</a></li>
                    <li><a href="../registration.html"><span class="glyphicon glyphicon-education"></span> Register child</a></li>
                    <li><a href="../testimonial_options.html"><span class="glyphicon glyphicon-stats"></span> Testemonials</a></li>

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

        <?php
        // se o número de resultados for maior que zero, mostra os dados
        if ($total > 0) {
            // inicia o loop que vai mostrar todos os dados
            do {
                "<div id='div_table' name='div_table'>";
                echo "<table width='100%' align='left' border='1'  cellpadding='4' >
        <tr>
        <th>name</th>
        <th>email</th>
        <th>phone_no</th>        
        <th>message</th>       
        </tr>";

                echo "<tr>";
                echo "<td>" . $line['name'] . "</td>";
                echo "<td>" . $line['email'] . "</td>";
                echo "<td>" . $line['Phone_no'] . "</td>";
                echo "<td>" . $line['message'] . "</td>";
                "</div>";
                // end loop and print results
            } while ($line = mysqli_fetch_assoc($select_all_comment_sql));
            // end if
        }

        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    <style>
        table {
            width: 100% !important;
        }

        table {
            border: 1px solid blueviolet;
            width: 100% !important;
            margin: auto;
            padding-left: 20rem;
            background-color: whitesmoke;
            opacity: 80%;
            text-align: center;
        }

        table th {
            align-items: center;
            text-align: center;
        }

        .div_table {
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
        #showMysql {
            padding: 2rem;
        }

        #showMysql div {
            display: inline-block;
            padding-left: 7rem;
        }

        #showMysql p {
            color: blueviolet;
        }
    </style>
<?php

} else  {
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ThreeWiseMen {Divine Junior Anderson Odeyenuma}">

        <!-- css bootstrap library -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery bootstrap library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- javaScript bootstrap library -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- Local css style file -->
        <link rel="stylesheet" href="..\style.css">

        <title>Testimonial_add</title>


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
                    <a class="navbar-brand" href="access_level.php">LittleHumans <span><img src="..\assets/logo.png" height="70px"> </span></a>
                </div>

                <!-- Collapse div -->
                <div class="collapse navbar-collapse" id="mobile">
                    <ul class="nav navbar-nav">

                        <li><a href="../services_adm.html"><span class="glyphicon glyphicon-heart-empty"></span> Services</a></li>
                        <li><a href="admin_children.php"><span class="glyphicon glyphicon-education"></span> Register child</a></li>
                        <li><a href="testimonia_approved.php"><span class="glyphicon glyphicon-stats"></span> Testemonials</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="contact_us.php"><span class="glyphicon glyphicon-send"></span> Contact us</a></li>

                        <!-- Login dropdown menu -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> User<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="..\login.html">Login <span class="glyphicon glyphicon-log-in"></span></a> </li>
                                <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>


        <!-- Contact Section-->
        <div class="feedback">
            <div class="content">
                <div class="header">
                    <!-- Contact Section Heading-->
                    <h4 class="title">Contact Us</h4>
                </div>

                <!-- Contact Section Form-->
                <div class="body">
                    <form id="contactForm" action="insertContact_us.php" method="post" novalidate>

                        <!-- Name input-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required="required">
                                <br>
                            </div>
                        </div>

                        <!-- Email address input-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email  (threewisemen@example.com)" required="required">
                                <br>
                            </div>
                        </div>

                        <!-- Phone number input-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input type="tel" class="form-control" id="phone" name="Phone_no" placeholder="Enter your phone number" required="required">
                                <br>
                            </div>
                        </div>

                        <!-- Message input-->
                        <div class="form-group">
                            <div class="in">
                                <label for="message">
                                    <h4><small>Message </small></h4>
                                </label>
                                <textarea type="text" class="in" id="message" name="message" placeholder="Enter your message here..." cols="45" rows="8" maxlength="65525" required="required" data-gramm="false" lt-skip="true" spellcheck="false"></textarea>
                                <br>
                            </div>
                        </div>

                        <!-- Submit Button-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg" id="submitButton" name="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        Griffith College Dublin
                        <br>
                        South Circular Road
                        <br>
                        Dublin 8
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Email Address</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="mailto:threewisemenn@gmail.com">
                        <h3>threewisemenn@gmail.com</h3>
                    </a>

                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Threewisemen</h4>
                    <p class="lead mb-0">
                        ThreeWiseMen is a foudation focused on developing the society and contributing to humanity at large

                    </p>
                </div>
            </div>
        </footer>

    </body>

    </html>


<?php
}
?>