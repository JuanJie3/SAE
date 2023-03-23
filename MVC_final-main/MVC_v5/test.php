<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Récupération des données du formulaire
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Vérification des identifiants avec la base de données
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        // Utilisateur valide, démarrage de la session
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        // Utilisateur non valide, affichage d'un message d'erreur
        $error = "Identifiants incorrects";
    }
}

if (isset($_SESSION['username'])) {
    // Utilisateur connecté, redirection vers la page d'accueil
    header('Location: https://cas.univ-paris13.fr/cas/login?service=https%3A%2F%2Fent.univ-paris13.fr');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <?php if (isset($error)) { echo $error; } ?>
    <form action="login.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
