<section class="log-image">
    <div class="log-content">
        <div class="log">
            <h1>Inscription</h1>
            <form action="index.php?action=inscription" method="POST">
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo">
                    <?php
                    if (!empty($_SESSION["error"]["pseudo"])) {
                        echo "<p>";
                        echo $_SESSION["error"]["pseudo"];
                        echo "</p>";
                    }
                    ?>
                </div>
                <div>
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email">
                    <?php
                    if (!empty($_SESSION["error"]["email"])) {
                        echo "<p>";
                        echo $_SESSION["error"]["email"];
                        echo "</p>";
                    }
                    ?>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <?php
                    if (!empty($_SESSION["error"]["password"])) {
                        echo "<p>";
                        echo $_SESSION["error"]["password"];
                        echo "</p>";
                    }
                    ?>
                </div>
                <input type="submit" class="button button-green" value="S'inscrire">
            </form>
            <div class="connexion">Déjà inscrit ? <a href="index.php?action=connexion">Connectez-vous</a></div>
        </div>
    </div>
    <img src="/tomtroc/images/marialaura-gionfriddo-50G3FvyQxX0-unsplash.png" alt="image inscription">
</section>

<?php
?>