<?php
?>
<section class="content-profil-background">
    <div class="content-profil">

        <h1>Mon compte</h1>
        <div class="top-content-profil">

            <div class="profil">
                <img src="images/tristana.png" alt="photo de profile">
                <input type="file" id="avatar" value="modifier" name="avatar" accept="image/png, image/jpeg">
                <div class="trait"></div>
                <h2><?= $user->pseudo ?></h2>
                <div class="date-account">Membre depuis 1 an</div>
                <h3>BIBLIOTHEQUE</h3>
                <div class="count-books">4 livres</div>
            </div>
            <div class="content-edit-profil">
                <div class="edit-profil">
                    <h3>Vos informations personnelles</h3>
                    <form action="index.php?action=profil" method="POST">
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
                        <?= isset($_SESSION["error"]) ? $_SESSION["error"] : null ?>
                        <button type="submit" class="button-border-green button">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
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
                    <tr>
                        <td><img src="images/tristana.png" alt="photo du livre"></td>
                        <td>Tristana book</td>
                        <td>Riot</td>
                        <td>Livre sur le personnage tristana</td>
                        <td class="disponible">Disponible</td>
                        <td class="edit-delete">
                            <a href="#" class="edit">editer</a>
                            <a href="#" class="delete">supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="images/tristana.png" alt="photo du livre"></td>
                        <td>Tristana book</td>
                        <td>Riot</td>
                        <td>Livre sur le personnage tristana</td>
                        <td class="disponible">Disponible</td>
                        <td class="edit-delete">
                            <a href="#" class="edit">editer</a>
                            <a href="#" class="delete">supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>