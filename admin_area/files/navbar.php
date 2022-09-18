<!-- Start Top Nav -->
<?php if (!isset($_SESSION['admin'])) {
    # code...
    header('location:../index.php');
} ?>
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">firstshop.messagerie@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">0540160812 / 0558674349</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.facebook.com/first.shop.16/?ref=pages_you_manage" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/firstshop_store/?hl=fr" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light d-none" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light d-none" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                First Shop
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                menu <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><?= lang('home'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " disabled='disabled' style="pointer-events: none;" href="about.php"><?= lang('about'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php"><?= lang('shop'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php  ?>" style="pointer-events: none;" href="contact.php"><?= lang('contact'); ?></a>
                        </li>
                        <?php 

                        
                         ?>

                        <div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle <?php if (isset($_GET['id'])) {echo 'd-none';}?>" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						    <?= lang('langue'); ?>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						    <li><a class="dropdown-item" href="?lang=fr">francais</a></li>
						    <li><a class="dropdown-item" href="?lang=ar">عربي</a></li>
						    
						  </ul>
						</div>

                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group d-none">
                            <input type="text" class="form-control d-none" id="inputMobileSearch" placeholder="Search ..." >
                            <div class="input-group-text ">
                                <i class="fa fa-fw fa-search d-none"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline  d-none" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2 d-none"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="cart.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php total_items(); ?></span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none d-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>