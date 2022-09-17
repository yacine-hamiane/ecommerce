<?php 

include('../files/db.php')

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


	<link rel="stylesheet" href="<?= $css ?>front.css">
	<title>cms website e-commerce</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="dashbord.php" title="" class="btn btn-outline-primary">retourné au tableau de bord</a>
			</div>
			<div class="col-md-8 ms-auto me-auto">
				<form action="insert_product.php" method="post" enctype="multipart/form-data">
					<table class="table table-primary table-bordered border-success">
						<thead>
							<tr>
								<th scope="col" colspan="2"><h1 class="text-center">(page copie de ajout de produit a modifié)ajouter un produit .</h1></th>
								
							</tr>
						</thead>

						<tbody>
							<tr>
								<th scope="row">Titre Du Produit :</th>
								<td>
									<input type="text" class="form-control" name="product_title" placeholder="exemple : iphone 11 pro max">
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

				  	                    echo '<option value="'.$cat_id.'">'.$cat_title.'</option>';
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

				  	                    echo '<option value="'.$brand_id.'">'.$brand_title.'</option>';
				                      }
				                       ?>
                                      
                                    </select>
								</td>
							</tr>

							<tr>
								<th scope="row">Image Du Produit :</th>
								<td>
									<input type="file" class="form-control" name="product_image">
									<input type="file" class="form-control" name="product_image2">
									<input type="file" class="form-control" name="product_image3">
									<input type="file" class="form-control" name="product_image4">
								</td>

								
							</tr>

							<tr>
								<th scope="row">Prix Du Produit :</th>
								<td>
									<input type="text" class="form-control" name="product_price" placeholder="exemple : 1000 da">
								</td>
							</tr>

							<tr>
								<th scope="row">Description Du Produit :</th>
								<td>
									<textarea class="form-control" name="product_desc" rows="3" placeholder="Tapez La Description Du Produit..."></textarea>
								</td>
							</tr>

							<tr>
								<th scope="row">Mot-Clés Du Produit :</th>
								<td>
									<input type="text" class="form-control" name="product_keywords" placeholder="exemple : portable , téléphone , iphone , apple...etc">
								</td>
							</tr>

							<tr align="center">
								<th colspan="7">
									<input class="btn btn-success" type="submit" value="ajouter le produit maintenant " name="insert_post">
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
if (isset($_POST['insert_post'])) {
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

	$insert_product = "INSERT INTO products 
	(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_image2,product_image3,product_image4,product_keywords,reference,pays,garantie) 
	VALUES 
	('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_image2','$product_image3','$product_image4','$product_keywords','laf-3003','ALLEMAGNE','14 mois')";

	$insert_pro  = mysqli_query($con,$insert_product);

	if ($insert_pro) {
		# code...
		echo "<script>alert('produit ajouté avec succés')</script>";
		echo "<script>window.open('index.php?insert_product'),'_self'</script>";
		//header('location:index.php?insert_product');
	}

}
 ?>