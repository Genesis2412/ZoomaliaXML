<?php 
	session_start();
	if(isset($_SESSION['adminName']))
	{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/adminPage.css">
		<title>ADMINISTRATOR || ZOOMALIA</title>
  </head>
  <body>
	  	<!--Navigation Bar-->
	    <header>
	        <div class="logo">
	          <a href="#"><img src="./img/logo.svg" alt="Zoomalia"></a>
	        </div>

	        <nav>
	          <ul>
	            <li><a class="active" href="adminPage.php">HOME</a></li>
	            <li><a href="#" onclick="allProduct();return false;">ALL PRODUCTS</a></li>
	            <li><a href="#" onclick="allUser();return false;">USERS</a></li>
	            <li><a href="#" onclick="allClient();return false;">CLIENTS</a></li>
	            <li><a href="#" onclick="allMessage();return false;">MESSAGES</a></li>
	            <li><a href="adminRegister.php">NEW ADMIN</a></li>
	            <li><a href="adminLogout.php">LOGOUT</a></li>
	          </ul>
	        </nav>

	        <!--Hamburger-->
	        <div class="menu-toggle">
	          <i class="fa fa-bars" aria-hidden="true"></i>
	        </div>
	    </header>

	    <!--Front Page-->
		<div class="content">
	  		<img src="./img/logo.svg" width="20%">
	  		<h1 style="padding-top: 20px;">WELCOME <span style="color: green;text-transform: uppercase;"><?php echo $_SESSION['adminName'];?></span> TO ZOOMALIA ADMINISTRATOR PAGE</h1>
	  	</div>

	  	<!-- Modal for update -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Modal Header</h4>
		      </div>
		      <div class="modal-body">
		        <form method="POST" id="update_form">
		        	<label>Product Name</label>
		        	<input type="text" name="name" id="name">
		        	<br>
		        	<label>Product Type</label>
		        	<input type="text" name="type" id="type">
		        	<br>
		        	<label>Product Image</label>
		        	<input type="text" name="image" id="image">
		        	<br>
		        	<label>Product Price</label>
		        	<input type="text" name="price" id="price">
		        	<br><br>
		        	<input type="button" class="btn btn-primary" name="update" id="update" value="Update">
		        </form>
		      </div>
		      <div class="modal-footer">
		      	<p id="error_message" style="text-align: center; color: red; font-size: 18px;"></p>
		      	<p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
		      </div>
		    </div>
		  </div>
		</div>

		<!--Footer-->
	  	<div class="footer">
	  		<img src="./img/logo.svg" style="width: 3%;height:auto;">
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

		<!--Navigation Bar Javascript-->
	  	<script type="text/javascript">
	        $(document).ready(function()
	        {
	          $('.menu-toggle').click(function()
	          {
	            $('nav').toggleClass('active')
	          })      
	        });	          
	  	</script>

		<!--Get all products on click-->
		<script type="text/javascript">
			function allProduct()
			{
				$.ajax({
					type:"POST",
					url:"crud.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>

		<!--Get all messages on click-->
		<script type="text/javascript">
			function allMessage()
			{
				$.ajax({
					type:"POST",
					url:"adminMessage.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>

		<!--Get all users on click-->
		<script type="text/javascript">
			function allUser()
			{
				$.ajax({
					type:"POST",
					url:"adminUser.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>

		<!--Get all clients on click-->
		<script type="text/javascript">
			function allClient()
			{
				$.ajax({
					type:"POST",
					url:"clientsdisplay.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>

		<!--Delete user on click-->
		<script type="text/javascript">
			function deleteUser(deleteBtn)
			{
				var ID=deleteBtn.value;
				$.ajax({
					type:"POST",
					url:"deleteUser.php",
					data: {ID:ID},
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>
  	</body>
  </html>
<?php  
}
?>