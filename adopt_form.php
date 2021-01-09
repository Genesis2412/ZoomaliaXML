<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">        
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./css/adopt_form.css">
		<title> Adoption Form</title>
	</head>
	<body>

		<!--Navigation Bar-->
		<header>
			<div class="logo">
			  <a href="#"><img src="./img/logo.svg" alt="ZOOMALIA"></a>
			</div>

			<nav>
			  <ul>
			    <li><a class="active" href="#">HOME</a></li>
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
			          	<!--Show/hide links-->
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
			  </ul>
			</nav>

			<!--Hamburger-->
			<div class="menu-toggle">
			  <i class="fa fa-bars" aria-hidden="true"></i>
			</div>

	    </header>
	    <!--End Of Navigation Bar-->

	    <!--Form-->
		<div class="container">  
			<form id="contact" action="adoptCheck.php" method="POST">
				<h4 id="f_form">Fill the form</h4>
				<fieldset>
					<input placeholder="Pet Id" type="text" tabindex="1" name="pId" required autofocus>
			  	</fieldset>
			  	<fieldset>
					<input placeholder="First Name" type="text" tabindex="1" name="fName" required autofocus value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["FirstName"])){ echo $_COOKIE["FirstName"]; }} ?>">
			  	</fieldset>
			  	<fieldset>
					<input placeholder="Last Name" type="text" tabindex="1" name="lName" required autofocus value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["LastName"])){ echo $_COOKIE["LastName"]; }} ?>">
				</fieldset>
				<fieldset>
					<input placeholder="Address" type="text" tabindex="1" name="address" required autofocus>
				</fieldset>
			  	<fieldset>
					<input placeholder="Email" type="email" tabindex="2" name="email" required autofocus value="<?php if(isset($_SESSION["userEmail"])) {if(isset($_COOKIE["Email"])){ echo $_COOKIE["Email"]; }} ?>">
			  	</fieldset>
			  	<fieldset>
					<input placeholder="Phone number" type="tel" tabindex="3" name="pNumber" pattern="[0-9]{8}" required autofocus>
				</fieldset>
				<fieldset>
					<input placeholder="Telephone number" type="tel" tabindex="3" name="tNumber" pattern="[0-9]{7}" required autofocus>
				</fieldset>
				<button name="reset" type="reset" id="contact-submit">Reset</button>
				<button name="submit" type="submit" id="contact-submit" onclick="setfocus()">Submit</button>
			</form>
		</div>	
		<!--End Of Form-->

		<!--Footer-->
	    <section id="footer">
	      <div class="container">
	        <p>&copy;  2020 Zoomalia All rights reserved</p>
	      </div>
	    </section>
	    <!--End-->


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