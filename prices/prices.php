<!DOCTYPE html>
<?php
    include "../conn.php";
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/sl-slide.css">
    <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link rel="shortcut icon" href="../images/favicon.png">
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

                                <li><a href="../index.php">Home</a></li>
                                <li><a href="../about-us.php">About Us</a></li>
                                <li><a href="../weather.php">Weather Forecast</a></li>
                                <li class="active"><a href="../prices/prices.php">Market Prices</a></li>
                                <?php 
                                if (isset($_SESSION['email'])){
                                    echo "<li><a href='../soil.php'>Soil Health Card</a></li>";
                                    echo "<li><a href='../login/logout.php'>Sign Out</a></li>";
                                }
                                else{
                                    echo "<li><a href='../signup/signup.html'>Register</a></li>";
                                    echo "<li><a href='../login/login.html'>Sign In</a></li>";
                                }
                                ?>
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
                                        echo "<h1>Market Prices</h1>";
                                    }
                                ?>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="../index.php">Home</a> <span class="divider">/</span></li>
                        <li class="active">Market Prices</li>
                    </ul>
                </div>
            </div>
        </div>
<!-- /header -->
</section>

<section id="data">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.1.2/papaparse.js"></script>
<script>
    function arrayToTable(tableData) {
        var table = $('<div class="container"><center><table></table></center></div>');
        $(tableData).each(function (i, rowData) {
            var row = $('<tr></tr>');
            $(rowData).each(function (j, cellData) {
                row.append($('<td>'+cellData+'</td>'));
            });
            table.append(row);
        });
        return table;
    }

    $.ajax({
        type: "GET",
        url: "https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070?api-key=579b464db66ec23bdd0000018eddfaa16b8a4d406a1a988910eb229f&format=csv&offset=0&limit=100",
        success:  function (data) {
            
            $('#data').append(arrayToTable(Papa.parse(data).data));
            
        }
    });
</script>
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
    
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.ba-cond.min.js"></script>
    <script src="js/jquery.slitslider.js"></script>
    <script type="text/javascript"> 
    $(function() {
        var Page = (function() {
            var $navArrows = $( '#nav-arrows' ),
            slitslider = $( '#slider' ).slitslider( {
                autoplay : true
            } ),
            init = function() {
                initEvents();
            },
            initEvents = function() {
                $navArrows.children( ':last' ).on( 'click', function() {
                    slitslider.next();
                    return false;
                });
                $navArrows.children( ':first' ).on( 'click', function() {
                    slitslider.previous();
                    return false;
                });
            };
            return { init : init };
        })();
        Page.init();
    });
    </script>

</body>	
</html>