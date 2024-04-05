<?php
?>
<section class="breadcrumb-detail-book">
    <div class="breadcrumb">
        <a href="index.php?action=showBooks">Nos livres</a>
        <div> <?= $book->getTitle() ?></div>
    </div>
    <div class="detail-book">
        <img src="./public/upload/books/<?= $book->getImg() ?>" alt="image du livre <?= $book->getTitle() ?>">
        <div class="content-book">
            <h1><?= $book->getTitle() ?></h1>
            <div class="author">par <?= $book->getAuthor() ?></div>
            <div class="title-part">DESCRIPTION</div>
            <p class="description"><?= $book->getDescription() ?></p>
            <div class="title-part">Propriétaire</div>
            <a href="index.php?action=<?= isset($sessionUser) && $sessionUser->getId() != $user->getId() ? "profilPublic&userId=" . $user->getId() : "profil" ?>" class="content-owner">
                <img src="./public/upload/avatar/<?= $user->getAvatar() ?>" alt="image du propriétaire">
                <div><?= $user->getPseudo() ?></div>
            </a>
            <?php
            if (isset($sessionUser) && $sessionUser->getId() != $user->getId()) {
            ?>
                <a href="index.php?action=messagerie&idUserTo=<?= $user->getId() ?>" class="button button-green">Envoyer un message</a>
            <?php
            } else if (!isset($sessionUser)) {
            ?>
                <a href="index.php?action=connexion">Se connecter pour envoyer un message</a>
            <?php
            } else {
            ?>
                <a href="index.php?action=editBook&id=<?= $book->getId() ?>" class="button button-green">Modifier</a>
            <?php
            }
            ?>
        </div>
    </div>
</section>