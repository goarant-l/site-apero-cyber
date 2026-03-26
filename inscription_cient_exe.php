<?php
session_save_path(__DIR__ . '/tmp');
session_start();

//Récupération des données envoyées par le formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$login = $_POST['login'] ?? '';
$mdp = $_POST['mdp'] ?? '';


//Connexion à la base de données
require "./info.BDD.php";

//Vérifier si le login (identifiant) est déjà pris
$verifSQL = "SELECT login FROM users WHERE login = :login";
$reqVerif = $pdo->prepare($verifSQL);
$reqVerif->execute(['login' => $login]);
$utilisateurExistant = $reqVerif->fetch();

if ($utilisateurExistant) {
    header("location:index.php?page=inscription_client&erreur=" . urlencode("Cet identifiant est déjà utilisé, veuillez en choisir un autre."));
    exit();
}

$insertSQL = "INSERT INTO users (nom, prenom, pseudo, mdp) VALUES (:nom, :prenom, :pseudo, :mdp)";
$reqInsert = $pdo->prepare($insertSQL);

$succes = $reqInsert->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'pseudo' => $pseudo,
    'mdp' => $mdp
]);

// Redirection
if ($succes) {
    // Inscription réussie : on l'envoie vers la page de connexion avec un message vert
    $message = "Votre compte a bien été créé ! Vous pouvez maintenant vous connecter.";
    header("location:index.php?page=connexion_client&info=" . urlencode($message));
    exit();
} else {
    // Erreur technique de la base de données
    header("location:index.php?page=inscription_client&erreur=" . urlencode("Une erreur est survenue lors de l'inscription."));
    exit();
}
?>