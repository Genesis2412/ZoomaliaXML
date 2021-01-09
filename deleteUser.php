<?php

	include ('connection.php');

	if(isset($_POST['ID']))
	{
		$id=$_POST['ID'];

		$search="DELETE FROM users WHERE UserId='".$id."';";
		$delete=mysqli_query($connection,$search);

		$sql="SELECT * FROM users;";
		$query=mysqli_query($connection,$sql);

		$view="";

		$view=$view.'<div class="table-responsive">';
		$view=$view.'<table class="table table-bordered">';
		$view=$view.'<tr>';
		$view=$view.'<th width="20%">FirstName</th>';
		$view=$view.'<th width="20%">LastName</th>';
		$view=$view.'<th width="30%">Email</th>';
		$view=$view.'<th width="10%"></th>';
		$view=$view.'<th width="10%"></th>';
		$view=$view.'</tr>';

		if(mysqli_num_rows($query)>0)
		{
			while($row=mysqli_fetch_assoc($query))
			{      
	            $view=$view.'<tr>';
	            $view=$view.'<td>'.$row['FirstName'].'</td>';
	            $view=$view.'<td>'.$row['LastName'].'</td>';  
	            $view=$view.'<td>'.$row['Email'].'</td>';
	            $view=$view.'<td>'.'<a class="btn btn-success" href="mailto:'.$row["Email"].'">Respond</a>'.'</td>';
	            $view=$view.'<td>'.'<button class="btn btn-danger" value="'.$row["UserId"].'" onclick="deleteUser(this)">Remove</button>'.'</td>';
	            $view=$view.'</tr>';  
	        }
		}

		echo $view;
	}
?>