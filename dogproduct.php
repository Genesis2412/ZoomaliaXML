<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="./css/shop.css">
            <title>SHOP NOW || ZOOMALIA</title> 
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
                        <!--Hide/show links-->
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

        <!--Banner Image-->
        <div class="banner">
            <img src="./img/dogbannershop.png" alt="shopimage">
        </div>

        <!--Product Heading-->
        <div class="heading">
            <h2>SHOP NOW</h2>
        </div>

        <!--Select List-->
        <div id="selectList">
        </div>
        
        <!--Display Products-->    
        <div class="productDisplay">
            <div class="col-md-12">
                <div id="productContainer"> 
                    <?php
                    $xml=simplexml_load_file("products.xml");
                    $products = $xml->xpath('/products/dogProducts');
                    foreach($products as $product) 
                    {                   
                        echo'<div class="col-sm-4 col-lg-3 col-md-3">
                                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
                                    <img src="'. $product->img .'" alt="" class="img-responsive" width="200px">
                                    <h4 style="text-align:center;" class="none" >'.$product->Name .'</h4>
                                    <p align="center"><strong> DETAILS: '. $product->Description .'</strong></p>
                                    <h4 style="text-align:center;" class="text-danger" >Rs '. $product->Price .'</h4>
                                    <form>
                                        <button type="button" class="btn btn-success" onclick="addTocart('. $product->id .')"style="margin-top:10px;position:relative;left:30%;">Add to Cart</button
                                    </form>
                                    
                                </div>
                            </div>';
                    }        
                    ?>
                </div>
            </div>
        </div>

        <div style="clear:both"></div>

        <!--Footer-->
        <section id="footer">
        <div class="container">
            <p>&copy;  2021 Zoomalia All rights reserved</p>
        </div>
        </section>
        <!--End-->

        <!--Navigation Bar Javascript-->
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

        <!--Getting all the category type of the products-->
        <script type="text/javascript">
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myFunction(this);
            }
            };
            xhttp.open("GET", "products.xml", true);
            xhttp.send();

            function myFunction(xml) {
                var x, i;
                var xmlDoc = xml.responseXML;
                var list='<select id="list"><option value="SELECT TYPE" disabled selected="selected">SELECT CATEGORY</option><option value="All">All</option>'
                x = xmlDoc.getElementsByTagName('dogProducts');
                for (i = 0; i < x.length; i++) 
                {
                    var attribute = ''; 
                    attribute = x[i].getAttribute('category');
                    list += '<option>' + attribute + '</option>';
                }
                list += '</select>';
                document.getElementById("selectList").innerHTML = list;
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--AJAX Get Products On Selection Change-->
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#list").on('change',function()
                {
                    var value=$(this).val();
                    $.ajax(
                    {
                        url:'dogshoplist.php',
                        type:'POST',
                        data:'request='+value,
                        beforeSend:function()
                        {
                            $("#productContainer").html()
                        },
                        success:function(data)
                        {
                            $("#productContainer").html(data)
                        }
                    });                    
                });
                
            });
        </script>

        <!--AJAX Add To Cart-->
        <script type="text/javascript">
            function addTocart(id)
            {
                var id=id;
                $.ajax({
                    type:"POST",
                    url:"dogaddcart.php",
                    data: {id:id},
                    success: function(value){
                        alert("Product added Successfully");
                    }
                });
            }
        </script>

</body>
</html>