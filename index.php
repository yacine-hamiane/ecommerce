<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';
    include 'files/banner.php';
    popup();
     ?>

   


    <!-- Start Categories of The Month -->

    <?php 
    //ajouté button connexion / inscription 
    //ajouté a la bd une table client
    //ajouté session start
    //il faut diriger le client depuis shop.php ou shop-single.php vars page singin.php pour que le client entre ces cordonné pour créé un compte
    //on lui ouvre un compte client et ajoute ses information a la cart 
    //apres qu'il rentre ses coordonné le client sera dirigé vers index.php et on ajoute ses cordonné directement au lieu d'entrer 0
    //dans cart.php on ajoute une alerte 'si votre panier est vide connectez vous avec votre numero '
    //on affiche la cart selon le userid ou numero ou les deux
                    if (isset($_GET['add_cart']) && !isset($_GET['new'])) {
                        # code...
                        $product_id = $_GET['add_cart'];
                        $tel            = $_SESSION['tel'];

                        $ip = getUserIpAddr();
                        echo $product_id;
                        echo $ip;
                        $sql        = "SELECT * FROM cart WHERE product_id = '$product_id' AND tel = '$tel'";
                        $run_check_pro = mysqli_query($con,$sql);

                        if (mysqli_num_rows($run_check_pro) > 0) {
                            header('location:cart.php');
                        }else{
                            if (!isset($_SESSION['client'])) {
                            # code...
                            
                            header('location:inscription.php?go=add_cart&id='.$product_id);
                        }else{
                            //essaye ce code pour les utilisateur qui viennent de la page inscription.php pour ajouter le produit directement a la cart
                            //check if isset product in cart
                            $fetch_product  = "SELECT * FROM products WHERE product_id = '$product_id' ";
                            $fetch_pro      = mysqli_query($con,$fetch_product);
                            $fetch_pro      = mysqli_fetch_array($fetch_pro);
                            $pro_title      = $fetch_pro['product_title'];
                            //$tel          = $_SESSION['tel'];

                            $insert_product = "INSERT INTO cart (product_id,product_title,ip_address,quantity,firstname,lastname,wilaya,commune,tel) VALUES ('$product_id','$pro_title','$ip',1,'0','0','0','0','$tel')";

                            $run_insert_pro = mysqli_query($con,$insert_product);

                            //echo "<script>window.open('index.php','_self')</script>";
                            if (isset($run_insert_pro)) {
                                # code...
                                header('location:cart.php');
                            }

                            header('location:cart.php');

                            
                        }
                        }

                        
                        }

                        if (isset($_GET['new']) && isset($_GET['add_cart'])) {
                            # code...
                            $product_id = $_GET['add_cart'];
                            $tel            = $_SESSION['tel'];
                        $ip = getUserIpAddr();
                        echo $product_id;
                        echo $ip;
                        $sql        = "SELECT * FROM cart WHERE product_id = '$product_id' AND tel = '$tel'";
                        $run_check_pro = mysqli_query($con,$sql);
                        if (mysqli_num_rows($run_check_pro) > 0) {
                            header('location:cart.php');
                        }else{
                            if (!isset($_SESSION['client'])) {
                            # code...
                            
                            header('location:inscription.php?go=add_cart&id='.$product_id);
                        }else{
                            //essaye ce code pour les utilisateur qui viennent de la page inscription.php pour ajouter le produit directement a la cart
                            $fetch_product  = "SELECT * FROM products WHERE product_id = '$product_id' ";
                            $fetch_pro      = mysqli_query($con,$fetch_product);
                            $fetch_pro      = mysqli_fetch_array($fetch_pro);
                            $pro_title      = $fetch_pro['product_title'];
                            

                            //check if isset product in cart

                            $insert_product = "INSERT INTO cart (product_id,product_title,ip_address,quantity,firstname,lastname,wilaya,commune,tel) VALUES ('$product_id','$pro_title','$ip',1,'0','0','0','0','$tel')";

                            $run_insert_pro = mysqli_query($con,$insert_product);

                            //echo "<script>window.open('index.php','_self')</script>";
                            if (isset($run_insert_pro)) {
                                # code...
                                header('location:cart.php?new=1');
                            }

                            header('location:cart.php?new=1');

                            
                        }
                        }

                        
                        }
                        
                    //}//endif
                     ?>
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><?= lang('titlecat'); ?></h1>
                <p>
                    <?= lang('stitlecat'); ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php 
            $show_cat = "SELECT * FROM categories WHERE parent != 0 ORDER BY RAND() LIMIT 0,3";
            $run_showc= mysqli_query($con,$show_cat);
            while ($scat = mysqli_fetch_array($run_showc)) :

             ?>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="categories.php"><img src="admin_area/product_images/<?= $scat['cat_img'] ?>" class="rounded-circle  border" width='250' height='250'></a>
                <h5 class="text-center mt-3 mb-3"><?= $scat['cat_title'] ?></h5>
                <p class="text-center"><a class="btn btn-success" href="cat.php?id=<?= $scat['cat_id'] ?>"><?= lang('visitez'); ?></a></p>
            </div>
        <?php endwhile; ?>
            
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1"><?= lang('titlepro'); ?></h1>
                    <p>
                        <?= lang('stitlepro'); ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <?php 
            $show_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,3";
            $run_showp= mysqli_query($con,$show_pro);
            while ($spro = mysqli_fetch_array($run_showp)) :
                $pro_image = $spro['product_image'];

             ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html?id=<?= $spro['product_id'] ?>">
                            <img src="admin_area/product_images/<?= $pro_image ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="d-none">
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right"><?= $spro['product_price'] ?></li>
                            </ul>
                            <a href="shop-single.html?id=<?= $spro['product_id'] ?>" class="h2 text-decoration-none text-dark"><?= $spro['product_title'] ?></a>
                            <p class="card-text d-none">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.

                            </p>
                            <p class="text-muted d-none">Reviews (24)</p>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
                
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    <?php 
    include 'files/footer.php';
    ob_end_flush();
     ?>

     
