<div class="container text-center pt-5 mt-5 w-50">
    <h2 class="mb-4">Espace Client <i class="bi bi-person-circle"></i></h2>

    <div class="card shadow-lg p-4 mb-5">

        <form action="connexion_client_exe.php" method="POST">

            <div class="mb-3 text-start">
                <label for="pseudo" class="form-label fw-bold">Identifiant (Pseudo) :</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>

            <div class="mb-4 text-start">
                <label for="mdp" class="form-label fw-bold">Mot de passe :</label>
                <input type="password" class="form-control" id="mdp" name="mdp" required>
            </div>

            <button type="submit" class="btn btn-dark w-100 shadow-lg mb-3">Se connecter</button>
        </form>

        <div class="mt-2">
            <small>Pas encore de compte ? <a href="index.php?page=inscription_client"
                    class="text-decoration-none">S'inscrire ici</a>.</small>
        </div>
    </div>
</div>

<?php
if (isset($_GET["erreur"])) {
    $erreur = htmlspecialchars($_GET["erreur"]);
    ?>
    <div class="mt-2 p-3 w-50 mx-auto alert alert-danger shadow text-center" role="alert">
        <?php echo $erreur; ?>
    </div>
    <?php
}

if (isset($_GET["info"])) {
    $info = htmlspecialchars($_GET["info"]);
    ?>
    <div class="mt-2 p-3 w-50 mx-auto alert alert-success shadow text-center" role="alert">
        <strong><?php echo $info; ?></strong>
    </div>
    <?php
}
?>