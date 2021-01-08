<?php
	include ('connection.php');
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<link href="./css/checkout.css" rel="stylesheet" type="text/css">	
		<title>CHECKOUT || ZOOMALIA</title>
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
                <li><a href="">SHOP NOW</a>
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
			<img src="./img/checkoutbanner.jpg">
		</div>

		<!--Table to display product details-->
		<div class="tableDisplay">
            <h2 style="margin-bottom: 40px;text-align: center;">Order Details</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["cart"] as $objects => $values)
                        {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>Rs <?php echo $values["item_price"]; ?></td>
                        <td>Rs <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                    </tr>
                    <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">Rs <?php echo number_format($total, 2); ?></td>
                    </tr>
                    <?php
                    }
                    ?>                            
                </table>
            </div>
            <div id="addMore">
                  <a href="dogproduct.php">Add Dog Products</a>
				  <a href="catproduct.php">Add Cat Products</a>                                         
            </div>
        </div>

        <div style="clear:both"></div>

        <!--Form to buy product-->
		<div class="container">
			<h2 style="margin-bottom: 40px;text-align: center;">Enter Your Details</h2>
			<form name="payment" action="checkOutcheck.php" method="POST" id="contactform">

				<div id="form" align="center">
					<h4>Name:</h4>
					<input id="form-names" type="text" name="names" placeholder="First and Last Name">

					<br><br><br>

					<h4>Email:</h4>
					<input id="form-email" type="email" name="email" placeholder="email@example.com">

					<br><br><br>

					<h4>Phone</h4>
					<input id="form-phone" type="tel" name="phone" pattern="[0-9]{8}">

					<br><br><br>
				</div>

				<div id="form" align="center">
					<h4>City & Zip:</h4>
					<input id="form-city" type="text" name="city" placeholder="City">
					<input id="form-zip" type="number" name="zip" maxlength="5" size="5"  placeholder="zip code">

					<br><br><br>
				</div>

				<div id="form" align="center">
					<h4>Address:</h4>
					<input id="form-address" type="text" name="address">

					<br><br><br>
				</div>

				<div id="form" align="center">
					<h4>Account Number:</h4>

					<!--Card images-->
					<input id="form-acc" type="number" name="accno" maxlength="16" size="16"/></br>

					<br>

					<img src="./img/maestro_normal.jpg" width="55px" height="35px">
					<img src="./img/amex_normal.jpg" width="55px" height="35px">
					<img src="./img/discover_normal.jpg" width="55px" height="35px">
					<img src="./img/mastercard_normal.jpg" width="55px" height="35px">
					<img src="./img/visa_normal.jpg" width="55px" height="35px">

					<br><br><br>	

					<h4>Expiration Date:</h4>

					<!--Month-->
					<select id="form-month" name="month" >
						<option value="YEAR" disabled selected="selected">Month</option> 
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>

					<!--Year-->
					<select id="form-year" name="year">
						<option value="YEAR" disabled selected="selected">Year</option> 
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
					</select>
				</div>

				<div id="form" align="center" style="padding-top: 20px;">				
					<?php 
						if(!empty($_SESSION["cart"]))
						{
							echo '<input id="form-submit" type="submit" name="Submit"/>';
						}
						else
						{
							echo '<h3 style="color:red">SELECT PRODUCT FIRST</h3>';
						}
					?>                         
				</div>

				<!--Display message-->
				<div class="form-message">
				</div>					
			</form>
		</div>

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

		  <!--AJAX submit form-->
		<script>
			$(document).ready(function(){				
				$("form").submit(function(event){
					event.preventDefault(); //disable action and method

					var names = $("#form-names").val();
					var email = $("#form-email").val();
					var phone = $("#form-phone").val();
					var city = $("#form-city").val();
					var zip = $("#form-zip").val();
					var address = $("#form-address").val();
					var accno = $("#form-acc").val();
					var month = $("#form-month").val();
					var year = $("#form-year").val();
					var submit = $("#form-submit").val(); 

					$(".form-message").load("checkOutcheck.php", {
						names: names,
						email:email,
						phone:phone,
						city:city,
						zip:zip,
						address:address,
						accno:accno,
						month:month,
						year:year,
						submit: submit
					});

				});
			})
		</script>
	</body>
</html>


