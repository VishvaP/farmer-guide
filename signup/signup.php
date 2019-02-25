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
    
    <link rel="stylesheet" href="normalize.min.css">

  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
<body>
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
        <?php
    }
    else{?>
    <div class="container">
    <div class="input-group">
        
    <?php
        echo '<form action="../index.html">';
        echo "<h2><center>Problem adding account</center></h2>";
        echo "<h3><center>Try again later</center></h3>";
        echo '<center><button type="Submit">OK</button></center>';
        echo '</form>';
    }

}
else{
    header('location: signup.html');
}
?>
</body>
</html>