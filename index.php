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

                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="about-us.php">About Us</a></li>
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
                                <li><a href="contact-us.php">Contact Us</a></li>
                            </ul>        
                        </div>
                    </div>
                </div>
            </header>
        
    
    <section id="slide-show">
        <div id="slider" class="sl-slider-wrapper"> 
            <div class="sl-slider">
                <div class="sl-slide item1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner">
                        <div class="containers">
                            <img class="pull-right"  src="images/sample/slider/img1.jpg" />
                        </div>
                    </div>
                </div>
                <div class="sl-slide item2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div class="sl-slide-inner">
                        
                            <img class="pull-right" src="images/sample/slider/img4.png" alt="" />
                            
                    </div>
                </div>
                <div class="sl-slide item3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        
                            <img class="pull-right" src="images/sample/slider/img3.jpg" alt="" />
                        
                    </div>
                </div>
            </div>
            <nav id="nav-arrows" class="nav-arrows">
                <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
                <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
            </nav>
        </div>
    </section>
    <section class="main-info">
        <div class="container">
            <div class="row-fluid">
                <div class="span9">
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
                    ?>
                    <h2>Be the change you want to see in the world</h2>
                    <p class="no-margin"></p>
                </div>
                <div class="span3">
                    <a class="btn btn-success btn-large pull-right" href="signup/signup.html">Join Us</a>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="center gap">
                <h2>What we provide:</h2>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-globe icon-medium"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Weather Forecast</h4>
                            <p>Weather forecast is the most required and demanding feature that is required in the market. Our application provides with the past data of weather and also, predicts the future weather condition using deep learning. </p>
                        </div>
                    </div>
                </div>            
                <div class="span4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-thumbs-up-alt icon-medium"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Soil Health Card</h4>
                            <p> Soil Healh card gives the information about the condition of soil of farm that the farmer owns. The soil information is given by agriculture scientists, who test the soil sample in the laboratory.</p>
                        </div>
                    </div>
                </div>            
                <div class="span4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-leaf icon-medium icon-rounded"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Crop Prediction</h4>
                            <p>Every crop cannot be grown in all the weather and soil conditions. Each and every type crop requires a suitable environment. Using Soil information and weather forecast data, crop that can be grown by farmer is predicted by the app. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-shopping-cart icon-medium"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Market Prices</h4>
                            <p>Prices of crops may vary from time to time. Each and every person should be aware of what the prices of crops is going on in market in real time. So, this app keeps the user updated with market prices.</p>
                        </div>
                    </div>
                </div>            
                <div class="span4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-globe icon-medium"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Farmer Satisfaction</h4>
                            <p>Farmer satisfaction is the important aspect of this application. The load of the farmer is reduced down and all the workflows are eased. </p>
                        </div>
                    </div>
                </div>            
                <div class="span4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-globe icon-medium"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Agriculture Digitization</h4>
                            <p>We have tried to make process of every activity involved in agriculture as paperless as possible. Soil health card is one of them. This makes processes faster and smoother.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="recent-works">
        <div class="container">
            <div class="center">
                <h3>Different crops....</h3>
                <p class="lead">Following are the range of crops:</p>
            </div>  
            <div class="gap"></div>
            <ul class="gallery col-4">
                
                <li>
                    <div class="preview">
                        <img alt=" " src="images/portfolio/thumb/item1.jpg">
                        <div class="overlay">
                        </div>
                        <div class="links">
                            <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                          
                        </div>
                    </div>
                    <div id="modal-1" class="modal hide fade">
                        <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                        <div class="modal-body">
                            <img src="images/portfolio/full/item1.jpg" alt=" " width="100%" style="max-height:400px">
                        </div>
                    </div>                 
                </li>
                
                <li>
                    <div class="preview">
                        <img alt=" " src="images/portfolio/thumb/item2.jpg">
                        <div class="overlay">
                        </div>
                        <div class="links">
                            <a data-toggle="modal" href="#modal-2"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                        </div>
                    </div>
                    <div id="modal-2" class="modal hide fade">
                        <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                        <div class="modal-body">
                            <img src="images/portfolio/full/item2.jpg" alt=" " width="100%" style="max-height:400px">
                        </div>
                    </div>                 
                </li>
                
                <li>
                    <div class="preview">
                        <img alt=" " src="images/portfolio/thumb/item3.jpg">
                        <div class="overlay">
                        </div>
                        <div class="links">
                            <a data-toggle="modal" href="#modal-3"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                        </div>
                    </div>
                    <div id="modal-3" class="modal hide fade">
                        <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                        <div class="modal-body">
                            <img src="images/portfolio/full/item3.jpg" alt=" " width="100%" style="max-height:400px">
                        </div>
                    </div>                 
                </li>
                
                <li>
                    <div class="preview">
                        <img alt=" " src="images/portfolio/thumb/item4.jpg">
                        <div class="overlay">
                        </div>
                        <div class="links">
                            <a data-toggle="modal" href="#modal-4"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>                                
                        </div>
                    </div>
                    <div id="modal-4" class="modal hide fade">
                        <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                        <div class="modal-body">
                            <img src="images/portfolio/full/item4.jpg" alt=" " width="100%" style="max-height:400px">
                        </div>
                    </div>                 
                </li>
    
            </ul>
        </div>
    </section>
    

    
    <section id="clients" class="main">
        <div class="container">
            <div class="row-fluid">
                <div class="span2">
                    <div class="clearfix">
                        <h4 class="pull-left">Agriculture and Government of India</h4>
                        <div class="pull-right">
                            <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                        </div>
                    </div>
                    <p>Government of India has given full support over agriculure economy.</p>
                </div>
                <div class="span10">
                    <div id="myCarousel" class="carousel slide clients">
                        
                        <div class="carousel-inner">
                            <div class="active item">
                                <div class="row-fluid">
                                    <ul class="thumbnails">
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client.jpg"></a></li>
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client1.jpg"></a></li>
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row-fluid">
                                    <ul class="thumbnails">
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client4.png"></a></li>
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client2.png"></a></li>
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client1.jpg"></a></li>
                                        <li class="span3"><a href="#"><img src="images/sample/clients/client.jpg"></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
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