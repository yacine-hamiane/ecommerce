<?php 
ob_start();
$edit = $_GET['edit'];

include 'files/header.php';
$select_brand = "SELECT * FROM marques WHERE brand_id = $edit";
$run_brand  = mysqli_query($con,$select_brand);

 ?>


	<div class="container">
		<div class="row mt-5 mb-3">
	 		<div class="col-md-4">
	 			<a href="dashbord.php" title="" class="btn btn-outline-primary">retourné au dashbord</a>
	 		</div>

	 		<div class="col-md-4">
	 			<a href="brand.php" title="" class="btn btn-outline-primary">retourné a la liste des marques</a>
	 		</div>

	 		<div class="col-md-12 mt-3">
	 			<?php 
	 			if (isset($delete_msg)) {
	 				# code...
	 				echo $delete_msg;
	 			}
	 			 ?>
	 		</div>
	 	</div>
			<div class="col-md-8 ms-auto me-auto">
				<form action="" method="post" enctype="multipart/form-data">
					<?php while ($row = mysqli_fetch_array($run_brand)) : ?>
					<table class="table table-primary table-bordered border-success">
						<thead>
							<tr>
								<th scope="col" colspan="2"><h1 class="text-center">modifié une marques .</h1></th>
								
							</tr>
						</thead>

						<tbody>
							<tr>
								<th scope="row">nom Du la marques :</th>
								<td>
									<input type="text" class="form-control" name="brand_title" value="<?= $row['brand_title'] ?>" placeholder="exemple : iphone 11 pro max">
								</td>
							</tr>
							
							

							

							<tr>
								<th scope="row">Image Du Produit :</th>
								<td>
									<div class="d-flex justify-content-center align-items-center mb-2">
										<img src="product_images/<?= $row['brand_img'] ?>" class="img-fluid" alt="..." width="95" height="95">
										<input type="file" class="form-control ms-3" name="brand_image" placeholder="test" value="<?= $row['brand_img'] ?>">
									</div>

								</td>

								
							</tr>



							<tr align="center">
								<th colspan="7">
									<input class="btn btn-success" type="submit" value="modifié la catégorie " name="edit_brand">
								</th>
							</tr>
						</tbody>
					</table>
				<?php endwhile; ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
if (isset($_POST['edit_brand'])) {
	# code...
	/*
	INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_keywords`, `reference`, `pays`, `garantie`) VALUES (NULL, '1', '9', 'Friteuse sans huile 2.5l', '17000', '-capacité 2 litres .\r\n-panneau de commande LED avec 7 fonctions prédéfinies .\r\n-panier de friture mobile.\r\n-protection contre la surchauffe.\r\n-arrêt automatique de 30 minutes.\r\n-température réglable jusqu\'à 200C.\r\n-indicateur lumineux de fonctionnement .\r\n-une façon saine de faire frire les aliments.', 'friteuse_lexicale.jpg', '', '', '', 'friteuse , sans huile , 2l , laf-3003 , lexical', 'l258', 'allemagne', '14 mois');
	*/
	$brand_title = $_POST['brand_title'];
	
	

	$brand_image = $_FILES['brand_image']['name'];
	$brand_image_tmp = $_FILES['brand_image']['tmp_name'];
	$targetDir= 'product_images/';
	$fileName = basename($_FILES["brand_image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	move_uploaded_file($_FILES["brand_image"]["tmp_name"],$targetFilePath);
	
	//move_uploaded_file($product_image_tmp, 'product_images/$product_image');

	//$edit_categorie = "UPDATE categories SET cat_title = '$cat_title', parent = '$product_cat', cat_image = '$product_image' WHERE cat_id = ".$edit;
	//verifier la valeur des variables des images et la variable $edit
	$edit_brand = "UPDATE `marques` SET `brand_title` = '$brand_title', `brand_img` = '$brand_image' WHERE `marques`.`brand_id` = $edit";
	$run_edit_brand  = mysqli_query($con,$edit_brand);

	if ($run_edit_brand) {
		# code...
		echo "<script>alert('marques modifie avec succés')</script>";
		//echo "<script>window.open('index.php?insert_product'),'_self'</script>";
		header('location:brand.php');
	}else{
		echo "<script>alert('produit pas modifie avec succés')</script>";
	}

}
 ?>

 <?php
 include('files/footer.php'); 
 ob_end_flush();
 ?>