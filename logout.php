<?php
	session_start();
	//unsetting and destroying the sessions on logout
	session_unset();
	session_destroy();

	//redirecting to homepage
	echo ("<script type='text/javaScript'>
	            window.alert('You Have Been Logged Out Succesfully,Please Login');
	            window.location.href='Login.php';
	        </script>");
?>