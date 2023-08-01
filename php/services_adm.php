<?php
//require ('db.php'); //I put db.php in the same folder as html, it may result in erros in the future. please fix it.
require("connection.php");
// session_start();
// $event =  $_SESSION['event']; //it has stored the new event edited by adm in the page services_adm.php (only visible for adm)

  //retrive events from bd to send to the services page (services.php)
    //adm can change the contend of events on the page services_adm.php
    //then it is send update on bd
    $conect = new mysqli($host,  $user,  $password, $db);
    $table = 'events';
    $check_events_sql   = "SELECT * FROM $table ";  //select all events 
    $select_all_events_sql = mysqli_query($conect, $check_events_sql); //run query $check_events_sql  
            
    $line =  mysqli_fetch_assoc($select_all_events_sql);           //put data into an array
    $total = mysqli_num_rows($select_all_events_sql);              //calc how many data retrives

    $event_name = "tupi";                                                    //to store from bd the event_name 
    $event_text_body = "no tupinho";                                               //to store from bd the content of text to print in services.php
    if($total > 0) {
        $event_name      = $line['event_name'];
        $event_text_body = $line['event_text_body'];
    }

    //  $event = $_POST['event'];
    //  $_SESSION['event_name']      =  $event_name;  //it could be done storing "$line['event_name']" direct on session, but i'm stupid
    //  $_SESSION['event_text_body'] =  $event_text_body;  //the same here


?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ThreeWiseMen {Divine Junior Anderson Odeyenuma}">

        <!-- css bootstrap library -->
        <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery bootstrap library -->
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- javaScript bootstrap library -->
        <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- Local css style file -->
        <link rel="stylesheet" href="../style.css">

        <title>Services</title>

    </head>

    <body data-spy="scroll" data-target=".navbar">


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

                       <div class="collapse navbar-collapse" id="mobile">
                    <ul class="nav navbar-nav">
                        <li><a href="services_adm.php"><span class="glyphicon glyphicon-heart-empty"></span> Services</a></li>
                        <li><a href="admin_children.php"><span class="glyphicon glyphicon-education"></span> Register child</a></li>
                        <li><a href="..\testimonial_options.html"><span class="glyphicon glyphicon-stats"></span> Testemonials</a></li>                                                                   
                    </ul>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="contact_us.php"><span class="glyphicon glyphicon-send"></span> Contact us!</a></li>

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





        <!-- Navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-bottom">

            <!-- Container -->
            <div class="container-fluid">

                <!-- Collapse Icon -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Services</a>
                </div>	

                <!-- Navbar Links -->

                <div class="collapse navbar-collapse" id="nav1">
                    <ul class="nav navbar-nav">
                        <li><a href="#section1">Activities</a></li>
                        <li><a href="#section2">Events</a></li>
                        <li><a href="#section3">Special Offer</a></li>
                    </ul>
                </div>

            </div>

        </nav>    

        <!-- Content Sections -->
        <div id="section1" class="container-fluid">
            <h1>Activities</h1>
            <div class="activities">
                <img src="../assets/bcg_5.jpg" height="380px">
                <h4>Why make learning boring when it could be fun? <br>
                <br>At LittleHumans Daycare we strike the equilibrum between fun and learning <br>
                some specially desigend activities tailored for this  aim includes; <br><br>
                * Mental Development Activies (Zig-saw puzzles, Shape box, lego building, Cross word puzzles) <br>
                * Cognitive Development Activities (Poem recitation, Sing along sessions, Sound identification) <br>
                * Physical Development Activities (Group jump rope, Outdoor field playtime, hula hooping) <br>
                * Teamwork & Sportsmanship Development Activies (Group painting, Arts&craft designs) <br>  <br>
                And more..
                </h4>
            </div>
        </div>
        <div id="section2" class="container-fluid">
            <h1>Events</h1>
            <div class="events">
                <img src="../assets/bcg_8.jpg" height="380px">
                <h4>Special events hosted by the ThreeWiseMen foundation coming up this month;<br> <br>
                * Visitation of ThreeWiseMen orphange home on 15th May <br>
                * Grow a tree to save the planet on 17th May <br>
                * Keep environment clean; Reduce, Reuse, Recycle campaign on 21st May <br>
                * Clean the city movement on 25th May <br>
                * Suprise a HERO; Covid respond team, Frontline Worker, Parents on 29th May <br>  <br>
                We encourage donation to any of above events. interested people should kidly drop a mail at <br><a class="btn btn-outline-light btn-social mx-1" href="mailto:threewisemenn@gmail.com"><h3>threewisemenn@gmail.com</h3></a>
                <br>
                united we STAND divided we FALL...
                </h4>
            </div>
        </div>
        <div id="section3" class="container-fluid">
            <h1>events comming</h1>
            <div class="offers">
                <img src="../assets/bcg_4.jpg" height="380px">                

                 <form action="envia_fale.php" method="post" name="form"> <!--- send the textarea with new event to page services.php -->
                    events:<br>
                    <textarea name = "event" placeholder="tap here the new event" style="width:400px; height: 200px;" ><?php echo "$event_text_body" ?> </textarea>
                    <br><br>
                    <input type="submit" name="submit" value="submit"><br>
                </form>                                      
                
                </h4>
                
            </div>
        </div>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
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
                        <a class="btn btn-outline-light btn-social mx-1" href="mailto:threewisemenn@gmail.com"><h3>threewisemenn@gmail.com</h3></a>

                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Threewisemen</h4>
                        <p class="lead mb-0">
                            ThreeWiseMen is a foudation focused on developing the society and contributing to humanity at large

                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>