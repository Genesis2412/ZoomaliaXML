
<?php 

$products = simplexml_load_file('products.xml');
echo "Number of products: ".count($products);
	
?>


<!DOCTYPE html>
<html>
  	<head>
  		<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
  		<title>Products</title>
  		<link rel="stylesheet" type="text/css" href="./css/crud.css">
  		
  	</head>
  	<body>


  	
  		<div class="btn">
  			<a href="addDogProduct.php"><button>+ Add Dog product</button></a> <br><br><br>
  			<a href="addCatProduct.php"><button>+ Add Cat product</button></a>
  		</div>

		<table class="table">  <!--Table to display products-->
			
			<thead>
			  <th>Index</th>
			  <th>Image</th>
			  <th>Name</th>
			  <th>Price</th>
			  <th>Description</th>
		 	</thead>

		  	<tbody>  
				<?php
					foreach ($products -> children() as $product) {
				?>
				  <tr>
				  		<td>	
				  			<?php echo $product ->id; ?>
				  		</td>
				  		<td>
				  			 <img src="<?php echo $product ->img; ?>">
				  		</td>
				 	 	<td>
					  		<?php echo $product ->Name; ?>
					 	</td>
					 	<td>
					  		<i>Rs</i><?php echo $product ->Price; ?>
					 	</td>
					 	<td>
					  		<?php echo $product ->Description; ?>
					 	</td>
					 	
				 
				  </tr>
				<?php } ?>
				

		  	</tbody>
		</table>
	</body>
  
  </html>

	