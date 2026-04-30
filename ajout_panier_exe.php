<?php
session_save_path(__DIR__ . '/tmp');
session_start();

$quantiteParam = $_POST['quantite'] ?? '';
$idProduitParam = $_POST['idProduit'] ?? '';

// Vérifier que le client est bien connecté avant d'ajouter au panier
if (!isset($_SESSION['client_user'])) {
    header("location:index.php?page=connexion_client&info=" . urlencode("Connexion requise avant de commander."));
    exit();
}

require "./info.BDD.php";

try {
    // ÉTAPE OPTIONNELLE : Récupérer le vrai ID du client grâce à son pseudo
    // Ajustez 'idClient' si votre colonne s'appelle différemment dans la table 'client'
    $stmtClient = $pdo->prepare("SELECT idClient FROM client WHERE pseudo = :pseudo");
    $stmtClient->execute(['pseudo' => $_SESSION['client_user']]);
    $clientInfo = $stmtClient->fetch();

    // Fallback : Si on ne trouve pas l'id, on utilise le pseudo.
    $idClient = $clientInfo ? $clientInfo[0] : $_SESSION['client_user'];

    // 1. Chercher si le client a déjà une commande 'En cours' (ENC)
    $reqRecherche = "SELECT noCommande FROM commande WHERE idClient = :idClient AND idStatut = 'ENC'";
    $stmtRecherche = $pdo->prepare($reqRecherche);
    $stmtRecherche->execute(['idClient' => $idClient]);
    $commandeEnCours = $stmtRecherche->fetch(PDO::FETCH_ASSOC);

    if (!$commandeEnCours) {
        // 2. Si aucune commande n'est trouvée, on en crée une nouvelle avec le statut 'ENC'
        $reqInsertCmd = "INSERT INTO commande (idClient, idStatut, dateCommande) VALUES (:idClient, 'ENC', NOW())";
        $stmtInsertCmd = $pdo->prepare($reqInsertCmd);
        $stmtInsertCmd->execute(['idClient' => $idClient]);

        // On récupère le numéro de la nouvelle commande auto-incrémentée
        $noCommande = $pdo->lastInsertId();
    } else {
        $noCommande = $commandeEnCours['noCommande'];
    }

    // 3. Ajouter l'article dans la table 'contenir'
    $reqInsertContenir = "INSERT INTO contenir (noCommande, numProduit, quantite) VALUES (:noCommande, :numProduit, :quantite)";
    $stmtInsertContenir = $pdo->prepare($reqInsertContenir);
    $stmtInsertContenir->execute([
        'noCommande' => $noCommande,
        'numProduit' => $idProduitParam,
        'quantite' => $quantiteParam
    ]);

    // Redirection vers la fiche produit avec un message de succès
    header("location:index.php?page=detail_produit&idProduit=$idProduitParam&info=" . urlencode("L'article a bien été ajouté à votre panier !"));
    exit();

} catch (PDOException $e) {
    // Si la commande échoue (exemple : le client a déjà ajouté ce produit et la BDD bloque un doublon, il faudrait faire un UPDATE)
    header("location:index.php?page=detail_produit&idProduit=$idProduitParam&erreur=" . urlencode("Une erreur est survenue lors de l'ajout au panier."));
    exit();
}
?>