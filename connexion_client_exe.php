<?php
session_save_path(__DIR__ . '/tmp');
session_start();

$login = $_POST['login'] ?? '';
$mdp = $_POST['mdp'] ?? '';

// 2. Connexion à la base de données
require "./info.BDD.php";




$requeteSQL = "SELECT pseudo, mdp, nom, prenom FROM client WHERE pseudo = '$login' AND mdp = '$mdp' ";
$reponse = $pdo->query($requeteSQL);
$client = $reponse->fetch(PDO::FETCH_ASSOC);

if ($client == false) {
    $message = "Identifiant ou mot de passe incorrect.";
    header("location:index.php?page=connexion_client&erreur=" . urlencode($message));
    exit(); 
    
} else {
    $_SESSION['client_user'] = $client['pseudo'];
    $_SESSION['client_nom'] = $client['nom'];
    $_SESSION['client_prenom'] = $client['prenom'];
    


    $message_bienvenue = "Ravi de vous revoir, " . $client['prenom'] . " !";
    header('location:index.php?page=accueil&info=' . urlencode($message_bienvenue));
    exit(); 
}
?>