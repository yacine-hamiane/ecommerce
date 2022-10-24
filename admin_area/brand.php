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
 			<a href="add_brand.php" title="" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-plus"></i> ajouté une marques</a>
 		</div>

 		<div class="col-md-12 mt-3">
 			<?php 
 			/*if (isset($_GET['delete']) && $_GET['delete'] === 'ok') {
 				# code...
 				//echo $delete_msg;
 				echo '<div class="alert alert-success p-3">
 					produit supprimé avec succéss
 				</div>';
 				header('location:p.php');
 			}*/
 			 ?>
 		</div>
 	</div>

 	<div class="row">
 		<table class="table table-striped table-bordered table-hover">
             <thead class="table-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">nom</th>
			      <th scope="col">image</th>
			      
			      <th scope="col">action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	$sql = "SELECT * FROM marques";
			  	$result = mysqli_query($con,$sql);

			  	while ($row = mysqli_fetch_array($result)) :

			  	 ?>
			    <tr>
			      <th scope="row"><?= $row['brand_id'] ?></th>
			      <td><?= $row['brand_title'] ?></td>
			      <td>
			      	<img src="product_images/<?= $row['brand_img'] ?>" alt="" width="75" height="75">
			      </td>
			      
			      <td>
			      	<a href="edit_brand.php?edit=<?= $row['brand_id'] ?>" title="" class="btn btn-info">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
						  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
			      	 modifié
			      	</a>
			      	<a href="brand.php?delete=<?= $row['brand_id'] ?>" title="" class="btn btn-danger">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
						  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
			      	 supprimé
			      	</a>
			      </td>
			    </tr>
			<?php
			 endwhile; 

			 if (isset($_GET['delete'])) {
			 	# code...
			 	$delete = $_GET['delete'];
			 	$sql = "DELETE FROM `marques` WHERE `marques`.`brand_id` = ".$delete."";
			 	$query = mysqli_query($con,$sql);

			 	if (isset($query)) {
			 		# code...
			 		header('location:brand.php');
			 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
			 	}
			 }

			 ?>
			    
			  </tbody>
        </table>
 	</div>
 </div>

<?php
 include('files/footer.php'); 
 ob_end_flush();
 ?>
