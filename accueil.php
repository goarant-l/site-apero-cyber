<?php require "./info.BDD.php"; ?>

<!-- Message de bienvenue après connexion client -->
<?php if (isset($_GET['info'])): ?>
  <div class="alerte alerte-success" style="margin:1rem auto;max-width:600px;">
    <?php echo htmlspecialchars($_GET['info']); ?>
  </div>
<?php endif; ?>

<!-- Hero -->
<div class="hero">
  <h1>Apér'o</h1>
  <p>Bières artisanales &amp; produits du terroir — l'art de l'apéritif à la française</p>
</div>

<!-- Grille produits -->
<div class="products-section">
  <h2 style="border-bottom:3px solid #F4A424;padding-bottom:.4rem;">Nos produits</h2>

  <?php
  $requeteSQL = "SELECT numProduit, nomProduit, descriptif, prixUnitaire, nomImage FROM produit";
  $reponse = $pdo->query($requeteSQL);
  $liste_produit = $reponse->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div class="products-grid">
    <?php foreach ($liste_produit as $produit): ?>
      <div class="card-produit">
        <img src="/images/<?php echo htmlspecialchars($produit['nomImage']); ?>"
             alt="<?php echo htmlspecialchars($produit['nomProduit']); ?>">
        <div class="card-body">
          <h3 class="card-title"><?php echo htmlspecialchars($produit['nomProduit']); ?></h3>
          <p class="card-desc"><?php echo htmlspecialchars($produit['descriptif']); ?></p>
        </div>
        <div class="card-footer">
          <?php echo number_format($produit['prixUnitaire'], 2, ',', ' '); ?> €
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Panier -->
<div class="panier-wrapper">
  <a href="#" class="btn-apero">
    <i class="bi bi-cart3"></i>&nbsp; Mon panier
  </a>
</div>
