<?php
	$con = mysqli_connect("localhost", "root", "", "password_genrator" );
	
	if(!$con)
	{
		die("Please Check your connection".mysqli_error($con));
	}

?>