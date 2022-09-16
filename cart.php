<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';

    if (isset($_GET['new']) && $_GET['new'] == 1) {
    	# code...
    	echo "<script>alert('le formulaire que vous avez rempli c\'etait juste pour l\'iscription ou connexion.remplissez les information sur le client pour valider votre commande et montrez que vous etes pas un spam')</script>";
    }

    echo "<script>alert('".lang('alert')."')</script>";
 ?>
 
		
		<div class="content_wrapper mt-5 container-fluid">
			<div class="row">


				<div class="col-md-3 text-center mt-5" id="sidebar">
					<h1 class="badge bg-primary px-3 py-3"><?= lang('info'); ?></h1>

					<form action="" method="post" accept-charset="utf-8">
						
						<div class="row mt-3">
  							<div class="col">
    							<input type="text" class="form-control" placeholder="<?= lang('nom'); ?>" aria-label="First name" name="firstname">
  							</div>
  							<div class="col">
    							<input type="text" class="form-control" placeholder="<?= lang('prenom'); ?>" aria-label="Last name" name="lastname">
  							</div>
						</div>

						<div class="row mt-3">
  							<div class="col">
    							<input type="text" class="form-control" placeholder="<?= lang('wilaya'); ?>" aria-label="First name" name="wilaya">
  							</div>
  							<div class="col">
    							<input type="text" class="form-control" placeholder="<?= lang('commune'); ?>" aria-label="Last name" name="commune">
  							</div>
						</div>

						<div class="form-floating mt-3">
  							<input type="number" class="form-control" id="floatingPassword" placeholder="Password" name="tel">
  							<label for="floatingPassword"><?= lang('num'); ?></label>
						</div>

						<div class="d-grid gap-2 mt-3">
							<input type="submit" name="buy" value="<?= lang('submit'); ?>" class="btn btn-outline-success">

						</div>
					</form>

					<?php 

					if (isset($_POST['buy'])) {
						# code...
						@$firstname = $_POST['firstname'];
						@$lastname  = $_POST['lastname'];
						@$wilaya    = $_POST['wilaya'];
						@$commune   = $_POST['commune'];
						@$tel       = $_POST['tel'];
						$ip         = getUserIpAddr();
						@$total      = $_SESSION['total'];

						//$sql = "UPDATE cart SET firstname = '$firstname' , lastname = '$lastname' , $wilaya ='$wilaya' , commune = '$commune' , tel = '$tel' , panier = 1 WHERE ip_address = '$ip'";
						$sql = "UPDATE `cart` SET `firstname` = '$firstname', `lastname` = '$lastname', `wilaya` = '$wilaya', `commune` = '$commune', `tel` = '$tel', `panier` = '01' WHERE `cart`.`ip_address` = '$ip';";
						$run = mysqli_query($con,$sql);

						if (isset($run)) {
							# code...
							echo '
							<div class="alert alert-success" role="alert">
							  Votre commandes a été effectuer , on vous rappelle dans quelques heures pour confirmer.
							</div>
							';
							header('Refresh: 5; URL=shop.php');
						}

					}

					 ?>
				</div>
