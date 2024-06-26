<?php

/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.  
 * 
 * Les variables qui doivent impérativement être définie sont : 
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page. 
 */

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom troc</title>
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="left-nav">
                <a href="index.php?action=home"><img src="./public/images/logo.svg" alt="Logo de Tom troc" width="155" height="51"></a>
                <a href="index.php?action=home" class="<?= empty($_GET) || (isset($_GET["action"]) && !empty($_GET["action"] == "home")) ? 'active' : "" ?>">Accueil</a>
                <a href="index.php?action=showBooks" class="<?= isset($_GET["action"]) && !empty($_GET["action"] == "showBooks" || $_GET["action"] == "showBook") ? 'active' : "" ?>">Nos livres à l'échange</a>
            </div>
            <?php if (isset($_SESSION["user"])) { ?>
                <a href='index.php?action=addBook' class="<?= isset($_GET["action"]) && !empty($_GET["action"] == "addBook") ? 'active' : "" ?> add-book">+</a>
            <?php } ?>
            <div class="right-nav">
                <?php if (isset($_SESSION["user"])) {
                ?>
                    <a href="index.php?action=messagerie" class="<?= isset($_GET["action"]) && !empty($_GET["action"] == "messagerie") ? 'active' : "" ?>">Messagerie</a>
                    <a href="index.php?action=profil" class="<?= isset($_GET["action"]) && !empty($_GET["action"] == "account") ? 'active' : "" ?>">Mon compte</a>
                    <a href='index.php?action=logout'>Déconnexion</a>
                <?php
                } else {
                ?>
                    <a href="index.php?action=connexion" class="<?= isset($_GET["action"]) && !empty($_GET["action"] == "connexion") ? 'active' : "" ?>">Connexion</a>
                    <a href="index.php?action=inscription" class="<?= isset($_GET["action"]) && !empty($_GET["action"] == "inscription") ? 'active' : "" ?>">Inscription</a>
                <?php
                }
                ?>
            </div>
        </nav>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <a href="index.php">Politique de confidentialité</a>
        <a href="index.php">Mentions légales</a>
        <a href="index.php">Tom Troc©</a>
        <a href="index.php"><img src="./public/images/logo-footer.svg" alt="Logo Tom troc footer"></a>
    </footer>

</body>

</html>