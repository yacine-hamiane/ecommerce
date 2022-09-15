<?php 
//ob_start();
include 'files/header.php';
 ?>

 <div class="container">
 	<div class="row">
 		<div class="col-md-6 mx-auto">
 			<div class="card my-auto mt-5">
 				<div class="card-body">
 					<form action="" method="post" accept-charset="utf-8">
 						
 						<div class="form-floating mb-3">
						  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="login">
						  <label for="floatingInput">nom d'utilisateur</label>
						</div>

						<div class="form-floating">
						  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
						  <label for="floatingPassword">mot de passe</label>
						</div>

						<div class="d-grid gap-2 mt-3">
						  <!-- <input type="submit" name="submit" value="connecter" class="btn btn-outline-primary"> -->
						  <button type="submit" name="submit" class="btn btn-outline-success btn-block">connectez</button>
						</div>
 					</form>

 					<?php 

 					if (isset($_POST['submit'])) {
 						# code...
 						$name      = $_POST['login'];
 						$password  = $_POST['password'];

 						$sql       = "SELECT * FROM admin WHERE user_admin = '$name' AND password = '$password'";
 						$query		= mysqli_query($con,$sql);

 						if (mysqli_num_rows($query) > 0) {
 							# code...
 							$_SESSION['admin']  = $name;
 							header('location:dashbord.php');
 						}
 					}

 					 ?>
 					
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 <?php include'files/footer.php'; ?>

 
