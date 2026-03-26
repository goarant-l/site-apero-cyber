<?php
$pages_autorisees = [
   'accueil',
   'apropos',
   'contact',
   'connexion',            // Admin : formulaire login
   'connexion_exe',        // Admin : traitement login
   'admin',                // Admin : tableau de bord
   'deconnexion',          // Déconnexion (admin + client)
   'connexion_choix',      // Client : choix connexion / inscription
   'connexion_client',     // Client : formulaire login
   'connexion_client_exe', // Client : traitement login
   'inscription_client',   // Client : formulaire inscription
   'inscription_client_exe'// Client : traitement inscription
];

$page = isset($_GET['page']) && in_array($_GET['page'], $pages_autorisees)
    ? $_GET['page']
    : 'accueil';

$fichier = $page . '.php';

include('./header.php');

if (file_exists($fichier)) {
    include($fichier);
} else {
    include('./accueil.php');
}

include('./footer.php');
?>
