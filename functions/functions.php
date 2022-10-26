<?php 

@include('../includes/db.php');
function popup()
{
	global $con;
	global $numero;
	$script = '';
	$numero = @$_SESSION['tel'];
	if (isset($_SESSION['client'])) {
		$chek_panier = "SELECT * FROM cart WHERE tel = '$numero' AND panier = 0";
		$run_check   = mysqli_query($con,$chek_panier);
		$count = mysqli_num_rows($run_check);

		if (mysqli_num_rows($run_check) > 0) {
			
			if (isset($_GET['lang']) AND $_GET['lang'] == 'ar') {
				echo '
			<button type="button" id="rappelle" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">تذكير السلة</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        لقد تخليت عن '.$count.' منتجات في سلتك  , انقر <a href="cart.php" title="cart.php">هنا</a>  أو على زر السلة في الأسفل ، قم بملء معلوماتك وانقر فوق ارسل معلوماتك لتأكيد الشراء
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اخفاء</button>
        
        <a href="cart.php" title="" class="btn btn-primary"><i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i> السلة</a>
      </div>
    </div>
  </div>
</div>
			';
			}elseif (locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) == 'ar_AR' OR locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) == 'ar') {
				echo '
			<button type="button" id="rappelle" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">تذكير السلة</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        لقد تخليت عن '.$count.' منتجات في سلتك  , انقر <a href="cart.php" title="cart.php">هنا</a>  أو على زر السلة في الأسفل ، قم بملء معلوماتك وانقر فوق ارسل معلوماتك لتأكيد الشراء
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اخفاء</button>
        
        <a href="cart.php" title="" class="btn btn-primary"><i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i> السلة</a>
      </div>
    </div>
  </div>
</div>
			';
			}else{
			echo '
			<button type="button" id="rappelle" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Rappelle panier</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous Avez Laissez Abondonné '.$count.' produit dans votre panier , cliquez <a href="cart.php" title="cart.php">ici</a> ou sur le button panier en bas remplissez vos information et cliquez sur validez votre commande pour confirmer votre achat
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        
        <a href="cart.php" title="" class="btn btn-primary"><i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i> panier</a>
      </div>
    </div>
  </div>
</div>
			';
			}
			
			

			 
		}
	}
	//echo $script;
}

function check_isset_product_in_cart(){

}
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function total_price(){
	global $con;
	global $numero;
	$numero = $_SESSION['tel'];

	$total = 0;
	$ip = getUserIpAddr();
	$price = "SELECT * FROM cart WHERE tel = '$numero' ";
	$run_cart = mysqli_query($con,$price);

	while ($fetch_cart = mysqli_fetch_array($run_cart)) {
		# code...
		$product_id = $fetch_cart['product_id'];
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
			$qtt           = "SELECT * FROM cart WHERE product_id = '$product_id' AND tel = '$numero'";
			$run_qty       = mysqli_query($con,$qtt);


			$row_qty       = mysqli_fetch_array($run_qty);
			$qty           = $row_qty['quantity'];
			$values_qty    = $values * $qty;
			//end getting qtt of product
			$total         += $values_qty;//$values;
		}
	}
	
	echo $total . ' DA';
}//end function tatal_price
function total_items()
{
	global $con;
	$ip = getUserIpAddr();
	@$tel = $_SESSION['tel'];
	$sql_run_items = "SELECT * FROM cart WHERE tel = '$tel' AND panier = 0";
	$run_items     = mysqli_query($con,$sql_run_items);
					    
	$count_items   = mysqli_num_rows($run_items);

	
	echo $count_items;
}


function get_cat(){

	global $con;

	$get_cats = 'SELECT * FROM categories WHERE parent = 0';
				  $run_cats = mysqli_query($con,$get_cats);

				  while ($rows_cats = mysqli_fetch_array($run_cats)) {
				  	# code...
				  	@$cat_id     = $rows_cats['cat_id'];
				  	@$cat_title  =$rows_cats['cat_title'];

				  	echo '<li class="nav-item"><a href="list_cat.php?id='.$cat_id.'" title="" class="text-decoration-none nav-link text-white">'.$cat_title.'</a></li>';
				  }
				}//end function get_cat

function get_brand(){
	global $con;
	$get_brand = 'SELECT * FROM marques';
				  $run_brand = mysqli_query($con,$get_brand);

				  while ($rows_brand = mysqli_fetch_array($run_brand)) {
				  	# code...
				  	@$brand_id     = $rows_brand['brand_id'];
				  	@$brand_title  =$rows_brand['brand_title'];

				  	echo '<li class="nav-item"><a href="brand.php?brand='.$brand_id.'" title="" class="text-decoration-none nav-link text-white">'.$brand_title.'</a></li>';
				  }
}//end function get_brand()




 ?>
