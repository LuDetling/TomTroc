<section class="log-image">
    <div class="log-content">
        <div class="log">
            <h1>Connexion</h1>
            <form action="index.php?action=connexion" method="POST">
                <div>
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email">
                    <?= !empty($_SESSION["error"]["email"]) ? "<p>" . $_SESSION["error"]["email"] . "</p>" : "" ?>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <?= !empty($_SESSION["error"]["password"]) ? "<p>" . $_SESSION["error"]["password"] . "</p>" : "" ?>
                </div>
                <input type="submit" class="button button-green" value="Se connecter">
            </form>
            <div class="connexion">Pas de compte ? <a href="index.php?action=inscription">Inscrivez-vous</a></div>
        </div>
    </div>
    <img src="/tomtroc/images/marialaura-gionfriddo-50G3FvyQxX0-unsplash.png" alt="image inscription">
</section>