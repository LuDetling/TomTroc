<?php
$user = unserialize($_SESSION["user"]);
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
                    <form action="index.php?action=profil">
                        <div>
                            <label for="email">Adresse email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div>
                            <label for="password">Mot de passe</label>
                            <input type="text" name="password" id="password">
                        </div>
                        <div>
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo">
                        </div>
                        <button type="submit" class="button-border-green button">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="my-books"></div>
    </div>
</section>