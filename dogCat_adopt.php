<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/dog_cat_adopt.css">
        <title>ADOPT || ZOOMALIA</title>
    </head>
    <body>

        <!--Navigation Bar-->
        <header>
            <div class="logo">
              <a href="#"><img src="./img/logo.svg" alt="ZOOMALIA"></a>
            </div>

            <nav>
              <ul>
                <li><a class="active" href="index.php">HOME</a></li>
                <li><a href="index.php#aboutUs">ABOUT US</a></li>
                <li><a href="index.php#service">SERVICES</a></li>
                <li><a href="dogCat_adopt.php">ADOPTION</a></li>
                <li><a href="donate.php">DONATION</a></li>
                <li><a href="veterinary.php">VETERINARY</a></li>
                <li><a style="color: white;">SHOP NOW</a>
                    <ul>
                        <li><a href="dogproduct.php">DOG</a></li>
                        <li><a href="catproduct.php">CAT</a></li>
                    </ul>
                </li>
                <li><a href="index.php#contactUs">CONTACT US</a></li>
                <li>
                    <a style="color: white;"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i></a>
                    <ul>
                      <li>
                        <!--Hide/Show links-->
                        <?php if(isset($_SESSION['userEmail'])): ?>
                            <a href="logout.php">LOGOUT</a>
                        <?php else: ?>
                            <a href="login.php">LOGIN</a>
                        <?php endif; ?>
                      </li>
                      <li>
                        <?php if(!isset($_SESSION['userEmail'])): ?>
                        <a href="register.php">REGISTER</a>
                        <?php endif; ?>
                      </li>
                      <?php if(isset($_SESSION['userEmail'])): ?>
                        <li>
                            <a href="donateSelect.php">MY DONATION</a>
                        </li>
                      <?php endif; ?>
                    </ul>
                </li>
                <li>
                    <a href="inCart.php" style="color: white;"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 25px;"></i></a>
                </li>
              </ul>
            </nav>

            <!--Hamburger-->
            <div class="menu-toggle">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </header>

        <!--End Of Navigation Bar-->

            <!-- ChooseButton-->
            <h3 id="heading_adopt">Choose what to adopt(<label style="color: red">*Hover On Image to See ID*</label>)</h3>
            <div class="button-box">
                <div id="btn">
                    <button type="button" id="dog_btn" class="toggle-btn">ADOPT DOG</button>
                    <button type="button" id="cat_btn" class="toggle-btn">ADOPT CAT</button>
                </div>
            </div>
            <!--EndOfButton-->


            <!--gallery-->            
            <!-- Grid row -->
            <div class="gallery" id="gallery">          
                <!-- Grid column -->
                <div class="mb-3 pics animation all 2">
                    <img class="img-fluid" src="./img/q1.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 1">
                    <img class="img-fluid" src="./img/q7.jpeg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 1">
                    <img class="img-fluid" src="./img/q8.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 2">
                    <img class="img-fluid" src="./img/q6.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 2">
                    <img class="img-fluid" src="./img/q9.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 1">
                    <img class="img-fluid" src="./img/q2.jpg" alt="Card image cap">
                </div>     
            </div>
            <!--EndOfGallery-->

            <!--Contents-->
            <div class="panel">
                <iframe src="dog.php" class="content1"></iframe>
            </div>

            <div class="panel2">
                <iframe src="cat.php" class="content2"></iframe>            
            </div>
            <!--EndOfContent-->

            <!--Footer-->
            <section id="footer">
                <div class="container">
                    <p>&copy;  2021 Zoomalia All rights reserved</p>
                </div>
            </section>
            <!--End-->

            <!--on click show/hide iframe-->
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script>
                $(document).ready(function()
                {
                    $('#dog_btn').on('click', function(event) 
                    {        
                        $('.content1').toggle('show');
                    });
                });

                $(document).ready(function()
                {
                        $('#cat_btn').on('click', function(event) 
                    {        
                        $('.content2').toggle('show');
                    });
                });

                /*On click show/hide background*/
                $(document).ready(function()
                {
                    $('#dog_btn').on('click', function(event) 
                    {        
                        $('.gallery').toggle('hide');
                    });
                });

                $(document).ready(function()
                {
                        $('#cat_btn').on('click', function(event) 
                    {        
                        $('.gallery').toggle('hide');
                    });
                });
            </script>

            <!--Navigation Bar Javascript-->
            <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

                <script type="text/javascript">
                $(document).ready(function()
                {
                  $('.menu-toggle').click(function()
                  {
                    $('nav').toggleClass('active')
                  })      
                })
                  
            </script>
            <!--End Of Navigation Bar Javascript-->

    </body>
</html>