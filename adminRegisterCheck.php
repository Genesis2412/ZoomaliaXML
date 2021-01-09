<?php
	include('connection.php');
	session_start();
	
	$row=0;
	$email=mysqli_real_escape_string($connection,$_POST['email']);
	
	$sql="SELECT * FROM admin WHERE Email='$email';";
	$result=mysqli_query($connection,$sql);
	if($row=mysqli_num_rows($result)>0)
	{
		echo "Email already exists!";
	}
	else
	{
		echo "<p style='color:green;'>Email is valid<p>";
	}

	if(isset($_POST['submitBtn']))
	{

		//get values from form
		$fName=mysqli_real_escape_string($connection,$_POST['fName']);
		$lName=mysqli_real_escape_string($connection,$_POST['lName']);
		$pass=mysqli_real_escape_string($connection,$_POST['pwd1']);
		//encrytion
		$protectPass=password_hash($pass, PASSWORD_DEFAULT);

		if($row<=0)
		{
			//inserting into database
			$insert="INSERT INTO admin(FirstName,LastName,Email,Password)VALUES('$fName','$lName','$email','$protectPass');";
			$query=mysqli_query($connection,$insert);

			//redirecting to index if inserted successfully
			if($query)
			{
				echo ("<script type='text/javaScript'>
		            		window.alert('Account created Successfully');
		            		window.location.href='adminPage.php';
		        		</script>");
			}
		}
	}
?>

	