<!---------------------------------------------main content--------------------------->

				<div id="content-area" class="col-md-9">
					<div class="shoping_cart_container">
						<?php 



						if (!isset($_SESSION['client'])) {
							# code...
							header('location:inscription.php');
						}else{
	                        echo "";
						}

						 ?>
						 <span class="float-end mb-5"><b style="color: navy;"><?= lang('panier'); ?> </b> : <?= lang('nombre'); ?> <?php total_items(); ?> / <?= lang('total'); ?> : <?php total_price(); ?></span>

						 <form action="" method="post" enctype="multipart/form-data">

							 <div class="table-responsive w-100">
							 	<table class="table" align="center" width="100%">
							 		<tr align="center">
							 			<th><?= lang('supprime'); ?></th>
							 			<th><?= lang('produit'); ?></th>
							 			<th><?= lang('qtt'); ?></th>
							 			<th><?= lang('prix'); ?></th>
							 		</tr>

							 		<?php 

							 		$total = 0;
									$ip = getUserIpAddr();
									$tel = $_SESSION['tel'];
									$price = "SELECT * FROM cart WHERE tel = '$tel' AND panier = 0 ";
									$run_cart = mysqli_query($con,$price);

									while ($fetch_cart = mysqli_fetch_array($run_cart)) {
										# code...
										$product_id = $fetch_cart['product_id'];
										$cart_id    = $fetch_cart['cart_id'];//etape 1
										$total_product = "SELECT * FROM products WHERE product_id = '$product_id' ";
										$result_product = mysqli_query($con,$total_product);

										while ($fetch_product = mysqli_fetch_array($result_product)) {
											# code...
											$product_price = array($fetch_product['product_price']);
											$product_title = $fetch_product['product_title'];
											$product_image = $fetch_product['product_image'];
											$sing_price    = $fetch_product['product_price'];

											$values        = array_sum($product_price);

											//getting qtt of product
											$qtt           = "SELECT * FROM cart WHERE product_id = '$product_id' ";
											$run_qty       = mysqli_query($con,$qtt);


											$row_qty       = mysqli_fetch_array($run_qty);
											$qty           = $row_qty['quantity'];
											$values_qty    = $values * $qty;
											//end getting qtt of product
											$total         += $values_qty;//$values;
											$_SESSION['total'] = $total;
										

							 		 ?>

							 		<tr align="center">
							 			<td class="">
							 				<input type="checkbox" name="remove[]" class="form-check-input" value="<?= $product_id; ?>">
							 			</td>
							 			<td>
							 				<?= $product_title ?>
							 				<hr>
							 				<img src="admin_area/product_images/<?= $product_image ?>" width='50' height='50' alt="">
							 					
							 			</td>
							 			<td>
							 				<input type="text" name="qty" size="4" value="<?= $qty; ?>" class="form-control" readonly>
							 				
							 			</td>
							 			<td><?= $sing_price; ?></td>
							 		</tr>

							 	<?php  }}//end while ?>

							 	<tr>
							 		<td colspan="4" align="right"><b><?= lang('total'); ?> : </b><?= total_price(); ?></td>
							 	</tr>

							 		<tr align="center">
							 			<td colspan="2">
							 				<input type="submit" name="update_cart" value="<?= lang('actualise'); ?>" class="btn btn-primary">
							 			</td>
							 			<td>
							 				
							 				<a href="shop.php" title="" class="btn btn-secondary"><?= lang('continue'); ?></a>
							 			</td>
							 			<td class="d-none">
							 				
							 				<input type="submit" name="buy2" value="<?= lang('submit'); ?>" class=" btn btn-outline-success">

							 			</td>
							 		</tr>
							 	</table>
							 </div>
						</form>

						<?php 

						if (isset($_POST['remove'])) {
							# code...
							foreach ($_POST['remove'] as $remove_id ) {
								# code...
								$sql_delete = "DELETE FROM cart WHERE product_id = '$remove_id' AND ip_address = '$ip' ";
								$run_delete = mysqli_query($con,$sql_delete);

								if ($run_delete) {
									# code...
									echo "<script>window.open('cart.php','_self')</script>";
								}
							}
						}

						if (isset($_POST['continue'])) {
							# code...
							echo "<script>window.open('index.php','_self')</script>";

						}

						/*
						if (isset($_POST['ok'])) {
							# code...
							//echo "<script>alert('testing')</script>";
							echo $cart_id;
							//$upd = "UPDATE `cart` SET `quantity` = '$qty' WHERE `cart`.`cart_id` = $cart_id";
							$upd = "UPDATE cart SET quantity = '$qty' WHERE cart_id = $cart_id";
							$run_upd = mysqli_query($con,$upd);

							if ($run_upd) {
								# code...
								echo "<script>alert('succes')</script>";
							}else{
								echo "<script>alert('echec')</script>";
							}
						}
						*/
						 ?>

					</div><!--shoping cart container-->
				</div><!--content-area-->
			</div><!--row-->
		</div><!--container fluid-->
	<?php include 'files/footer.php';
	ob_end_flush();
	 ?>