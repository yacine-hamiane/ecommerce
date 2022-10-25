<?php 
ob_start();
$edit = $_GET['catid'];

include 'files/header.php';
$select_c = "SELECT * FROM categories WHERE cat_id = $edit";
$run_cat  = mysqli_query($con,$select_c);

 ?>


	<div class="container">
		<div class="row mt-5 mb-3">
	 		<div class="col-md-4">
	 			<a href="dashbord.php" title="" class="btn btn-outline-primary">retourné au dashbord</a>
	 		</div>

	 		<div class="col-md-4">
	 			<a href="categories.php" title="" class="btn btn-outline-primary">retourné a la liste des catégories</a>
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
					<?php while ($row = mysqli_fetch_array($run_cat)) : ?>
					<table class="table table-primary table-bordered border-success">
						<thead>
							<tr>
								<th scope="col" colspan="2"><h1 class="text-center">modifié une catégories .</h1></th>
								
							</tr>
						</thead>

						<tbody>
							<tr>
								<th scope="row">nom Du catégorie :</th>
								<td>
									<input type="text" class="form-control" name="cat_title" value="<?= $row['cat_title'] ?>" placeholder="exemple : iphone 11 pro max">
								</td>
							</tr>
							
							<tr>
								<th scope="row">catégories Du Produit :</th>
								<td>
									<select class="form-select" aria-label="Default select example" name="product_cat">
                                      <option selected value="0">selectionnez une catégories :</option>
                                      <?php 
                                      $parent = $row['parent'];
                                      
                                      $get_cats = 'SELECT * FROM categories WHERE parent = 0';
				                      $run_cats = mysqli_query($con,$get_cats);

				                      while ($rows_cats = mysqli_fetch_array($run_cats)) {
				  	                    # code...
				  	                    @$cat_id     = $rows_cats['cat_id'];
				  	                    @$cat_title  =$rows_cats['cat_title'];

				  	                   $selected = '';
				  	                    if ($rows_cats['cat_id'] === $row['parent']) {
				  	                    	$selected = 'selected';
				  	                    }else{
				  	                    	$selected = '';
				  	                    }
				  	                    echo $selected;
				  	                    echo '<option value="'.$cat_id.'"'.$selected.'>'.$cat_title.'</option>';
				                      }
				                       ?>
                                      
                                    </select>
								</td>
							</tr>

							

							<tr>
								<th scope="row">Image Du Produit :</th>
								<td>
									<div class="d-flex justify-content-center align-items-center mb-2">
										<img src="product_images/<?= $row['cat_img'] ?>" class="img-fluid" alt="..." width="95" height="95">
										<input type="file" class="form-control ms-3" name="product_image" placeholder="test" value="<?= $row['cat_img'] ?>">
									</div>

								</td>

								
							</tr>



							<tr align="center">
								<th colspan="7">
									<input class="btn btn-success" type="submit" value="modifié la catégorie " name="edit_post">
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
	$cat_title = $_POST['cat_title'];
	$product_cat    = $_POST['product_cat'];
	

	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	$targetDir= 'product_images/';
	$fileName = basename($_FILES["product_image"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	move_uploaded_file($_FILES["product_image"]["tmp_name"],$targetFilePath);
	
	//move_uploaded_file($product_image_tmp, 'product_images/$product_image');

	//$edit_categorie = "UPDATE categories SET cat_title = '$cat_title', parent = '$product_cat', cat_image = '$product_image' WHERE cat_id = ".$edit;
	//verifier la valeur des variables des images et la variable $edit
	$edit_categorie = "UPDATE `categories` SET `cat_title` = '$cat_title', `parent` = '$product_cat', `cat_img` = '$product_image' WHERE `categories`.`cat_id` = $edit";
	$edit_cat  = mysqli_query($con,$edit_categorie);

	if ($edit_cat) {
		# code...
		echo "<script>alert('produit modifie avec succés')</script>";
		//echo "<script>window.open('index.php?insert_product'),'_self'</script>";
		header('location:categories.php');
	}else{
		echo "<script>alert('produit pas modifie avec succés')</script>";
	}

}
 ?>

 <?php
 include('files/footer.php'); 
 ob_end_flush();
 ?>