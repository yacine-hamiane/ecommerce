<?php include 'files/header.php';

 ?>

 	<div class="container">
		<div class="row mt-5 mb-3">
	 		<div class="col-md-4">
	 			<a href="dashbord.php" title="" class="btn btn-outline-primary"><i class="fa-solid fa-house"></i> retourné au dashbord</a>
	 		</div>

	 		<div class="col-md-4">
	 			
	 			<a href="add_cat.php" title="" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-plus"></i> ajouter une catégorie</a>
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
<div class="container categories">
			

			<div class="card">
				<div class="card-header">
					manage categories
					
				</div>
				<?php 

				$sql = "SELECT * FROM categories WHERE parent = 0";
				$run = mysqli_query($con,$sql);
				while ($cat = mysqli_fetch_array($run)) :

				 ?>
				<div class="card-body">
					<div class='cat'>

						<h3 class="d-inline"><?= $cat['cat_title'] ?></h3>
						<div align="right">
							<a href='edit_categories.php?catid=<?= $cat['cat_id'] ?>' class='btn btn-xs btn-primary'><i class='fas fa-edit'></i> modifié</a>
							<a href='categories.php?do=delete&catid=<?= $cat['cat_id'] ?>'
							class='confirm btn btn-xs btn-danger'><i class='fas fa-trash-alt'></i> supprimé</a>
						</div>
					
					<?php 

					if (isset($_GET['do']) && $_GET['do'] === 'delete') {
						$del_id = $_GET['catid'];
						
						$sql = "DELETE FROM `categories` WHERE `categories`.`cat_id` = ".$del_id."";
					 	$query = mysqli_query($con,$sql);

					 	if (isset($query)) {
					 		# code...
					 		header('location:categories.php');
					 		//$delete_msg .= 'vous avez supprimé le produit id : '.$delete.'';
					 	}
					}

					 ?>

					</div>

					
							
					<h5 class='child-head fw-bold'>child catégories : </h5>
					<?php 
					$cat_id = $cat['cat_id'];
					$select_child = "SELECT * FROM categories WHERE parent = $cat_id";
					$run_child = mysqli_query($con,$select_child);

					while ($cat = mysqli_fetch_array($run_child)) :
					

					 ?>
					<ul class='list-unstyled child-cat'>
					 <li class='badge bg-secondary d-block mt-1'>
					 <a href='edit_categories.php?catid=<?= $cat['cat_id'] ?>' class='btn btn-xs btn-secondary'><?= $cat['cat_title'] ?></a>
					 <a href='categories.php?do=delete&catid=<?= $cat['cat_id'] ?>'
						class='confirm btn btn-xs btn-danger'><i class='fas fa-trash-alt'></i> </a>
					 </li>
					 </ul>
				 <hr>
				<?php endwhile ?>
					</div>
						<hr>


					<?php 
				endwhile;
					
					
					 ?>
				</div>
			</div>
		</div>