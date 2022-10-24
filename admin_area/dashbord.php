<?php include 'files/header.php';

 ?>

<div class="container-fluid">
 	<div class="row">
 		<div class="col-md-4 side-bar">
 			<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item" style="pointer-events: none;">
          <a href="#" class="nav-link active" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
            <i class="fas fa-home"></i> 
            Home
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white" >
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg><i class="fas fa-columns"></i> 
            Dashboard
          </a>
        </li>
        <li class="d-none">
          <a href="insert_product.php" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
            ajouté un produit
          </a>
        </li>
        <li>
          <a href="product.php" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            <i class="fab fa-product-hunt"></i> 
            produits
          </a>
        </li>

        <li>
          <a href="categories.php" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            <i class="fas fa-tags"></i>
            catégories
          </a>
        </li>

        <li>
          <a href="brand.php" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            <i class="fa-solid fa-barcode"></i>
            marques
          </a>
        </li>

         <li>
          <a href="commandes.php" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            <i class="fas fa-cart-plus"></i>
            commandes par client
          </a>
        </li>

        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            <i class="fa-solid fa-users-between-lines"></i>
            client
          </a>
        </li>

        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            <i class="fa-solid fa-user"></i>
            admin
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            <i class="fa-solid fa-message"></i>
            messages
          </a>
        </li>

      </ul>
    <hr>
    

      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#"> <i class="fa-solid fa-gears"></i> parametres</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa-regular fa-id-card"></i> Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-right-from-bracket"></i> deconnecter</a></li>
        </ul>
      </div><!--dropdown-->
  
     </div>

  
 		</div><!--col-md-4-->

    <div class="col-md-8">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card text-white bg-secondary">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                  Panier abondonné
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes ajouté au panier sans confirmation des informations de client.</p>
              <a href="commandes_page.php?commandes=abondonne" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card text-dark bg-light">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                  En attente
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    53
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes avec les informations de client,vous devez les confirmer et les mettre pret a expedier.</p>
              <a href="commandes_page.php?commandes=attente" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card text-white bg-danger">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                   Annulé
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    20
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes annulé par le client ou leur téléphone est injoignable.</p>
              <a href="commandes_page.php?commandes=annule" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card text-dark bg-info">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                  Pret a expedier
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    35
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes confirmer et pret a expedier.</p>
              <a href="commandes_page.php?commandes=expedier" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card text-white bg-primary">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                  Sortie en livraison
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    10
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes qui sont chez la societe de livraison ou chez vous livreur.</p>
              <a href="commandes_page.php?commandes=livraison" class="btn btn-outline-dark ">voir</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card text-white bg-success">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                   Livré
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    10
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes recupérer par le client .</p>
              <a href="commandes_page.php?commandes=livre" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        

        <div class="col">
          <div class="card text-white bg-dark">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                   Livraison a echoué
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    18
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes qui n'ont pas été recupérer par le client.</p>
              <a href="commandes_page.php?commandes=echoue" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card text-dark bg-warning">
            
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="btn btn-primary position-relative">
                   Retourné
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    18
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
              </h5>
              <p class="card-text">les commandes que vous avez recupérer de la societe de livraison ou de chez vous livreur.</p>
              <a href="commandes_page.php?commandes=Retourne" class="btn btn-primary">voir</a>
            </div>
          </div>
        </div>

        
      </div>
    </div>
 	</div><!--row-->
</div><!--container-->



<?php 
include('files/footer.php'); 
?>
