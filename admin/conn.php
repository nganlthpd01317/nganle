<?php
	$conn = mysqli_connect("localhost","root","","nganphp1");
	
	if (!$conn){
		die("Connection Failed: ". mysqli_connect_error());
		echo "Không kết nối được Database";
	}
     
?>
