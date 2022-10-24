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
								<th scope="col" colspan="2"><h1 class="text-center">ajouter une catégorie .</h1></th>
								
							</tr>
						</thead>

						<tbody>
							<tr>
								<th scope="row">nom de catégorie :</th>
								<td>
									<input type="text" class="form-control" name="cat_title" placeholder="exemple : electroménager">
								</td>
							</tr>

							<tr>
								<th scope="row">catégories Parent :</th>
								<td>
									<select class="form-select" aria-label="Default select example" name="product_cat">
                                      <option selected value="0">selectionnez une catégories :</option>
                                      <?php 
                                      $get_cats = 'SELECT * FROM categories';
				                      $run_cats = mysqli_query($con,$get_cats);

				                      while ($rows_cats = mysqli_fetch_array($run_cats)) {
				  	                    # code...
				  	                    @$cat_id     = $rows_cats['cat_id'];
				  	                    @$cat_title  =$rows_cats['cat_title'];

				  	                    echo '<option value="'.$cat_id.'">'.$cat_title.'</option>';
				                      }
				                       ?>
                                      
                                    </select>
								</td>
							</tr>

							

							<tr>
								<th scope="row">Image Du Produit :</th>
								<td>
									<input type="file" class="form-control" name="cat_image">
									
								</td>

								
							</tr>

							<tr align="center">
								<th colspan="7">
									<input class="btn btn-success" type="submit" value="ajouter " name="insert_cat">
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
if (isset($_POST['insert_cat'])) {
	# code...
	/*
	INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_keywords`, `reference`, `pays`, `garantie`) VALUES (NULL, '1', '9', 'Friteuse sans huile 2.5l', '17000', '-capacité 2 litres .\r\n-panneau de commande LED avec 7 fonctions prédéfinies .\r\n-panier de friture mobile.\r\n-protection contre la surchauffe.\r\n-arrêt automatique de 30 minutes.\r\n-température réglable jusqu\'à 200C.\r\n-indicateur lumineux de fonctionnement .\r\n-une façon saine de faire frire les aliments.', 'friteuse_lexicale.jpg', '', '', '', 'friteuse , sans huile , 2l , laf-3003 , lexical', 'l258', 'allemagne', '14 mois');
	*/
	$cat_title = $_POST['cat_title'];
	$product_cat    = $_POST['product_cat'];
	

	//getting the image from the field

	$cat_image = $_FILES['cat_image']['name'];
	$product_image_tmp = $_FILES['cat_image']['tmp_name'];
	$targetDir= 'product_images/';
	$fileName = basename($_FILES["cat_image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	move_uploaded_file($_FILES["cat_image"]["tmp_name"],$targetFilePath);
	
	//move_uploaded_file($product_image_tmp, 'product_images/$product_image');

	

	$insert_product = "INSERT INTO categories (cat_title,parent,cat_img) VALUES ('$cat_title','$product_cat','$cat_image')";

	$insert_pro  = mysqli_query($con,$insert_product);

	if ($insert_pro) {
		# code...
		echo "<script>alert('catégorie ajouté avec succés')</script>";
		echo "<script>window.open('index.php?insert_product'),'_self'</script>";
		//header('location:index.php?insert_product');
	}

}
 ?>