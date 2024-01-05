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
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="left-nav">
                <a href="/tomtroc"><img src="/tomtroc/images/logo.svg" alt="Logo de Tom troc" width="155" height="51"></a>
                <a href="/tomtroc">Accueil</a>
                <a href="/tomtroc/ourbooks">Nos livres à l'échange</a>
            </div>
            <div class="right-nav">
                <a href="/tomtroc/messagerie">Messagerie</a>
                <a href="/tomtroc/account">Mon compte</a>
                <a href="/tomtroc/connexion">Connexion</a>
            </div>
        </nav>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <a href="/tomtroc">Politique de confidentialité</a>
        <a href="/tomtroc">Mentions légales</a>
        <a href="/tomtroc">Tom Troc©</a>
        <a href="/tomtroc"><img src="/tomtroc/images/logo-footer.svg" alt="Logo Tom troc footer"></a>
    </footer>

</body>

</html>