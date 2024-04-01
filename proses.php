<?php
	include 'koneksi.php';

	if (isset($_POST['aksi'])) {
	    if ($_POST['aksi'] == "add") {  

	    	$No = $_POST['No'];
			$Harga_Beras_Perliter = $_POST['Harga_Beras_Perliter'];
			$Harga_Beras_Perjiwa = $_POST['Harga_Beras_Perjiwa'];

			$stmt = mysqli_prepare($conn, "INSERT INTO tb_zakat (No, Harga_Beras_Perliter, Harga_Beras_Perjiwa) VALUES (?, ?, ?)");
			mysqli_stmt_bind_param($stmt, "sss", $No, $Harga_Beras_Perliter, $Harga_Beras_Perjiwa);

			if (mysqli_stmt_execute($stmt)) {
				header("location: index.php");
			 	//echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
			} else {
			  echo "Error: " . mysqli_stmt_error($stmt);
			}

			mysqli_stmt_close($stmt);

	    	//echo $No. " | ".$Harga_Beras_Perliter." | ".$Harga_Beras_Perjiwa;


        	//$message = "<br>Tambah Data"; // Store message in a variable for better readability
	    } else if ($_POST['aksi'] == "edit") {
	        $message = "Edit Data";
	        //var_dump($_POST);


	        $No = $_POST['No'];
			$Harga_Beras_Perliter = $_POST['Harga_Beras_Perliter'];
			$Harga_Beras_Perjiwa = $_POST['Harga_Beras_Perjiwa'];

			$query = "UPDATE tb_zakat SET No= '$No', Harga_Beras_Perliter='$Harga_Beras_Perliter', Harga_Beras_Perjiwa='$Harga_Beras_Perjiwa' WHERE No='$No';";
			$sql = mysqli_query($conn, $query);
			header("location: index.php");
	    } else {
	        // Handle unexpected values for aksi
	        $message = "Invalid action"; // Provide a clear error message

	    }

	    // Display message and link consistently
	    //echo $message . " <a href='index.php'>[Home]</a>";
	} elseif (isset($_GET['hapus'])) {
		$No = $_GET['hapus'];
		$query = "DELETE FROM tb_zakat WHERE No = '$No';";
		$sql =mysqli_query($conn, $query);

		if ($sql) {
				header("location: index.php");
			 	//echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
		} else {
			  echo $query;
		}

	    // Handle data deletion (consider adding confirmation before deletion)
	    //$message = "Hapus Data"; // Use same message format for consistency
	    echo $message . " <a href='index.php'>[Home]</a>";
	} else {
	    // Handle cases where neither aksi nor hapus is set
	    // You can display a default message or redirect to another page here
	}
?>