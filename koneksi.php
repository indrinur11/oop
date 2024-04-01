<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'db_zakat';

	$conn = mysqli_connect('localhost', 'root', '', 'db_zakat');
	
	if($conn){
		//echo "Koneksi Berhasil";
	}

	mysqli_select_db($conn, $db);
?>	