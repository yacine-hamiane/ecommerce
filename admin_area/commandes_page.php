<?php 
ob_start();
include 'files/header.php';


$delete_msg = ''
 ?>
 <div class="container">
 	<div class="row mt-5 mb-3">
 		<div class="col-md-4">
 			<a href="dashbord.php" title="" class="btn btn-outline-primary"><i class="fa-solid fa-house"></i> retourné au dashbord</a>
 		</div>

 		

 		<div class="col-md-4">
 			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			    filtrage
			  </button>
			  <ul class="dropdown-menu">
			    <li><a class="dropdown-item" href="#">les plus recentes</a></li>
			    <li><a class="dropdown-item" href="#">les plus ancienne</a></li>
			    
			  </ul>
			</div>
 		</div>

 		<div class="col-md-4">
 			<form class="d-flex" role="search">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
		        <button class="btn btn-outline-success" type="submit">Search</button>
		      </form>
 		</div>

 		
 	</div>

 	<div class="row">
 		<table class="table table-striped table-bordered table-hover">
 			<?php 
			  	if($_GET['commandes'] === 'abondonne') :
			  	$sql = "SELECT * FROM cart WHERE panier = 0";
			  	$result = mysqli_query($con,$sql);

			  	

			  	 ?>
             <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">adresse ip</th>
			      <th scope="col">note</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] ?></td>
			      <td><?= $row['ip_address'] ?></td>
			      <td><input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example"></td>
			      <td>
			      	<a href="commandes_page.php?commandes=abondonne&&edit=<?= $row['cart_id'] ?>&&action=true" style="pointer-events: none;" class="btn btn-info">
			      		<i class="fa-solid fa-check"></i>
			      	 confirmer
			      	</a>
			      	<a href="commandes_page.php?commandes=abondonne&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 annulé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '1' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=abondonne');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$delete = $_GET['edit'];
			 	$sql = "DELETE FROM `cart` WHERE `cart`.`cart_id` = ".$delete."";
			 	$query = mysqli_query($con,$sql);

			 	if (isset($query)) {
			 		# code...
			 		header('location:commandes_page.php?commandes=abondonne');
			 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
			 	}
			 }
			
			 ?>

			 
			    
			  </tbody>
			<?php  endif; ?>
			<!-----------------//end if commandes = abondonne------------------>
			<?php 
			//end if commandes = abondonne
			 if($_GET['commandes'] === 'attente') :
			 	$sql = "SELECT * FROM cart WHERE panier = 1 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=attente&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info">
			      		<i class="fa-solid fa-check"></i>
			      	 confirmer
			      	</a>
			      	<a href="commandes_page.php?commandes=attente&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 annulé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '3' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=attente');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '2' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=attente');
			 	}
			 }
			
			//end if commandes = attente
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>
<!-------------------------end if commandes = attente-------------------------------------->
			<?php 
			//end if commandes = attente
			 if($_GET['commandes'] === 'annule') :
			 	$sql = "SELECT * FROM cart WHERE panier = 2 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=annule&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info">
			      		<i class="fa-solid fa-check"></i>
			      	 confirmer
			      	</a>
			      	<a href="commandes_page.php?commandes=annule&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 supprimé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '3' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=annule');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$delete = $_GET['edit'];
			 	$sql = "DELETE FROM `cart` WHERE `cart`.`cart_id` = ".$delete."";
			 	$query = mysqli_query($con,$sql);

			 	if (isset($query)) {
			 		# code...
			 		header('location:commandes_page.php?commandes=annule');
			 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
			 	}
			 }
			
			//end if commandes = annule
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>

			<!---------------end if commandes = annule--------------------------------->
			<?php 
			//end if commandes = annule
			 if($_GET['commandes'] === 'expedier') :
			 	$sql = "SELECT * FROM cart WHERE panier = 3 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=expedier&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info">
			      		<i class="fa-solid fa-check"></i>
			      	 expedier
			      	</a>
			      	<a href="commandes_page.php?commandes=expedier&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 annulé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '4' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=expedier');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '2' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=expedier');
			 	}
			 }
			
			//end if commandes = attente
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>

			<!---------------end if commandes = expedier--------------------------------->
			<?php 
			//end if commandes = expedier
			 if($_GET['commandes'] === 'livraison') :
			 	$sql = "SELECT * FROM cart WHERE panier = 4 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=livraison&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info">
			      		<i class="fa-solid fa-check"></i>
			      	 livré
			      	</a>
			      	<a href="commandes_page.php?commandes=livraison&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 echoué
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '5' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=livraison');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '6' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=livraison');
			 	}
			 }
			
			//end if commandes = livraison
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>
			<!---------------end if commandes = livraison--------------------------------->
			<?php 
			//end if commandes = livraison
			 if($_GET['commandes'] === 'livre') :
			 	$sql = "SELECT * FROM cart WHERE panier = 5 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=livre&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info">
			      		<i class="fa-solid fa-check"></i>
			      	 encaissé
			      	</a>
			      	<a href="commandes_page.php?commandes=livre&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 supprimé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '8' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=livre');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$delete = $_GET['edit'];
			 	$sql = "DELETE FROM `cart` WHERE `cart`.`cart_id` = ".$delete."";
			 	$query = mysqli_query($con,$sql);

			 	if (isset($query)) {
			 		# code...
			 		header('location:commandes_page.php?commandes=livre');
			 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
			 	}
			 }
			
			//end if commandes = livre
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>

			<!---------------end if commandes = livre--------------------------------->
			<?php 
			//end if commandes = livre
			 if($_GET['commandes'] === 'echoue') :
			 	$sql = "SELECT * FROM cart WHERE panier = 6 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=echoue&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info" >
			      		<i class="fa-solid fa-check"></i>
			      	 retourné
			      	</a>
			      	<a href="commandes_page.php?commandes=echoue&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 supprimé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '7' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=echoue');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$delete = $_GET['edit'];
			 	$sql = "DELETE FROM `cart` WHERE `cart`.`cart_id` = ".$delete."";
			 	$query = mysqli_query($con,$sql);

			 	if (isset($query)) {
			 		# code...
			 		header('location:commandes_page.php?commandes=echoue');
			 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
			 	}
			 }
			
			//end if commandes = echoue
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>

			<!---------------end if commandes = echoue--------------------------------->
			<?php 
			//end if commandes = ecoue
			 if($_GET['commandes'] === 'Retourne') :
			 	$sql = "SELECT * FROM cart WHERE panier = 7 ORDER BY tel";
			  	$result = mysqli_query($con,$sql);
			?>
			 <thead class="table-dark">
			    <tr>
			      <th scope="col">ID de la commande</th>
			      <th scope="col">ID produit</th>
			      
			      <th scope="col">nom de produit</th>
			      <th scope="col">image</th>
			      <th scope="col">prix</th>
			      <th scope="col">fullname</th>
			      <th scope="col">adresse</th>
			      <th scope="col">numero</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	while ($row = mysqli_fetch_array($result)) :
			  		$p_id =  $row['product_id'];
			  		$select_p = "SELECT * FROM products WHERE product_id = $p_id";
			  		$run_p    = mysqli_query($con,$select_p);
			  		while ($p = mysqli_fetch_array($run_p)) :

			  	 ?>
			  	
			    <tr>
			      <th scope="row"><?= $row['cart_id'] ?></th>
			      
			      <td><?= $p_id ?></td>
			      <td><?= $row['product_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $p['product_image'] ?>" alt="" width="75" height="75">
			      </td>
			      <td><?= $p['product_price'] . ' da' ?></td>
			      <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
			      <td><?= $row['commune'] . ' , ' . $row['wilaya'] ?></td>
			      <td><?= 0 . $row['tel'] ?></td>
			      <td>
			      	<a href="commandes_page.php?commandes=Retourne&&edit=<?= $row['cart_id'] ?>&&action=true" class="btn btn-info" style="pointer-events: none;">
			      		<i class="fa-solid fa-check"></i>
			      	 retourné
			      	</a>
			      	<a href="commandes_page.php?commandes=Retourne&&edit=<?= $row['cart_id'] ?>&&action=false" class="btn btn-danger">
			      		<i class="fa-solid fa-circle-xmark"></i>
			      	 supprimé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 
			 endwhile; 

			 if (isset($_GET['action']) && $_GET['action'] === 'true') {
			 	$edit = $_GET['edit'];
			 	$edit_cart = "UPDATE `cart` SET `panier` = '7' WHERE `cart`.`cart_id` = $edit";

			 	$run_edit_cart  = mysqli_query($con,$edit_cart);

			 	if ($run_edit_cart) {
			 		header('location:commandes_page.php?commandes=Retourne');
			 	}
			 }

			 if (isset($_GET['action']) && $_GET['action'] === 'false') {
			 	$delete = $_GET['edit'];
			 	$sql = "DELETE FROM `cart` WHERE `cart`.`cart_id` = ".$delete."";
			 	$query = mysqli_query($con,$sql);

			 	if (isset($query)) {
			 		# code...
			 		header('location:commandes_page.php?commandes=Retourne');
			 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
			 	}
			 }
			
			//end if commandes = echoue
			
			 ?>
			 
			    
			  </tbody>
			<?php endif; ?>

        </table>
 	</div>
 </div>

<?php
 include('files/footer.php'); 
 ob_end_flush();
 ?>
