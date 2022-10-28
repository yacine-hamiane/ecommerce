<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';

    if (isset($_GET['new']) && $_GET['new'] == 1) {
    	# code...
    	echo "<script>alert('".lang('alert')."')</script>";
    }

    
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
    							<!-- <input type="text" class="form-control d-none" placeholder="<?= lang('wilaya'); ?>" aria-label="First name" name="wilaya"> -->
    							<select class="form-select" aria-label="Default select example" name="wilaya" id="wilaya">
								  
								  <?php getwilaya() ?>
								</select>
  							</div>
  							<div class="col">
    							<input type="text" class="form-control" placeholder="<?= lang('commune'); ?>" aria-label="Last name" name="commune">
  							</div>
						</div>

						<div class="form-floating mt-3">
  							<input type="number" class="form-control" id="floatingPassword" placeholder="Password" name="tel">
  							<label for="floatingPassword"><?= lang('num'); ?></label>
						</div>

						<?php 
						//$stop = total_items();
						@$tel = $_SESSION['tel'];
						$sql_run_items = "SELECT * FROM cart WHERE tel = '$tel' AND panier = 0";
						$run_items     = mysqli_query($con,$sql_run_items);
										    
						$count_items   = mysqli_num_rows($run_items);
						for ($i=1; $i <= $count_items ; $i++) { 
							echo '<input type="hidden" name="quantity'.$i.'" value="" id="quantity'.$i.'">';
						}

						 ?>

						<!-- <input type="hidden" name="quantity" value="" id="quantity"> -->

						<div class="d-grid gap-2 mt-3">
							<input type="submit" name="buy" value="<?= lang('submit'); ?>" class="btn btn-outline-success">

						</div>
					</form>

					
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
						 <span class="float-end mb-5"><b style="color: navy;"><?= lang('panier'); ?> </b> : <?= lang('nombre'); ?> <?php total_items(); ?> / <?= lang('total'); ?> : <?php total_price(); ?> </span>

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
							 		$t = 1;
							 		$s = 1;
							 		$u =1;
							 		$v = 1;
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
											$qtt           = "SELECT * FROM cart WHERE product_id = '$product_id' AND tel = '$tel' ";
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

							 				<input type="number" name="qty" size="4" value="<?= $qty; ?>" id="qty<?= $s++ ?>" class="form-control qty">
							 				<input type="hidden" id="id<?= $t++ ?>" value="<?= $cart_id ?>">
							 				<!-- <div id="autoSave"></div> -->
							 				
							 			</td>
							 			<td id="price"><?= $sing_price; ?></td>
							 		</tr>

							 	<?php  }}//end while ?>

							 	<tr>
							 		<td colspan="4" align="right"><b><?= lang('total'); ?> : </b><?= total_price(); ?><input type="hidden" id="total_price" value="<?= total_price(); ?>"> </td>

							 		
							 	</tr>
							 	<tr>
							 		
							 		<td colspan="4" align="right"> <b>+ livraison : </b><input type="text" id="prix_livraison" value="" name="prix_livraison"  class="form-control form-control-sm w-25 d-inline" readonly> dinar </td>
							 		
							 	</tr>
							 	<tr>
							 		
							 		<td colspan="4" align="right">  <span id="totalplusliv">= </span> da</td>
							 		
							 		
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
								$sql_delete = "DELETE FROM cart WHERE product_id = '$remove_id' AND tel = '$tel' ";
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

						 <?php 

					if (isset($_POST['buy'])) {
						# code...
						@$quantity = $_POST['quantity'];
						@$firstname = $_POST['firstname'];
						@$lastname  = $_POST['lastname'];
						@$wilaya    = $_POST['wilaya'];
						@$commune   = $_POST['commune'];
						@$tel       = $_POST['tel'];
						$ip         = getUserIpAddr();
						@$total      = $_SESSION['total'];
						
						/*
						$sql_run_items = "SELECT * FROM cart WHERE tel = '$tel' AND panier = 0";
						$run_items     = mysqli_query($con,$sql_run_items);
										    
						$count_items   = mysqli_num_rows($run_items);
						for ($i=1; $i <= $count_items ; $i++) { 
							echo '<input type="hidden" name="quantity'.$i.'" value="" id="quantity'.$i.'">';
						}
						*/
						// `cart`.`cart_id$sql = "UPDATE cart SET firstname = '$firstname' , lastname = '$lastname' , $wilaya ='$wilaya' , commune = '$commune' , tel = '$tel' , panier = 1 WHERE ip_address = '$ip'";
						$sql = "UPDATE `cart` SET  `firstname` = '$firstname', `lastname` = '$lastname', `wilaya` = '$wilaya', `commune` = '$commune', `tel` = '$tel', `panier` = '01' WHERE `cart`.`tel` = '$tel'";
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

					</div><!--shoping cart container-->
				</div><!--content-area-->
			</div><!--row-->
		</div><!--container fluid-->
		
	<?php include 'files/footer.php';

	ob_end_flush();
	 ?>
	 <?php 
						//$stop = total_items();
						@$tel = $_SESSION['tel'];
						$sql_run_items = "SELECT * FROM cart WHERE tel = '$tel' AND panier = 0";
						$run_items     = mysqli_query($con,$sql_run_items);
										    
						$count_items   = mysqli_num_rows($run_items);
						for ($i=1; $i <= $count_items ; $i++) { 
							echo '

	 	<script>  

 $(document).ready(function(){ 
 	/**********/
 let qty'.$i.' = $("#qty'.$i.'").val();
	      $("#quantity'.$i.'").val(qty'.$i.');
	      let price = $("#price").text();
	      let id'.$i.' = $("#id'.$i.'").val();  
	      console.log(qty'.$i.');
	      console.log(id'.$i.'); 
	      /*////////////*/
      function autoSave()  
      {  
           let qty'.$i.' = $("#qty'.$i.'").val();
	      $("#quantity'.$i.'").val(qty'.$i.');
	      let price = $("#price").text();
	      let id'.$i.' = $("#id'.$i.'").val();  
	      console.log(qty'.$i.');
	      console.log(id'.$i.'); 
             
                $.ajax({  
                     url:"change_cart.php",  
                     method:"POST",  
                     data:{qty:qty'.$i.', id:id'.$i.'},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          // if(data != "")  
                          // {  
                          //      $("#id").val(data);  
                          // }  
                          $("#autoSave").text("Post save as draft");  
                          setInterval(function(){  
                               $("#autoSave").text("");  
                          }, 5000);  
                     }  
                });  
           }           
        
      setInterval(function(){   
           autoSave();   
           }, 10000);  

      $("#qty'.$i.'").change(function() {
	      autoSave();
	      window.location.reload(true);

	     
    });
 });  
 </script>
	 ';
						}

						 

	 

	  ?>
	 
