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
$session_start();
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="select email,password from account where email='$email' and password='$pass'";
    $query=mysqli_query($conn,$sql);
    if($query){
        ?>
        <div class="container">
        <div class="input-group">
            <?php
        $SESSION["email"]=$email;

        echo '<form action="../welcome/welcome.html">';
        echo "<h2><center>Logged In successfully</center></h2>";
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
        echo '<form action="login.html">';
        echo "<h2><center>Problem logging in</center></h2>";
        echo "<h3><center>Try again</center></h3>";
        echo '<center><button type="Submit">OK</button></center>';
        echo '</form>';
    }

}
else{
    header('location: login.html');
}
?>
</body>
</html>