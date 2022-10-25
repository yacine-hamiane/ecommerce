<?php 

include 'files/header.php';

 ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="dashbord.php" title="" class="btn btn-outline-primary">retourné au tableau de bord</a>
			</div>
			<div class="col-md-8 ms-auto me-auto">
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table table-primary table-bordered border-success">
						<thead>
							<tr>
								<th scope="col" colspan="2"><h1 class="text-center">ajouter une marques .</h1></th>
								
							</tr>
						</thead>

						<tbody>
							<tr>
								<th scope="row">nom de la marques :</th>
								<td>
									<input type="text" class="form-control" name="brand_title" placeholder="exemple : apple">
								</td>
							</tr>

							

							<tr>
								<th scope="row">Image Du Produit :</th>
								<td>
									<input type="file" class="form-control" name="brand_image">
									
								</td>

								
							</tr>

							<tr align="center">
								<th colspan="7">
									<input class="btn btn-success" type="submit" value="ajouter " name="insert_brand">
								</th>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
if (isset($_POST['insert_brand'])) {
	# code...
	/*
	INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_keywords`, `reference`, `pays`, `garantie`) VALUES (NULL, '1', '9', 'Friteuse sans huile 2.5l', '17000', '-capacité 2 litres .\r\n-panneau de commande LED avec 7 fonctions prédéfinies .\r\n-panier de friture mobile.\r\n-protection contre la surchauffe.\r\n-arrêt automatique de 30 minutes.\r\n-température réglable jusqu\'à 200C.\r\n-indicateur lumineux de fonctionnement .\r\n-une façon saine de faire frire les aliments.', 'friteuse_lexicale.jpg', '', '', '', 'friteuse , sans huile , 2l , laf-3003 , lexical', 'l258', 'allemagne', '14 mois');
	*/
	$brand_title = $_POST['brand_title'];
	

	//getting the image from the field

	$brand_image = $_FILES['brand_image']['name'];
	$product_image_tmp = $_FILES['brand_image']['tmp_name'];
	$targetDir= 'product_images/';
	$fileName = basename($_FILES["brand_image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	move_uploaded_file($_FILES["brand_image"]["tmp_name"],$targetFilePath);
	
	//move_uploaded_file($product_image_tmp, 'product_images/$product_image');

	

	$insert_brand = "INSERT INTO marques (brand_title,brand_img) VALUES ('$brand_title','$brand_image')";

	$run_brand  = mysqli_query($con,$insert_brand);

	if ($run_brand) {
		# code...
		echo "<script>alert('marques ajouté avec succés')</script>";
		echo "<script>window.open('brand.php'),'_self'</script>";
		//header('location:index.php?insert_product');
	}

}
 ?>
