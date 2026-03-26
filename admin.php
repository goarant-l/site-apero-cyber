<?php
if (isset($_SESSION['user'])) {
    $connecte = true;
} else {
    $connecte = false;
    header("location:index.php?page=connexion&&erreur=Il faut être authentifié pour accéder à la partie administration");
    exit();
}

require "./info.BDD.php";


// Requête pour vérifier si le couple login/mdp est bon
$requeteSQL = "SELECT codeUser, login, mdp, nom, prenom, role FROM users";
// Exécution de la requête
$reponse = $pdo->query($requeteSQL);
$liste_utilisateurs = $reponse->fetchall(PDO::FETCH_ASSOC);
?>
<div class="container text-center m-2">
    <h2>Administration <i class="bi bi-person-fill-gear"></i></h2>
    <div class="alert alert-success w-50 mx-auto">
        <h4>Bienvenue <?php echo $_SESSION['user'] ?> - Rôle : <?php echo
                $_SESSION['roleUser'] ?></h4>
    </div>
    <table class="table table-striped mt-4 w-75 mx-auto">
        <thead class="table-dark">
            <tr class="text-center">
                <th>Login</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>


            <!-- Partie dynamique du tableau -->
            <?php foreach ($liste_utilisateurs as $user) {
                ?>
                <tr>
                    <td><?php echo $user['login'] ?></td>
                    <td><?php echo $user['nom'] ?></td>
                    <td><?php echo $user['prenom'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_SESSION['user'])) {
    $connecte = true;
} else {
    $connecte = false;
    header("location:index.php?page=connexion&&erreur=Il faut être authentifié pour accéder à la partie administration");
}
?>

