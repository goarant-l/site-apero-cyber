<?php
session_save_path(__DIR__ . '/tmp');
session_start();

$login = $_POST['login'] ?? '';
$mdp = $_POST['mdp'] ?? '';

require "./info.BDD.php";

$requeteSQL = "SELECT login, mdp, nom, prenom, role FROM users WHERE login = '$login' AND mdp = '$mdp'";
$reponse = $pdo->query($requeteSQL);
$user = $reponse->fetch(PDO::FETCH_ASSOC);

if ($user == false) {
    header("location:index.php?page=connexion&erreur=" . urlencode("Problème de connexion"));
    exit();
} else {
    $_SESSION['user'] = $login;
    $_SESSION['roleUser'] = $user['role'];
    header('location:index.php?page=admin');
    exit();
}
?>

<?php
session_save_path(__DIR__ . '/tmp'); // inutile sur un serveur Apache. 
// Nécessite la création du dossier “tmp”
session_start();


// Requêtes pour l’authentification

if ($user == false) {
    // Connexion KO : à implémenter
} else {
    // Connexion OK : à implémenter
    $_SESSION['user'] = $loginParam;
}
