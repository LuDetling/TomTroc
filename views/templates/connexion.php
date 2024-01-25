<?php
if (isset($_SESSION["error"])) {
    var_dump($_SESSION["error"]);
}
if (isset($_SESSION["user"])) {
    var_dump($_SESSION["user"]);
}
?>

<section class="log-image">
    <div class="log-content">
        <div class="log">
            <h1>Connexion</h1>
            <form action="index.php?action=connexion" method="POST">
                <div>
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email">
                    <?= !empty($_POST["email"]) ? "" : "<p>Adresse email non valide</p>" ?>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <?= !empty($_POST["password"]) ? "" : "<p>Mot de passe non valide</p>" ?>
                </div>
                <input type="submit" class="button button-green" value="Se connecter">
            </form>
            <div class="connexion">Pas de compte ? <a href="index.php?action=inscription">Inscrivez-vous</a></div>
        </div>
    </div>
    <img src="/tomtroc/images/marialaura-gionfriddo-50G3FvyQxX0-unsplash 1.png" alt="image inscription">
</section>