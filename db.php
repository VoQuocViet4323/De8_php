<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "qlxe";
	$conn = new mysqli($servername, $username, $password, $db);

	//kiem tra ket noi
	if($conn->connect_error){
		echo "Ket noi that bai";
	}
?>