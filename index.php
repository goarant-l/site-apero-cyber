<?php
$pages_autorisees = [
   'accueil',
   'contact',
   'connexion',        // Administration
   'admin',            // Administration
   'deconnexion',
   'connexion_choix',  
   'connexion_client', 
   'inscription_client'
];

if (isset($_GET['page'])) {
   $page = $_GET['page'];
} else {
   $page = 'accueil';
}

if (!in_array($page, $pages_autorisees)) {
   $page = 'accueil';
}

$fichier = $page . '.php';

include('./header.php');

if (file_exists($fichier)) {
   include($fichier);
} else {
   include('./accueil.php');
}

include('./footer.php');
?>