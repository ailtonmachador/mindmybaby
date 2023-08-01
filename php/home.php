
<!DOCTYPE html>
<html lang="en">
    <head>

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
        <link rel="stylesheet" href="style.css">

        <title>Home</title>

        <style>

            
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
                    <a class="navbar-brand" href="php/access_level.php">LittleHumans <span><img src="assets/logo.png" height="70px"> </span></a>
                </div>

                <!-- Collapse div -->
                <div class="collapse navbar-collapse" id="mobile">
                    <ul class="nav navbar-nav">

                        <li><a href="services.html"><span class="glyphicon glyphicon-heart-empty"></span> Services</a></li>
                        <li><a href="registration.html"><span class="glyphicon glyphicon-education"></span> Register child</a></li>
                        <li><a href="Testimonial_options.html"><span class="glyphicon glyphicon-stats"></span> Testemonials</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="php/contact_us.php"><span class="glyphicon glyphicon-send"></span> Contact us</a></li>

                        <!-- Login dropdown menu -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> User<span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                <li><a href="login.html">Login <span class="glyphicon glyphicon-log-in"></span></a> </li>
                                <li><a href="php/logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>



            </div>

        </nav>

        <div class="home">
           
           
           
            <div class="img">
                <img src="assets/kids5.jpg" alt="kids holding hands" style="max-width: 100%; height: auto;">
            </div>

        <div id="section2" class="container-fluid">
            <h1>LittleHumans Childcare</h1>
            <div class="events">
                <img src="assets/bcg_6.jpg" height="300px" class="img">
                <h4>Littlehumans was established five years ago by Threewisemen Foundation, <br>
                    we came together to create the perfect environment that is safe and conducive for children around the county <br>
                    In 2022, we opened a beautiful and new childcare facility in South Circular Road, Dublin 8 <br>
                    that accommodate children ages 12 months to 4 years old, we did this in other to bring high level childcare <br>
                    that can be assessable for every family irrespective of your social class in the county, <br>
                    while maintaining a commendable and relaxing environment for the children that is widely loved by the parents

                </h4>
            </div>
        </div>

            <div class="iframe-container">
        
                <h1> Our Location</h1>
                <iframe class="img" src="https://www.google.com/maps/d/embed?mid=1bB7EubpHrnSC_mqFPd-PF5tmjDFE5ckP&ehbc=2E312F" width="640" height="480"></iframe>
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
        </footer>
        </div>
     
    </body>
</html>
