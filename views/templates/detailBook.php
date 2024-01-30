<section class="breadcrumb-detail-book">
    <div class="breadcrumb">
        <a href="index.php?action=showBooks">Nos livres</a>
        <div> <?= $book->getTitle() ?></div>
    </div>
    <div class="detail-book">
        <img src="<?= $book->getImg() ?>" alt="image du livre <?= $book->getTitle() ?>">
        <div class="content-book">
            <h1><?= $book->getTitle() ?></h1>
            <div class="author">par <?= $book->getAuthor() ?></div>
            <div class="title-part">DESCRIPTION</div>
            <p class="description"><?= $book->getDescription() ?></p>
            <div class="title-part">Propriétaire</div>
            <div class="content-owner">
                <img src="<?= $book->getImg() ?>" alt="image du propriétaire">
                <div>$user->username</div>
            </div>
            <a href="#" class="button button-green">Envoyer un message</a>
        </div>
    </div>
</section>