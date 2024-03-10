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
            echo "<a href='index.php?action=showBook&id=" . $book["id"] . "' class='card-book'>";
            echo "  <img src='upload/books/" . $book["img"] . "' alt='image du livre " . $book["title"] . " '>";
            echo "  <div class='text-book'>";
            echo "      <h3>" . $book["title"] . "</h3>";
            echo "      <div class='book-author'>" . $book["author"] . "</div>";
            echo "      <div class='book-seller'>vendu par : " . $book["pseudo"] . "</div>";
            echo "  </div>";
            echo "</a>";
        }
        ?>
    </div>
</section>