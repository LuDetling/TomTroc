<?php
?>

<section class="background-profil-public">
    <div class="content-profil-public">
        <div class="left-profil-public">
            <img src="upload/avatar/<?= $profilPublic[0]["avatar"] ?>" alt="">
            <div class="trait"></div>
            <div><?= $profilPublic[0]["pseudo"] ?></div>
            <div><?= Utils::convertDateToFrenchFormat(new DateTime($profilPublic[0]["date_creation"])) ?></div>
            <div class="count-books">
                <div>BIBLIOTHEQUE</div>
                <div><img src="images/book.svg" alt="icone de livre"> <?= count($profilPublic) ?> livres</div>
            </div>
            <button class="button button-border-green">Écrire un message</button>
        </div>
        <div class="right-profil-public">
            <div class="my-books">
                <table>
                    <thead>
                        <tr>
                            <th>PHOTO</th>
                            <th>TITRE</th>
                            <th>AUTEUR</th>
                            <th>DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($profilPublic as $book) {
                        ?>
                            <tr>
                                <a href="index.php?action=showBook&id=<?= $book["id"] ?>">
                                    <td>
                                        <img src="upload/books/<?= $book["img"] ?>" alt="image du livre <?= $book["title"] ?>">
                                    </td>
                                    <td class="title">
                                        <?= $book["title"] ?>
                                    </td>
                                    <td>
                                        <?= $book["author"] ?>
                                    </td>
                                    <td>
                                        <p class='description'>
                                            <?= $book["description"] ?>
                                        </p>
                                    </td>
                                </a>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>