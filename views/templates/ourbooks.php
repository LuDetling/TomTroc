<?php

?>

<section class="our-books">
    <div class="title-search">
        <h1>Nos livres à l’échange</h1>
        <form action="index.php?action=showBooks" method="POST">
            <input type="text" placeholder="Rechercher un livre" id="search" name="search">
        </form>
    </div>
    <div class="content-cards">
        <?php foreach ($books as $book) : ?>
            <a href='index.php?action=showBook&id=<?= $book["id"] ?>' class='card-book'>
                <img src='./public/upload/books/<?= $book["img"] ?>' alt='image du livre <?= $book["title"] ?>'>
                <div class='text-book'>
                    <h3><?= $book["title"] ?></h3>
                    <div class='book-author'><?= $book["author"] ?></div>
                    <div class='book-seller'>vendu par : <?= $book["pseudo"] ?></div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>