<?php
	include 'koneksi.php';

	$query = "SELECT * FROM tb_zakat;";
	$sql = mysqli_query($conn, $query);
	$no = 0;


?>
<!DOCTYPE html>
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
	      INDRI NUR ANANDITA dan SRI HIDAYAH 
	    </a>
	  </div>
	</nav>

	<!-- judul -->
	<div class="container">
		<h1 class="mt-4">Data Zakat</h1>
		<figure>
		  <blockquote class="blockquote">
		    <p>Berisi data yang telah disimpan di Database.</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    CRUD <cite title="Source Title">Create Read Update Delete</cite>
		  </figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class= "fa fa-plus"></i>
			Tambah Data
		</a>
		<div class="table-responsive">
			<table class="table align-middle table-bordered table-hover">
			    <thead>
			      <tr>
			        <th><center>No.</center></th>
			        <th>Harga Beras Perliter</th>
			        <th>Harga Beras Perjiwa</th>
			        <th>Aksi</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php
			    	while($result = mysqli_fetch_assoc($sql)){

			    ?>
				      <tr>
				        <td><center>
				        	<?php echo ++$no; ?>.
				        </center></td>
				        <td>
				        	<?php echo $result['Harga_Beras_Perliter']; ?>
				        </td>
				        <td>
				        	<?php echo $result['Harga_Beras_Perjiwa']; ?>
				        </td>
				        <td>
				        	<a href="kelola.php?ubah=<?php echo $result['No']; ?>" type="button" class="btn btn-success btn-sm">
				        		<i class="fa fa-pencil"></i>
				        	</a>
				        	<a href="proses.php?hapus=<?php echo $result['No']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
				        		<i class="fa fa-trash"></i>
				        	</a>
				        </td>
				      </tr>
				<?php
					}
				 ?>
			    </tbody>
			</table>
		</div>
	</div>
</body>
</html>