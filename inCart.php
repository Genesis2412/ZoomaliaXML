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
        <link rel="stylesheet" type="text/css" href="shop.css">
        <title>MY CART || ZOOMALIA</title>  
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
                <li><a href="#aboutUs">ABOUT US</a></li>
                <li><a href="#service">SERVICES</a></li>
                <li><a href="dogCat_adopt.php">ADOPTION</a></li>
                <li><a href="donate.php">DONATION</a></li>
                <li><a href="veterinary.php">VETERINARY</a></li>
                <li><a href="shop.php">SHOP NOW</a></li>
                <li><a href="#contactUs">CONTACT US</a></li>
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
            <img src="./img/incartbanner.jpg" alt="incartimage">
        </div>

        <!--Product Heading-->
        <div class="heading">
            <h2>ORDER DETAILS</h2>
        </div>

        <!--Table to display products in cart-->
        <div class="tableDisplay">            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50%">Image</th>
                            <th width="10%">Name</th>
                            <th width="10%">Quantity</th>
                            <th width="10%">Price</th>
                            <th width="15%">Total</th>
                            <th width="5%">Remove</th>
                        </tr>
                    </thead>

                    <tbody id="tableContent">
                        <?php
                        if(!empty($_SESSION["cart"]))
                        {
                            $total = 0;
                            foreach($_SESSION["cart"] as $objects => $values)
                            {
                        ?>
                        <tr>
                            <td><img src="<?php echo $values['item_image']; ?>"></td>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td>Rs <?php echo $values["item_price"]; ?></td>
                            <td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                            <td><button type="button" class="btn btn-danger" onclick="deleteSession(<?php echo $values["item_id"]; ?>)">Remove</button></td>
                        </tr>
                        <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td align="right">Rs <?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>                            
                </table>
            </div>

            <!--Checkout link-->
            <div id="checkout">
                <?php 
                    if(!empty($_SESSION["cart"]))
                    {
                        echo '<a href="checkout.php">PROCEED TO CHECKOUT</a>';
                    }
                    else
                    {
                        echo '<h3 style="color:red;text-align:center;">NO PRODUCTS SELECTED</h3>';
                    }
                ?>                      
            </div>                 
        </div>
        

        <!--Footer-->
        <section id="footer" class="foot">
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

        
        <!--Remove product from cart-->
        <script type="text/javascript">
            function deleteSession(id)
            {
                var id=id;
                $.ajax({
                    type:"POST",
                    url:"deleteSession.php",
                    data: {id:id},
                    success: function(value){
                        $("#tableContent").html(value);
                    }
                });
            }
        </script>
    </body>
</html>