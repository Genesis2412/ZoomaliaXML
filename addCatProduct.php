

<?php
	if (isset($_POST['submitSave'])) {
		$products = simplexml_load_file('products.xml');
		$product = $products->addChild('dogProducts');
		$product->addAttribute('category', $_POST['category']);
		$product->addChild('id',$_POST['id']);
		$product->addChild('Name',$_POST['name']);
		$product->addChild('Description',$_POST['description']);
		$product->addChild('Price',$_POST['price']);


		
		$product->addChild('img',$_POST['image']);


		file_put_contents('products.xml', $products->asXML());
		header('location: crud.php');
	}
?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/addCatProduct.css">

</head>
<body>

	<div class="btn">
		<a href="crud.php"><button>Back</button></a>
	</div>

	<div class="form" align="center">
	<form method="POST">
	<table>
		<tr>
			<td>Category</td>
			<td><input type="text" name="category"></td>
		</tr>
		<tr>
			<td>Id</td>
			<td><input type="number" name="id"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="description"></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="number" name="price"></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="text" src="admin/image" name="image" placeholder="img/"></td>
			

			
		</tr>
		
		<tr>
			<td><input type="submit" name="submitSave" name="Save"></td>
		</tr>
		
	</table>

</form>
</div>


</body>
</html>
