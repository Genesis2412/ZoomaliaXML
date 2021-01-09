<?php
	include ('connection.php');
	session_start();

	if(isset($_SESSION['adminName']))
	{
		$sql="SELECT * FROM messageInfo;";
		$query=mysqli_query($connection,$sql);

		$view="";

		$view=$view.'<div class="table-responsive">';
		$view=$view.'<table class="table table-bordered">';
		$view=$view.'<tr>';
		$view=$view.'<th width="10%">FirstName</th>';
		$view=$view.'<th width="10%">LastName</th>';
		$view=$view.'<th width="15%">PhoneNo</th>';
		$view=$view.'<th width="15%">Email</th>';
		$view=$view.'<th width="30%">Message</th>';
		$view=$view.'<th width="10%"></th>';
		$view=$view.'</tr>';

		if(mysqli_num_rows($query)>0)
		{
			while($row=mysqli_fetch_assoc($query))
			{      
	            $view=$view.'<tr>';
	            $view=$view.'<td>'.$row['FirstName'].'</td>';
	            $view=$view.'<td>'.$row['LastName'].'</td>';
	            $view=$view.'<td>'.$row['PhoneNo'].'</td>';  
	            $view=$view.'<td>'.$row['Email'].'</td>';
	            $view=$view.'<td>'.$row['Message'].'</td>';
	            $view=$view.'<td>'.'<a class="btn btn-success" href="mailto:'.$row["Email"].'">Respond</a>'.'</td>';
	            $view=$view.'</tr>';  
	        }
		}

		echo $view;
	}
?>

