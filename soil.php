<?php
include "conn.php";
session_start();
if(isset($_POST['sample'])){
    $email=$_POST['email'];
    $loc=$_POST['loc'];
    $sample=$_POST['sample'];
    $size=$_POST['size'];
    $date=$_POST['date'];
    $N=$_POST['N'];
    $P=$_POST['P'];
    $K=$_POST['K'];
    $Fe=$_POST['Fe'];
    $Cu=$_POST['Cu'];
    $B=$_POST['B'];
    $m=$_SESSION['email'];
    $q2 = "SELECT * from account WHERE email='$m'";
    $r=mysqli_query($conn,$q2);
    $row=mysqli_fetch_object($r);
    if($row->occu == 3){
    $query1="insert into shc values('$email','$loc',$sample,$size,'$date',$N,$P,$K,$Fe,$Cu,$B,'unknown')";
    }elseif($row->occu == 2 || $row->occu == 4){
        $status=$_POST['status'];
        $query1="insert into shc values('$email','$loc',$sample,$size,'$date',$N,$P,$K,$Fe,$Cu,$B,'$status')";
    }
    else{
        echo "<br>error1<br>";
    }
    $res=mysqli_query($conn,$query1);
    if($res){
    header("location:index.php");
    }else{
        echo "<br> error3<br>";
    }
}elseif(isset($_POST['status'])){
    $email=$_POST['email'];
    $status=$_POST['status'];
    $query1="UPDATE shc set status='$status' where email= '$email'"; 
    $result=mysqli_query($conn,$query1);
}
?>
<!DOCTYPE html>
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
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="weather.php">Weather Forecast</a></li>
                                <li><a href="prices/prices.php">Market Prices</a></li>
                                <?php 
                                if (isset($_SESSION['email'])){
                                    echo "<li class='active'><a href='soil.php'>Soil Health Card</a></li>";
                                    echo "<li><a href='login/logout.php'>Sign Out</a></li>";
                                }
                                else{
                                    echo "<li><a href='signup/signup.html'>Register</a></li>";
                                    echo "<li><a href='login/login.html'>Sign In</a></li>";
                                }
                                ?>
                                <li><a href="contact-us.php">Contact Us</a></li>
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
                                        header("location:login/login.html");
                                    }
                                ?>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Soil Health Card</li>
                    </ul>
                </div>
            </div>
        </div>
<!-- /header -->
</section>

