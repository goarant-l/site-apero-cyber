<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apér'o — L'élégance sans la prétention</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="script.js" defer></script>
  <style>
    /* Petit ajustement pour que le logo soit bien dimensionné */
    .brand-logo {
      height: 50px;
      /* À ajuster selon tes préférences */
      width: auto;
      vertical-align: middle;
      margin-right: 10px;
    }

    .brand {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>

<?php
session_save_path(__DIR__ . '/tmp');
session_start();

// Vérifie si un admin est connecté
$connecte = isset($_SESSION['user']);
// Vérifie si un client est connecté
$clientConnecte = isset($_SESSION['client_user']);

// Page active pour surligner le lien nav
$pageActive = $_GET['page'] ?? 'accueil';
?>

<body>

  <nav class="navbar-apero">
    <!-- Intégration du logo ici -->
    <a href="index.php?page=accueil" class="brand">
      <img src="./image/logo.png" alt="Logo Apér'o" class="brand-logo">
      <span>Apér'o</span>
    </a>

    <div class="nav-links">
      <a href="index.php?page=accueil">
        <button class="btn-nav <?= $pageActive === 'accueil' ? 'active' : '' ?>">
          <i class="bi bi-house"></i> Accueil
        </button>
      </a>
      <a href="index.php?page=apropos">
        <button class="btn-nav <?= $pageActive === 'apropos' ? 'active' : '' ?>">
          <i class="bi bi-info-circle"></i> À propos
        </button>
      </a>
      <a href="index.php?page=contact">
        <button class="btn-nav <?= $pageActive === 'contact' ? 'active' : '' ?>">
          <i class="bi bi-envelope"></i> Contact
        </button>
      </a>

      <?php if ($connecte): ?>
        <a href="index.php?page=admin">
          <button class="btn-nav <?= $pageActive === 'admin' ? 'active' : '' ?>">
            <i class="bi bi-gear"></i> Administration
          </button>
        </a>
      <?php endif; ?>

      <!-- Le bouton du panier est désormais toujours visible -->
      <a href="index.php?page=details_panier">
        <button class="btn-nav <?= $pageActive === 'details_panier' ? 'active' : '' ?>">
          <i class="bi bi-cart3"></i> Mon panier
        </button>
      </a>

      <?php if ($clientConnecte): ?>
        <a href="index.php?page=historique_commande">
          <button class="btn-nav <?= $pageActive === 'historique_commande' ? 'active' : '' ?>">
            <i class="bi bi-box-seam"></i> Mes commandes
          </button>
        </a>
      <?php endif; ?>

      <?php if ($connecte || $clientConnecte): ?>
        <form action="deconnexion.php" method="post" style="margin:0;">
          <button type="submit" class="btn-nav">
            <i class="bi bi-box-arrow-right"></i> Déconnexion (<?php echo $_SESSION["client_prenom"] ?>)
          </button>
        </form>
      <?php else: ?>
        <a href="index.php?page=connexion_choix">
          <button class="btn-nav">
            <i class="bi bi-person"></i> Connexion
          </button>
        </a>
      <?php endif; ?>
    </div>
  </nav>