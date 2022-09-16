<?php 
ob_start();
    include 'files/header.php';
    include 'files/navbar.php';
    //include 'files/banner.php';
    @$id = $_GET['id'];

     ?>

    <section class="container py-5">
        <?php //echo $parent; ?>
        <div class="row">
            <?php 
            $show_cat = "SELECT * FROM categories WHERE parent = '$id' ORDER BY RAND()";
            $run_showc= mysqli_query($con,$show_cat);
            while ($scat = mysqli_fetch_array($run_showc)) :

             ?>
            <div class="col-12 col-md-3 p-5 d-flex flex-column align-items-center">
                <a href="categories.php"><img src="admin_area/product_images/<?= $scat['cat_img'] ?>" class="rounded-circle  border" width='250' height='250'></a>
                <h5 class="text-center mt-3 mb-3"><?= $scat['cat_title'] ?></h5>
                <p class="text-center"><a class="btn btn-success" href="cat.php?id=<?= $scat['cat_id'] ?>"><?= lang('visitez'); ?></a></p>
            </div>
        <?php endwhile; ?>
            
        </div>
    </section>
    <!-- End Categories of The Month -->


    

    <?php 
    include 'files/footer.php';
    ob_end_flush();
     ?>

     