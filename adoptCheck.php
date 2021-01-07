<?php
	//connection to database
	include ('connection.php');

	//if user press button submit then...
	if(isset($_POST['submit']))
	{
		//getting values from form
		$fName=$_POST['fName'];
		$lName=$_POST['lName'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$pNumber=$_POST['pNumber'];
		$tNumber=$_POST['tNumber'];
		$pId=$_POST['pId'];

		//inserting in table
		$insert="INSERT INTO adoption (FirstName, LastName, Address, Email, PhoneNumber, TelephoneNumber, PetId) VALUES ('$fName', '$lName', '$address', '$email', '$pNumber', '$tNumber','$pId');";

		$query=mysqli_query($connection,$insert);

		//checking if inserted successfully
		if($query)
		{
			echo ("<script type='text/javaScript'>
	            		window.alert('Details recorded successfully, further details will be addressed to you, for any queries CALL ON +230 4350066, THANK YOU');
	            		window.location.href='dogCat_adopt.php';
	        		</script>");
		}
		else
		{
			echo "Failed to register your details!";
		}
	}
?>
