<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';
    //include 'files/banner.php';
     ?>
     <form action="" method="post" accept-charset="utf-8">
     	<div class="container mt-4">
     	<div class="row">
     		<div class="col-md-6 mx-auto">
     			<h1><?= lang('connect'); ?> :</h1>
     	<div class="row g-2">
		 

		  <div class="form-floating mb-3">
			  <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="num">
			  <label for="floatingInput"><?= lang('num'); ?></label>
		  </div>

		  

			  <input type="submit" name="connect" value="<?= lang('connect'); ?>" class="btn btn-outline-success mt-3 mb-3">
		    </div>
     		</div>
     	</div>
     	
     </div>
     	<?php 

     	if (isset($_POST['connect'])) {
     		# code...
            
     		$numero  = $_POST['num'];

     		//$sql     = "INSERT INTO `client` (`client_id`, `nom`, `prenom`, `num`, `wilaya`, `commune`) VALUES (NULL, 'nom', 'prenom', '540160812', 'alger', 'beb el oued')";

     		$sql    = "SELECT * FROM client WHERE num = '$numero'";
     		$query   = mysqli_query($con,$sql);

            if (isset($query)) {
                # code...
                while ($client = mysqli_fetch_array($query)) {
                    # code...
                    $nom    = $client['nom'];
                    $prenom = $client['prenom'];
                    $_SESSION['client']  = $nom . '_' . $prenom;
                    $_SESSION['tel']     = $numero;
                    if (isset($_GET['add_cart'])) {
                        # code...
                        header('location:index.php?add_cart='.$id.'&new=1');
                    }else{
                        header('location:index.php');
                    }
                    
                }
                
            }
                
     		

     	}

     	 ?>
     </form>
     


     <?php 
    include 'files/footer.php';
    ob_end_flush();
     ?>