<section style="background-color: #fff ">
<center>
<?php 
if($row->occu == 3 ){
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method=POST>
  <div class="container" style="background-color: #ade6b5; border-radius: 50px; width:570px">
    <h1>Soil Health Card</h1>
    <h3>Soil details</h3>
    <hr>
    <div class="row">
    <input type="text" placeholder="Email" name="email" required>
    </div>
    <div class="row">
    <input type="text" placeholder="Location" name="loc" required>
    </div>
    <div class="row">
	<input type="text" placeholder="Soil Sample Number" name="sample" required>
    </div>
	<div class="row">
	<input type="text" placeholder="Farm size" name="size" required>
    </div>
    <div class="row">
        <b>Date:</b> <input type="date" name="date">
    </div>
    <div class="row">
     <h4>Macronutrient</h4> 
    </div>
    <div class="row">
    <input type="text" placeholder="Nitrogen" name="N" required>
     </div>
    <div class="row">
    <input type="text" placeholder="Phosphorous" name="P" required>
	</div>
    <div class="row">
    <input type="text" placeholder="Potassium" name="K" required>
	</div>
    <hr>
    <div class="row">
	<h4>Micronutrient</h4>
    </div>
    <div class="row">
    <input type="text" placeholder="Iron" name="Fe" required>
    </div>
    <div class="row">
    <input type="text" placeholder="Copper" name="Cu" required>
	</div>
    <div class="row">
    <input type="text" placeholder="Boron" name="B" required>
    </div>
	<hr>
    <div class="row">
    <button type="submit" class="registerbtn">Submit</button>
    </div>
  </div>
</form>
<?php }
elseif ($row->occu == 1){
$q1="SELECT * FROM shc WHERE email='$mail'";
$result=mysqli_query($conn,$q1);
if ($result){
    while($row1=mysqli_fetch_object($result)){
?>
  <div class="container" style="background-color: #ade6b5; border-radius: 50px; width:570px">
    <h1>Soil Health Card</h1>
    <h3>Soil details</h3>
    <hr>
    <div class="row">
    <h5>Location:</h5> <?php echo $row1->loc; ?>
    </div>
    <div class="row">
    <h5>Sample Number:</h5> <?php echo $row1->sample; ?>
    </div>
	<div class="row">
    <h5>Farm Size:</h5> <?php echo $row1->size; ?>
    </div>
    <div class="row">
    <h5>Date:</h5> <?php echo $row1->date; ?>
    </div>
    <div class="row">
     <h4>Macronutrient</h4> 
    </div>
    <div class="row">
    <h5>Nitrogen:</h5> <?php echo $row1->N; ?>
     </div>
    <div class="row">
    <h5>Phosphorous:</h5> <?php echo $row1->P; ?>
	</div>
    <div class="row">
    <h5>Potassium:</h5> <?php echo $row1->K; ?>
	</div>
    <hr>
    <div class="row">
	<h4>Micronutrient</h4>
    </div>
    <div class="row">
    <h5>Iron:</h5> <?php echo $row1->Fe; ?>
    </div>
    <div class="row">
    <h5>Copper:</h5> <?php echo $row1->Cu; ?>
	</div>
    <div class="row">
    <h5>Boron:</h5> <?php echo $row1->B; ?>
    </div>
	<hr>
    <div class="row">
    <h5>Status:</h5> <?php echo $row1->status; ?>
    </div>
  </div>
<?php 
    }
}

} elseif ($row->occu == 4){
$q1="SELECT * FROM shc";
$result=mysqli_query($conn,$q1);
if ($result){
    while($row1=mysqli_fetch_object($result)){
    
    ?>
<form action="<?php $_SERVER['PHP_SELF']?>" method=POST>
  <div class="container" style="background-color: #ade6b5; border-radius: 50px; width:570px">
    <h1>Soil Health Card</h1>
    <h3>Soil details</h3>
    <hr>
    <div class="row">
    <h5>Email: </h5><input type="text" value="<?php echo $row1->email; ?>" name="email" required>
    </div>
    <div class="row">
    <h5>Location: </h5><input type="text" value="<?php echo $row1->loc; ?>" name="loc" required>
    </div>
    <div class="row">
    <h5>Sample Number: </h5><input type="text" value="<?php echo $row1->sample; ?>" name="sample" required>
    </div>
	<div class="row">
    <h5>Farm Size: </h5><input type="text" value="<?php echo $row1->size; ?>" name="size" required>
    </div>
    <div class="row">
    <h5>Date: </h5><input type="text" value="<?php echo $row1->date; ?>" name="date" required>
    </div>
    <div class="row">
     <h4>Macronutrient</h4> 
    </div>
    <div class="row">
    <h5>Nitrogen: </h5><input type="text" value="<?php echo $row1->N; ?>" name="N" required>
     </div>
    <div class="row">
    <h5>Phosphorous: </h5><input type="text" value="<?php echo $row1->P; ?>" name="P" required>
    
	</div>
    <div class="row">
    <h5>Potassium: </h5><input type="text" value="<?php echo $row1->K; ?>" name="K" required>
    
	</div>
    <hr>
    <div class="row">
	<h4>Micronutrient</h4>
    </div>
    <div class="row">
    <h5>Iron: </h5><input type="text" value="<?php echo $row1->Fe; ?>" name="Fe" required>
    
    </div>
    <div class="row">
    <h5>Copper: </h5><input type="text" value="<?php echo $row1->Cu; ?>" name="Cu" required>
    
	</div>
    <div class="row">
    <h5>Boron: </h5><input type="text" value="<?php echo $row1->B; ?>" name="B" required>
    
    </div>
	<hr>
    <div class="row">
    <h4>Status: </h4> <?php echo $row1->status; ?><br>
    <input type="radio" name="status" value="accept" required>Accept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="status" value="reject" required>Reject
    </div>
	<hr>
    
    <div class="row">
    <button type="submit" class="registerbtn">Submit</button>
    </div>
  </div>
</form>
<?php }
}
}
else{
    $q1="SELECT * FROM shc";
$result=mysqli_query($conn,$q1);
if ($result){
    while($row1=mysqli_fetch_object($result)){
    
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method=POST >
 <div class="container" style="background-color: #ade6b5; border-radius: 50px; width:570px">
    <h1>Soil Health Card</h1>
    <h3>Soil details</h3>
    <hr>
    <div class="row">
    <h5>Email:</h5> <input name="email" value="<?php echo $row1->email; ?>">
    </div>
    <div class="row">
    <h5>Location:</h5> <?php echo $row1->loc; ?>
    </div>
    <div class="row">
    <h5>Sample Number:</h5> <?php echo $row1->sample; ?>
    </div>
	<div class="row">
    <h5>Farm Size:</h5> <?php echo $row1->size; ?>
    </div>
    <div class="row">
    <h5>Date:</h5> <?php echo $row1->date; ?>
    </div>
    <div class="row">
     <h4>Macronutrient</h4> 
    </div>
    <div class="row">
    <h5>Nitrogen:</h5> <?php echo $row1->N; ?>
     </div>
    <div class="row">
    <h5>Phosphorous:</h5> <?php echo $row1->P; ?>
	</div>
    <div class="row">
    <h5>Potassium:</h5> <?php echo $row1->K; ?>
	</div>
    <hr>
    <div class="row">
	<h4>Micronutrient</h4>
    </div>
    <div class="row">
    <h5>Iron:</h5> <?php echo $row1->Fe; ?>
    </div>
    <div class="row">
    <h5>Copper:</h5> <?php echo $row1->Cu; ?>
	</div>
    <div class="row">
    <h5>Boron:</h5> <?php echo $row1->B; ?>
    </div>
	<hr>
    <div class="row">
    <h4>Status: </h4>
    <input type="radio" name="status" value="accept" required>Accept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="status" value="reject" required>Reject
    </div>
	<hr>
    <div class="row">
    <div class="row">
    <button type="submit" class="registerbtn">Submit</button>
  </div>
</form>
<?php
    }}
};?>
</center>
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
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="weather.php">Weather Forecast</a></li>
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