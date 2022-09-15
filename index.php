<?php 
ob_start();
session_start();
$pageTitle =  'home page';
include 'init.php';


?>
<div class="container">
	<div class="row">
		<h3 class="text-center">parcourez plus de catégories</h3>
		<div class="col-sm-2 col-md-3 more-cat">
			
			<?php 
             $allCats = getAllFrom('*' , 'categories' ,  'where parent = 13', '' , 'RAND()','desc',0,4);
              foreach ($allCats as $cat) :
             ?>
			<a href="categories.php?pageid=<?= $cat['id'] ?>" class='text-decoration-none'><?= $cat['name'] ?></a>
		<?php endforeach ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<!-- <div class="col-md-1">filtrer : </div> -->
		<div class="con-md-12 d-flex justify-content-around mt-3">
			<div class="col-md-2">
			filtrer : 
			<a href="index.php?orderby=date" title="acheter les nouveauté de livre récement sortie" class="btn btn-outline-dark">nouveauté</a>
		</div>
		<div class="col-md-2">
			<a href="index.php?orderby=prix-bas" title="chercher et acheter des livres par prix" class="btn btn-outline-dark">prix de plus bas au plus haut</a>
		</div>
		<div class="col-md-2">
			<a href="index.php?orderby=prix-haut" title="chercher et acheter des livres par prix" class="btn btn-outline-dark">prix de plus haut au plus bas</a>
		</div>
		<div class="col-md-2">
			<a href="index.php?orderby=auteur" title="chercher et acheter des livres  par auteur et ecrivain" class="btn btn-outline-dark">auteur</a>
		</div>
		<div class="col-md-2">
			<a href="index.php?orderby=populaire" title="chercher et acheter des livres les plus populaires" class="btn btn-outline-dark d-none">les plus populaires</a>
		</div>
		</div>
	</div>
</div>
<div class="container mt-4">
	<div class="row">

		<?php 
		$start = 0;
 		$limit = 100;

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
 		$start = ($page*100) - 100;

 		//$orderfield = 'item_ID';
 		/******************start ordering******************/
 		$ordering = 'asc';

 		if (isset($_GET['orderby']) && $_GET['orderby'] == 'prix-haut') {
 			# code...
 			$orderfield = 'price';
 			$ordering   = 'desc';
 		}elseif (isset($_GET['orderby']) && $_GET['orderby'] == 'prix-bas') {
 			# code...
 			$orderfield = 'price';
 			$ordering   = 'asc';
 		}elseif (isset($_GET['orderby']) && $_GET['orderby'] == 'auteur') {
 			# code...
 			$orderfield = 'auteur';
 		}elseif (isset($_GET['orderby']) && $_GET['orderby'] == 'date') {
 			# code...
 			$orderfield = 'add_date';
 			$ordering   = 'desc';
 		}elseif (isset($_GET['orderby']) && $_GET['orderby'] == 'populaire') {
 			# code...
 			$orderfield = 'ventes';
 			$ordering   = 'desc';
 		}else{
 			$orderfield = 'RAND()';
 		}

 		/**********************end ordering**************************/

		$allItems = getAllFrom('*','items' , 'where approuved = 1' ,'', $orderfield ,$ordering,$start,$limit);
		foreach ($allItems as $item) {
			# code...
			//echo $item['title'];
			echo "<div class='col-5 col-md-2  mt-2 mx-1 card'>";
				echo "<div class=' item-box'>";
					
					echo "<a href='item.php?itemid=".$item['item_ID']."'title=".$item['title'] . ' de '. $item['auteur']."><img style='height:350px;width:100%' class='img-fluid' src='gerer/upload/product/".$item['image']."' alt='".$item['title'] . ' de '. $item['auteur'] ."'/></a>";
					echo "<div class='figure-caption'>";
						echo '<h3><a class="text-decoration-none" href="item.php?itemid='.$item['item_ID'].'" title="'.$item['title'].' de '.$item['auteur'].'">'. $item['title'] .'</a></h3>';
						echo '<p><a href="search.php?searchArea='.$item['auteur'].'&search=" title="'.$item['auteur'].'" class="text-decoration-none">'.$item['auteur'] .'</a></p>';
						echo "<p class='fw-bold'> prix : " .$item['price'].' da</p>';
						echo '<p>'.substr($item['description'],0,150) .'...</p>';
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}

		 ?>
		 
	</div>

	<div class="row">
 		<div class="col-md-12 mt-5">
 			<?php 
 			
 			
 			
 			$query  = getAllFrom('*','items','','','item_ID','');
 			 
 			$res = count($query);
 			
 			
 			$total_pages = ceil($res / $limit);
 			
 			$page = isset($_GET['page']) ? $_GET['page'] : 1;
 			$links = "<nav aria-label='Page navigation example'> <ul class='pagination justify-content-center'>";
 			
 			for ($i=1; $i <= $total_pages ; $i++) { 
 				# code...
 				$active =$i == $page ? "class='page-item active'" : '';
 				$links .= "<li $active ><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>"; 
 				}
 				echo $links."</ul></nav>";
 			//print_r($row);
 			//echo $total_articles;
 			
 			 ?>
</div>



<?php 
include $tpl . 'footer.php'; 
ob_end_flush();
?>
