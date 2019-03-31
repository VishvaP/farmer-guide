<!DOCTYPE html>
<?php
    include "conn.php";
    session_start();
?>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Krishi Udaan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>
        <header class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a> 
                        <a id="logo" class="pull-left" href="../index.html"></a>
                        <div class="nav-collapse collapse pull-right">
                            <ul class="nav">

                                <li><a href="index.php">Home</a></li>
                                <li class="active"><a href="about-us.php">About Us</a></li>
                                <li ><a href="weather.php">Weather Forecast</a></li>
                                <li><a href="prices/prices.php">Market Prices</a></li>
                                <?php 
                                if (isset($_SESSION['email'])){
                                    echo "<li><a href='soil.php'>Soil Health Card</a></li>";
                                    echo "<li><a href='login/logout.php'>Sign Out</a></li>";
                                }
                                else{
                                    echo "<li><a href='signup/signup.html'>Register</a></li>";
                                    echo "<li><a href='login/login.html'>Sign In</a></li>";
                                }
                                ?>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>        
                        </div>
                    </div>
                </div>
            </header>
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                <?php
                                    if(isset($_SESSION['email'])){
                                        $mail=$_SESSION['email'];
                                        $sql="SELECT * FROM ACCOUNT WHERE email='$mail'";
                                        $query=mysqli_query($conn,$sql);
                                        if($query){
                                            $row = mysqli_fetch_object($query);
                                            echo "<h1>Welcome, ".$row->fname." ".$row->lname."</h1> ";
                                        }
                                    }
                                    else{
                                        echo "<h1>About Us</h1>";
                                    }
                                ?>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="about-us" class="container main">
        <div class="row-fluid">
            <div class="span6">
                <h3>Who we are?</h3>
                <p><font size=4>We are developers who have tried to ease the process of each and every activity tking place in agriculture from soil testing to harvesting. We have tried to make the processes transparent as well as paperless (promoting save trees!).</font></p>
            </div>
            <div class="span6">
                <h3>Main features</h3>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Market Prices
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse">
                            <div class="accordion-inner">
                            There is time to time updation of prices of different types of crops at different places. The data refers to prices of various commodities. It has the wholesale maximum price, minimum price and modal price on daily basis. This dataset is generated through the AGMARKNET Portal. The farmers are made aware of prices going on in the market on daily basis.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                            Weather Forecast 
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                            Weather conditions play an important role in healthy growth of crops. This feature of application allows users to view the past weather conditions. Using Deep learning, we have tried to make predictions of future weather conditions. Using this farmer can decide which crop to grow as well as our app suggests the suitable crops.</div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            Soil Health Card
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                    Soil Health Card (SHC) is a Government of India’s scheme promoted by the Department of Agriculture & Co-operation under the Ministry of Agriculture and Farmers' Welfare. It is being implemented through the Department of Agriculture of all the State and Union Territory Governments. A SHC is meant to give each farmer soil nutrient status of his/her holding and advice him/her on the dosage of fertilizers and also the needed soil amendments, that s/he should apply to maintain soil health in the long run.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        
            <div class="span12">
                <h2>What is this web application all about?</h2>
                <p><font size=4>This website is a platform for agricultural activities. This web application can be used by a farmer, a government official and an agriculture scientist. This web application makes all the processes paperless and faster than the ususal and present processes. Deep learning is used to make predictions which type of crops can be grown on the soil of a particular location based on weather and soil conditions.</font></p>
            </div>
        </div>
        <hr>
        
    </section>    
    <section id="bottom" class="main">
        
            <div class="container">
                
                <div class="row-fluid">
                    
                    <div class="span6">
                        <h4>CONTACT US</h4>
                        <ul class="unstyled address">
                            <li>
                                <i class="icon-envelope"></i>
                                <strong>Email: </strong> <a href="mailto:company@domain.com">company@domain.com</a>
                            </li>
                            <li>
                                <i class="icon-globe"></i>
                                <strong>Website:</strong> <a href="http://www.domain.com">www.domain.com</a>
                            </li>
                            <li>
                                <i class="icon-phone"></i>
                                <strong>Telephone:</strong> 123-456-7890
                            </li>
                        </ul>
                    </div>
                    
                    <div id="tweets" class="span6">
                        <h4>Krishi Udaan</h4>
                        <div>
                            <ul class="arrow">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active"><a href="about-us.php">About Us</a></li>
                                    <li ><a href="weather.php">Weather Forecast</a></li>
                                    <li><a href="prices/prices.php">Market Prices</a></li>
                                    <li><a href="signup/signup.html">Register</a></li>
                                    <li><a href="login/login.html">Sign In</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                </ul>     
                    </div>
                    
                </div>
            
            </div>
            
        </section>
        
        <footer id="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span11 cp ">
                        <center>&copy; 2019 <a target="_blank" href="http://www.domain.com/">Krishi Udaan</a>. All Rights Reserved.
                        </center>
                    </div>
                    <div class="span1">
                        <a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
