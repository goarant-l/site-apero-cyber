<div class="container text-center pt-3 mt-6 w-50">
    <h2>CONNEXION à la partie "UTILISATEUR"</h2>
    <form action="connexion_exe.php" method="POST">
        <label for="login">Login :</label><br>
        <input type="text" id="login" name="login"><br><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="mdp" name="mdp"><br>
        <div id="messageErreur" class="erreur"></div><br>
        <button type="submit" class="btn btn-primary">Se connecter</button><br>
    </form>
</div>

<?php
if (isset($_GET["erreur"])) {
    $erreur = $_GET["erreur"];
    ?>
    <div class="mt-2 p-3 w-75 mx-auto alert alert-danger" role="alert">
        <?php echo $erreur ?>
    </div>
    <?php
}
if (isset($_GET["info"])) {
    $info = $_GET["info"];
    ?>
    <div class="mt-2 p-3 w-75 mx-auto alert alert-success" role="alert">
        <h2><?php echo $info ?></h2>
    </div>
    <?php
}
?>