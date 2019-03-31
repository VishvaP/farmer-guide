<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Krishi Udaan - Login</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/sl-slide.css">
    <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
    <link rel="stylesheet" href="normalize.min.css">

  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="../css/style.css">

  
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
                <a id="logo" class="pull-left" href="index.html"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li><a href="../index.html">Home</a></li>
                        <li><a href="../about-us.html">About Us</a></li>
                        <li><a href="../weather.html">Weather Forecast</a></li>
                        <li><a href="../prices/test1.html">Market Prices</a></li>            
                        <li><a href="../signup/signup.html">Register</a></li>
                        <li class="active"><a href="login.html">Sign In</a></li>
                        <li><a href="../contact-us.html">Contact Us</a></li>
                    </ul>        
                </div>

            </div>
        </div>
    </header>
<?php
include "../conn.php";
session_start();
if(isset($_SESSION['email'])){
    ?>
    <div class="container"> 
        <h2><center>Logged Out Successfully!!!</center></h2>
        <?php 
        session_unset();
        session_destroy();
        header('location: ../index.php');
        
}

?>
</body>
</html>