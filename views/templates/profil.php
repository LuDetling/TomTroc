<?php
?>
<section class="content-profil-background">
    <div class="content-profil">

        <h1>Mon compte</h1>
        <div class="top-content-profil">

            <form action="index.php?action=profil" method="POST" enctype="multipart/form-data">
                <div class="profil">
                    <img src="upload/avatar/<?= $user->avatar ? $user->avatar : null ?>" alt="photo de profile">
                    <input type="file" id="avatar" value="modifier" name="avatar" accept="image/png, image/jpeg">
                    <label for="avatar" class="avatar">modifier</label>
                    <div class="trait"></div>
                    <h2><?= $user->pseudo ?></h2>
                    <div class="date-account">Membre depuis <?= Utils::convertDateToFrenchFormat($user->dateCreation) ?></div>
                    <h3>BIBLIOTHEQUE</h3>
                    <div class="count-books"><?= count($books) ?> livres</div>
                </div>
                <div class="content-edit-profil">
                    <div class="edit-profil">
                        <h3>Vos informations personnelles</h3>
                        <div>
                            <label for="email">Adresse email</label>
                            <input type="text" name="email" id="email" value="<?= $user->email ?>">
                        </div>
                        <div>
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div>
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" value="<?= $user->pseudo ?>">
                        </div>
                        <?= isset($_SESSION["error"]) ? "<p>" . $_SESSION["error"] . "</p>" : null ?>
                        <button type="submit" class="button-border-green button">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (count($books) > 0) { ?>
            <div class="my-books">
                <table>
                    <thead>
                        <tr>
                            <th>PHOTO</th>
                            <th>TITRE</th>
                            <th>AUTEUR</th>
                            <th>DESCRIPTION</th>
                            <th>DISPONIBILITE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($books as $book) {
                            echo "<tr>";
                            echo "  <td><img src=upload/books/" . $book->getImg() . " alt='Image du livre " . $book->getTitle() . "'></td>";
                            echo "  <td class='title'>" . $book->getTitle() . "</td>";
                            echo "  <td class='author'>" . $book->getAuthor() . "</td>";
                            echo "  <td><p class='description'> " . $book->getDescription() . "</p></td>";
                            if ($book->getDisponibility()) {
                                echo "  <td><div class='disponible'>Disponible</div></td>";
                            } else {
                                echo "  <td><div class='indisponible'>non dispo.</div></td>";
                            }
                            echo "  <td class='edit-delete'>";
                            echo "      <a href='index.php?action=editBook&id=" . $book->getId() . "' class='edit'>Éditer</a>";
                            echo "      <a href='index.php?action=deleteBook&id=" . $book->getId() . "' class='delete'>Supprimer</a>";
                            echo "  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</section>