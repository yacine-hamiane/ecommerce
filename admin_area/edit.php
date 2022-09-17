<?php 
ob_start();
$edit = $_GET['edit'];

echo $edit;

include 'files/header.php';
$select_p = "SELECT * FROM products WHERE product_id = $edit";
$run_pro  = mysqli_query($con,$select_p);

 ?>


	<div class="container">
		<div class="row mt-5 mb-3">
	 		<div class="col-md-4">
	 			<a href="dashbord.php" title="" class="btn btn-outline-primary">retourné au dashbord</a>
	 		</div>

	 		<div class="col-md-4">
	 			<a href="product.php" title="" class="btn btn-outline-primary">retourné a la liste des produits</a>
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
					<?php while ($row = mysqli_fetch_array($run_pro)) : ?>
					<table class="table table-primary table-bordered border-success">
						<thead>
							<tr>
								<th scope="col" colspan="2"><h1 class="text-center">modifié un produit .</h1></th>
								
							</tr>
						</thead>

						<tbody>
							<tr>
								<th scope="row">Titre Du Produit :</th>
								<td>
									<input type="text" class="form-control" name="product_title" value="<?= $row['product_title'] ?>" placeholder="exemple : iphone 11 pro max">
								</td>
							</tr>

							<tr>
								<th scope="row">catégories Du Produit :</th>
								<td>
									<select class="form-select" aria-label="Default select example" name="product_cat">
                                      <option selected>selectionnez une catégories :</option>
                                      <?php 
                                      $get_cats = 'SELECT * FROM categories';
				                      $run_cats = mysqli_query($con,$get_cats);

				                      while ($rows_cats = mysqli_fetch_array($run_cats)) {
				  	                    # code...
				  	                    @$cat_id     = $rows_cats['cat_id'];
				  	                    @$cat_title  =$rows_cats['cat_title'];

				  	                   $selected = '';
				  	                    if ($cat_id === $row['product_cat']) {
				  	                    	$selected = 'selected';
				  	                    }
				  	                    echo $selected;
				  	                    echo '<option value="'.$cat_id.'"'.$selected.'>'.$cat_title.'</option>';
				                      }
				                       ?>
                                      
                                    </select>
								</td>
							</tr>

							<tr>
								<th scope="row">Marque Du Produit :</th>
								<td>
									<select class="form-select" aria-label="Default select example" name="product_brand">
                                      <option selected>selectionnez la marque :</option>
                                      <?php 
                                      $get_brand = 'SELECT * FROM marques';
				                      $run_brand = mysqli_query($con,$get_brand);

				                      while ($rows_brand = mysqli_fetch_array($run_brand)) {
				  	                    # code...
				  	                    @$brand_id     = $rows_brand['brand_id'];
				  	                    @$brand_title  =$rows_brand['brand_title'];
				  	                    $selected = '';
				  	                    if ($brand_id === $row['product_brand']) {
				  	                    	$selected = 'selected';
				  	                    }

				  	                    echo '<option value="'.$brand_id.'"'.$selected.'>'.$brand_title.'</option>';
				                      }
				                       ?>
                                      
                                    </select>
								</td>
							</tr>

							<tr>
								<th scope="row">Image Du Produit :</th>
								<td>
									<div class="d-flex justify-content-center align-items-center mb-2">
										<img src="product_images/<?= $row['product_image'] ?>" class="img-fluid" alt="..." width="95" height="95">
										<input type="file" class="form-control ms-3" name="product_image" placeholder="test" value="<?= $row['product_image'] ?>">
									</div>

									<div class="d-flex justify-content-center align-items-center mb-2">
										<img src="product_images/<?= $row['product_image2'] ?>" class="img-fluid" alt="..." width="95" height="95">
										<input type="file" class="form-control ms-3" name="product_image2" placeholder="test">
									</div>
									
									<div class="d-flex justify-content-center align-items-center mb-2">
										<img src="product_images/<?= $row['product_image3'] ?>" class="img-fluid" alt="..." width="95" height="95">
										<input type="file" class="form-control ms-3" name="product_image3" placeholder="test">
									</div>
									
									<div class="d-flex justify-content-center align-items-center">
										<img src="product_images/<?= $row['product_image4'] ?>" class="img-fluid" alt="..." width="95" height="95">
										<input type="file" class="form-control ms-3" name="product_image4" placeholder="test">
									</div>
								</td>

								
							</tr>

							<tr>
								<th scope="row">Prix Du Produit :</th>
								<td>
									<input type="text" class="form-control" name="product_price" value="<?= $row['product_price'] ?>" placeholder="exemple : 1000 da">
								</td>
							</tr>

							<tr>
								<th scope="row">Description Du Produit :</th>
								<td>
									<textarea class="form-control" name="product_desc" rows="3" placeholder="Tapez La Description Du Produit..."><?= $row['product_desc'] ?></textarea>
								</td>
							</tr>

							<tr>
								<th scope="row">Mot-Clés Du Produit :</th>
								<td>
									<input type="text" class="form-control" name="product_keywords" placeholder="exemple : portable , téléphone , iphone , apple...etc" value="<?= $row['product_keywords'] ?>">
								</td>
							</tr>

							<tr align="center">
								<th colspan="7">
									<input class="btn btn-success" type="submit" value="modifié le produit " name="edit_post">
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
if (isset($_POST['edit_post'])) {
	# code...
	/*
	INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_keywords`, `reference`, `pays`, `garantie`) VALUES (NULL, '1', '9', 'Friteuse sans huile 2.5l', '17000', '-capacité 2 litres .\r\n-panneau de commande LED avec 7 fonctions prédéfinies .\r\n-panier de friture mobile.\r\n-protection contre la surchauffe.\r\n-arrêt automatique de 30 minutes.\r\n-température réglable jusqu\'à 200C.\r\n-indicateur lumineux de fonctionnement .\r\n-une façon saine de faire frire les aliments.', 'friteuse_lexicale.jpg', '', '', '', 'friteuse , sans huile , 2l , laf-3003 , lexical', 'l258', 'allemagne', '14 mois');
	*/
	$product_title = $_POST['product_title'];
	$product_cat    = $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_desc  = trim(mysqli_real_escape_string($con,$_POST['product_desc']));
	$product_keywords= $_POST['product_keywords'];

	//getting the image from the field

	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	$targetDir= 'product_images/';
	$fileName = basename($_FILES["product_image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	move_uploaded_file($_FILES["product_image"]["tmp_name"],$targetFilePath);
	
	//move_uploaded_file($product_image_tmp, 'product_images/$product_image');

	$product_image2 = $_FILES['product_image2']['name'];
	$product_image_tmp2 = $_FILES['product_image2']['tmp_name'];
	//$targetDir= 'product_images/';
	$fileName2 = basename($_FILES["product_image2"]["name"]);
	$targetFilePath2 = $targetDir . $fileName2;
	move_uploaded_file($_FILES["product_image2"]["tmp_name"],$targetFilePath2);
	
	//move_uploaded_file($product_image_tmp2, 'product_images/$product_image2');

	$product_image3 = $_FILES['product_image3']['name'];
	$product_image_tmp3 = $_FILES['product_image3']['tmp_name'];
	//$targetDir= 'product_images/';
	$fileName3 = basename($_FILES["product_image3"]["name"]);
	$targetFilePath3 = $targetDir . $fileName3;
	move_uploaded_file($_FILES["product_image3"]["tmp_name"],$targetFilePath3);
	
	//move_uploaded_file($product_image_tmp3, 'product_images/$product_image3');

	$product_image4 = $_FILES['product_image4']['name'];
	$product_image_tmp4 = $_FILES['product_image4']['tmp_name'];
	//$targetDir= 'product_images/';
	$fileName4 = basename($_FILES["product_image4"]["name"]);
	$targetFilePath4 = $targetDir . $fileName4;
	move_uploaded_file($_FILES["product_image4"]["tmp_name"],$targetFilePath4);
	
	//move_uploaded_file($product_image_tmp2, 'product_images/$product_image2');

	/*$insert_product = "INSERT INTO products 
	(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_image2,product_image3,product_image4,product_keywords,reference,pays,garantie) 
	VALUES 
	('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_image2','$product_image3','$product_image4','$product_keywords','laf-3003','ALLEMAGNE','14 mois')";*/

	//$edit_product = "UPDATE `products` SET `product_cat` = '$product_cat', `product_brand` = '$product_brand',`product_title` = '$product_title', `product_price` = '$product_price', `product_desc` = '$product_desc', `product_image` = '$product_image', `product_image2` = '$product_image2',`product_image3` = '$product_image3', `product_image4` = '$product_image4',`product_keywords` = '$product_keywords' WHERE `products`.`product_id` = ".$edit."";
	/***********************************************************/
	$edit_product = "UPDATE products SET product_cat = '$product_cat', product_brand = '$product_brand',product_title = '$product_title', product_price = '$product_price', product_desc = '$product_desc', product_image = '$product_image', product_image2 = '$product_image2',product_image3 = '$product_image3', product_image4 = '$product_image4',product_keywords = '$product_keywords' WHERE product_id = ".$edit;
	//verifier la valeur des variables des images et la variable $edit
	$edit_pro  = mysqli_query($con,$edit_product);

	if ($edit_pro) {
		# code...
		echo "<script>alert('produit modifie avec succés')</script>";
		//echo "<script>window.open('index.php?insert_product'),'_self'</script>";
		header('location:product.php');
	}

}
 ?>

 <?php
 include('files/footer.php'); 
 ob_end_flush();
 ?>