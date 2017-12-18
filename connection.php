<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "diary");

// Check connection
if(mysqli_connect_errno()){
	print_r(mysqli_connect_errno());

	exit();
}

?>