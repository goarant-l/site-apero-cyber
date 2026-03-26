<div class="container">

  <?php

  require "./info.BDD.php";


  $requeteSQL = "SELECT numProduit ,nomProduit, descriptif, prixUnitaire, nomImage FROM produit";
  // Exécution de la requête
  $reponse = $pdo->query($requeteSQL);
  $liste_produit = $reponse->fetchall(PDO::FETCH_ASSOC); ?>

  <h1 class="p-3 m-5 text-center">
    Le site d'occasion de modèles haut de gamme
  </h1>

  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3">
    <?php foreach ($liste_produit as $produit) { ?>
      <div class="col">
        <div class="card h-100">
          <img src="/images/<?php echo $produit['nomImage'] ?>" class="card-img-top"
            alt="<?php echo $produit['nomProduit'] ?>">
          <div class="card-body">
            <p class="card-text"><?php echo $produit['descriptif'] ?></p>
            <a href="#">
              <div class="text-white p-2" style="background-color: #5a94a1;">
                <h6 class="card-title"><?php echo $produit['nomProduit'] ?></h6>
              </div>
            </a>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary"><?php echo $produit['prixUnitaire'] ?>€</small>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>


<div class="d-grid gap-2 mx-auto col-2 d-block mt-5">
  <a class="btn btn-dark m-4 shadow-lg" href="#" role="button"><i class="bi bi-cart"></i> Mon Panier </a>
</div>



