<!DOCTYPE html>

<?php
	include 'koneksi.php';

	$No = '';
	$Harga_Beras_Perliter = '';
	$Harga_Beras_Perjiwa = '';

	if(isset($_GET['ubah'])){
		$No = $_GET['ubah'];

		$query = "SELECT * FROM tb_zakat WHERE No = '$No';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$Harga_Beras_Perliter = $result['Harga_Beras_Perliter'];
		$Harga_Beras_Perjiwa = $result['Harga_Beras_Perjiwa'];

		//var_dump($result);

		//die();
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<!-- Bootsrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js" ></script>

	<!--Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<title>belajar_crud</title>
</head>
<body>
	<nav class="navbar bg-body-tertiary">
	  <div class="container">
	    <a class="navbar-brand" href="#">
	      CRUD - BS 5
	    </a>
	  </div>
	</nav>
	<div class="container">
		 <form method="POST" action="proses.php"> 
		 	<input type="hidden" value="<?php echo $No ?>" name="No">
		 	<div class="mb-3 row">
			    <label for="No." class="col-sm-2 col-form-label">
			    	No
				</label>
			    <div class="col-sm-10">
			      <input required type="text" name="No" class="form-control" id="No." placeholder="Ex: 1" value="<?php echo $No; ?>">
		    	</div>
		  	</div>
		  	<div class="mb-3 row">
			    <label for="Harga_Beras_Perliter" class="col-sm-2 col-form-label">
			   		Harga Beras Perliter
				</label>
			    <div class="col-sm-10">
			      <input required type="text" name="Harga_Beras_Perliter" class="form-control" id="Harga_Beras_Perliter" placeholder="Ex: Rp10.000" value= "<?php echo $Harga_Beras_Perliter; ?>">
		    	</div>
		  	</div>
		  	<div class="mb-3 row">
			    <label for="Harga_Beras_Perjiwa" class="col-sm-2 col-form-label">
			    Harga Beras Perjiwa
				</label>
			    <div class="col-sm-10">
			      <input required type="text" name="Harga_Beras_Perjiwa" class="form-control" id="Harga_Beras_Perjiwa" placeholder="Ex: Rp10.000" value= "<?php echo $Harga_Beras_Perjiwa; ?>">
		    	</div>
		  	</div>

		  	<div class="mb-3 row mt-4s">
		  		<div class="col">
		  			<?php
		  				if(isset($_GET['ubah'])){
		  			?>
			  			<button  type="submit" name="aksi" value="edit" class="btn btn-primary">
			  				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				  			Simpan Perubahan
						</button>
					<?php 
						} else {
					?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
			  				<i class="fa fa-floppy-o" aria-hidden="true"></i>
				  			Tambahkan
						</button>
					<?php 
						}
					?>
					<a href="index.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
			  			Batal
					</a>
		  		</div>
		 </form>
	</div>
</body>
</html>