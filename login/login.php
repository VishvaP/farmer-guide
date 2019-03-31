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
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../about-us.php">About Us</a></li>
                        <li><a href="../weather.php">Weather Forecast</a></li>
                        <li><a href="../prices/prices.php">Market Prices</a></li>            
                        <li><a href="../signup/signup.html">Register</a></li>
                        <li class="active"><a href="login.html">Sign In</a></li>
                        <li><a href="../contact-us.php">Contact Us</a></li>
                    </ul>        
                </div>

            </div>
        </div>
    </header>
    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Sign In</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="../index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Sign In</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php
include "../conn.php";
session_start();
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="select email,password from account where email='$email' and password='$pass'";
    $query=mysqli_query($conn,$sql);

    if($query){
        $row=mysqli_fetch_object($query);
        if($row){
        $_SESSION['email']=$email;
        header('location:../index.php');
        }
        else{
            ?>
        <section class="main-info">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <center>
                        <h2>Either email or password incorrect </h2>
                        </center>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <center>
                        <a class="btn btn-success btn-large" href="login.html">Try Again</a>
                        </center>
                    </div>
                </div>
            </div>
        </section>  
            <?php
        }

    }
    else{
        echo '<form action="login.html">';
        echo "<h2><center>Problem logging in</center></h2>";
        echo "<h3><center>Try again</center></h3>";
        echo '<center><button type="Submit">OK</button></center>';
        echo '</form>';
    }

}
else{
    header('location: login.html');
    die();
}
?>
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
                            <li ><a href="../index.php">Home</a></li>
                            <li><a href="../about-us.php">About Us</a></li>
                            <li ><a href="../weather.php">Weather Forecast</a></li>
                            <li><a href="../prices/prices.php">Market Prices</a></li>
                            <li><a href="../signup/signup.html">Register</a></li>
                            <li><a href="../login/login.html">Sign In</a></li>
                            <li><a href="../contact-us.php">Contact Us</a></li>
                            </ul>
                        </div>  
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
    
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
      
    
        <script  src="js/index.js"></script>
    
    
    
    
    </body>
    
    </html>
    