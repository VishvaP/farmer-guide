<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Krishi Udaan - Sign Up Form</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/sl-slide.css">
    <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
    <link rel="stylesheet" href="css/normalize.min.css">

  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
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
                                <li class="active"><a href="../index.html">Home</a></li>
                                <li><a href="../about-us.html">About Us</a></li>
                                <li ><a href="../weather.html">Weather Forecast</a></li>
                                <li><a href="../prices/test1.html">Market Prices</a></li>
                                <li><a href="../signup/signup.html">Register</a></li>
                                <li><a href="../login/login.html">Sign In</a></li>
                                <li><a href="../contact-us.html">Contact Us</a></li>
                            </ul>        
                        </div>
            </div>
        </div>
    </header>
  </header>
  <section class="title">
          <div class="container">
              <div class="row-fluid">
                  <div class="span6">
                      <h1>Registration</h1>
                  </div>
                  <div class="span6">
                      <ul class="breadcrumb pull-right">
                          <li><a href="../index.html">Home</a> <span class="divider">/</span></li>
                          <li class="active">Registration</li>
                      </ul>
                  </div>
              </div>
          </div>
      </section>
<?php
include "../conn.php";
if(isset($_POST['fname'])){
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $occu=$_POST['occu'];
    $email=$_POST['email'];
    $mob=$_POST['mob'];
    $dist=$_POST['dist'];
    $state=$_POST['state'];
    $pass=$_POST['pass'];
    $repass=$_POST['repass'];
    if($pass!=$repass){
        echo '<form action="signup.html">';
        echo "<h2><center> <font color='white'>Password not matching</font></center></h2>";
        echo '<center><button type="Submit">OK</center>';
        echo '</form>';
        die();
    }
        $sql="insert into account values('$fname','$mname','$lname','$email','$mob','$occu','$dist','$state','$pass')";
        $query=mysqli_query($conn,$sql);
    if($query){
        ?>
        <section>
        <div class="container">
        <div class="input-group">
            <?php
        echo '<form action="../login/login.html">';
        echo "<h2><center>Account added successfully</center></h2>";
        echo "<h3><center>Now login!</center></h3>";
        echo '<center><button type="Submit">OK</button></center>';
        echo '</form>';
        ?>
        </div>
    </div>
    </section>
        <?php
    }
    else{?>
    <div class="container">
    <div class="input-group">
        
    <?php
        echo "<section>";
        echo '<form action="../index.html">';
        echo "<h2><center>Problem adding account</center></h2>";
        echo "<h3><center>Try again later</center></h3>";
        echo '<center><button type="Submit">OK</button></center>';
        echo '</form></section>';
    }

}
else{
    header('location: signup.html');
}
?>
</body>
</html>