<section class="top-home">
    <div class="left-top-home">
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
        <button class="button button-green">Découvrir</button>
    </div>
    <div class="right-top-home">
        <img src="/tomtroc/images/hamza-nouasria-KXrvPthkmYQ-unsplash 1.png" alt="Photo d'Hamza Nousaria">
        <div>Hamza</div>
    </div>
</section>

<section class="last-book">
    <h2>Les derniers livres ajoutés</h2>
    <div class="content-cards content-last-cards">
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
    <a href="index.php?action=showBooks" class="button button-green">Voir tous les livres</a>
</section>

<section class="how-it-works">
    <h2>Comment ça marche ?</h2>
    <p>Échanger des livres avec TomTroc c’est simple et </br> amusant ! Suivez ces étapes pour commencer :</p>
    <div class="card-works">
        <div>Inscrivez-vous </br> gratuitement sur </br> notre plateforme.</div>
        <div>Ajoutez les livres que vous </br> souhaitez échanger à </br> votre profil.</div>
        <div>Parcourez les livres </br> disponibles chez d'autres </br> membres.</div>
        <div>Proposez un échange et </br> discutez avec d'autres </br> passionnés de lecture.</div>
    </div>
    <a href="index.php?action=showBooks" class="button button-border-green">Voir tous les livres</a>
</section>

<img src="/tomtroc/images/clay-banks-4uH8rdyEbH4-unsplash 1.png" alt="" class="baniere-home">

<section class="our-values">
    <div class="content-our-values">
        <h2>Nos valeurs</h2>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
        <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
        <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
        <div class="team-heart">
            <div>L’équipe Tom Troc</div>
            <img src="/tomtroc/images/green-heart.svg" alt="coeur vert">
        </div>
    </div>
</section>