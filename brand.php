<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';
    //include 'files/banner.php';
    @$brand = $_GET['brand'];

     ?>

    <section class="container py-5">
        <?php //echo $parent; ?>
        <div class="row">
            <?php 
            $show_brand = "SELECT * FROM products WHERE product_brand = '$brand' ORDER BY RAND()";
            $run_showb = mysqli_query($con,$show_brand);
            while ($sbrand = mysqli_fetch_array($run_showb)) :

             ?>
            <div class="col-12 col-md-3 p-5 d-flex flex-column align-items-center">
                <a href="shop-single.php?id=<?= $sbrand['product_id'] ?>" ><img src="admin_area/product_images/<?= $sbrand['product_image'] ?>" class="rounded-circle  border" width='250' height='250'></a>
                <h5 class="text-center mt-3 mb-3"><?= $sbrand['product_title'] ?></h5>
                <p class="text-center"><a class="btn btn-success" href="shop-single.php?id=<?= $sbrand['product_id'] ?>"><?= lang('visitez'); ?></a></p>
            </div>
        <?php endwhile; ?>
            
        </div>
    </section>
    <!-- End Categories of The Month -->


    

    <?php 
    include 'files/footer.php';
    ob_end_flush();
     ?>

     
