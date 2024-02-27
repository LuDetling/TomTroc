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
            echo "<a href='index.php?action=showBook&id=" . $book->getId() . "' class='card-book'>";
            echo "  <img src='upload/books/" . $book->getImg() . "' alt='image du livre " . $book->getTitle() . " '>";
            echo "  <div class='text-book'>";
            echo "      <h3>" . $book->getTitle() . "</h3>";
            echo "      <div class='book-author'>" . $book->getAuthor() . "</div>";
            echo "      <div class='book-seller'>vendu par : ???</div>";
            echo "  </div>";
            echo "</a>";
        }
        ?>
    </div>
</section>