<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';
    //include 'files/banner.php';
    @$id      = $_GET['id'];
     ?>
     <form action="" method="post" accept-charset="utf-8">
     	<div class="container mt-4">
     	<div class="row">
     		<div class="col-md-6 mx-auto">
     			<h1><?= lang('inscrire'); ?> :</h1>
                <?php //echo $_SERVER["HTTP_REFERER"]; ?>
                <?php 
                if (isset($_GET['go']) AND $_GET['go'] = 'add_cart') {
                    # code...
                    echo '<a class="text-decoration-none" href="connexion.php?add_cart='.$id.'" title="">'.lang('lien_co').'</a>';
                }else{
                 echo '<a class="text-decoration-none" href="connexion.php" title="">'.lang('lien_co').'</a>';
                }
                ?>
     	<div class="row g-2">
		  <div class="col-md">
		    <div class="form-floating">
		      <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com"  name="nom">
		      <label for="floatingInputGrid"><?= lang('nom'); ?></label>
		    </div>
		  </div>
		  <div class="col-md">
		    <div class="form-floating">
		      <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="prenom">
		      <label for="floatingInputGrid"><?= lang('prenom'); ?></label>
		    </div>
		  </div>

		  <div class="form-floating mb-3">
			  <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="num">
			  <label for="floatingInput"><?= lang('num'); ?></label>
		  </div>

		    <div class="row g-2">
			  <div class="col-md">
			    <div class="form-floating">
			      <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com"  name="wilaya">
			      <label for="floatingInputGrid"><?= lang('wilaya'); ?></label>
			    </div>
			  </div>
			  <div class="col-md">
			    <div class="form-floating">
			      <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="commune">
			      <label for="floatingInputGrid"><?= lang('commune'); ?></label>
			    </div>
			  </div>

			  <input type="submit" name="inscription" value="<?= lang('inscrire'); ?>" class="btn btn-outline-success mt-3 mb-3">
		    </div>
     		</div>
     	</div>
     	
     </div>
     	<?php 

     	if (isset($_POST['inscription'])) {
     		# code...
     		$nom     = $_POST['nom'];
     		$prenom  = $_POST['prenom'];
     		$numero  = $_POST['num'];
     		$wilaya  = $_POST['wilaya'];
     		$commune = $_POST['commune'];

     		@$id      = $_GET['id'];
            $check   = "SELECT * FROM client WHERE num = '$numero'";
            $run_check = mysqli_query($con,$check);
            if (mysqli_num_rows($run_check) > 0) {
                # code...
                echo "<script>alert('ce numéro existe deja')</script>";
            }else{
                $sql    ="INSERT INTO client (nom, prenom, num, wilaya, commune) VALUES ('$nom', '$prenom', '$numero', '$wilaya', '$commune')";
            $query   = mysqli_query($con,$sql);

            if (isset($query)) {
                # code...
                $_SESSION['client']  = $nom . '_' . $prenom;
                $_SESSION['tel']     = $numero;

                if (isset($_GET['go']) AND $_GET['go'] = 'add_cart' ) {
                    # code...
                    header('location:index.php?add_cart='.$id.'&new=1');
                }else{
                    header('location:index.php');
                }
                
                //echo $_SESSION['client'];
            }
            }
     		//$sql     = "INSERT INTO `client` (`client_id`, `nom`, `prenom`, `num`, `wilaya`, `commune`) VALUES (NULL, 'nom', 'prenom', '540160812', 'alger', 'beb el oued')";

     		
     	}

     	 ?>
     </form>
     


     <?php 
    include 'files/footer.php';
    ob_end_flush();
     ?>