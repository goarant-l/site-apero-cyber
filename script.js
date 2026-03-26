function verifierSaisie() {
    let login = document.getElementById("login").value;
    let password = document.getElementById("password").value;
    let message = document.getElementById("messageErreur");

    if (login.length < 7) {
        message.textContent = "Le login doit contenir au moins 7 caractères.";
    } else if (password === "") {
        message.textContent = "Le mot de passe ne peut pas être vide.";
    } else {
        alert("Connexion réussie !");
        
        location.href = "index.php?page=admin";
    }
} 