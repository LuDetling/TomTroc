<?php

?>

<section class="our-books">
    <div class="title-search">
        <h1>Nos livres à l’échange</h1>
        <form action="">
            <input type="text" placeholder="Rechercher un livre">
        </form>
    </div>
    <div class="content-cards">
        <?php
        // ajouter les bons liens 
        foreach ($books as $book) {
        ?>
            <a href='index.php?action=showBook&id=<?= $book["id"] ?>' class='card-book'>
                <img src='upload/books/<?= $book["img"] ?>' alt='image du livre <?= $book["title"] ?>'>
                <?= !$book["disponibility"] ? "<div class='disponibility'>Non dispo.</div>" : null ?>
                <div class='text-book'>
                    <h3><?= $book["title"] ?></h3>
                    <div class='book-author'><?= $book["author"] ?></div>
                    <div class='book-seller'>vendu par : <?= $book["pseudo"] ?></div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</section>