<?php
?>
<section class="background-page-edit-book">
    <div class="top-edit-book">
        <a href="<?= !isset($_SERVER['HTTP_REFERER']) ? "index.php?action=home" : $_SERVER['HTTP_REFERER'] ?>" class="breadcrumb">retour</a>
        <h1>Modifier les informations</h1>
    </div>
    <div class="page-edit-book">

        <?php if (isset($_POST["description"]) && isset($_SESSION["error"])) { ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php }; ?>

        <form class="content-edit-book" method="POST" enctype="multipart/form-data">
            <div class="left-edit-book">
                <label>Photo</label>
                <div class="edit-img">
                    <input type="file" id="img" name="img" accept=".jpeg, .jpg, .png">
                    <label for="img" class="edit-image">Ajouter une photo</label>
                </div>
                <?= isset($_SESSION["errorImg"]) ? "<p>" . $_SESSION["errorImg"] . "</p>" : null ?>
            </div>
            <div class="right-edit-book">
                <div class="edit-title">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" placeholder="Titre du livre">
                </div>
                <div class="edit-author">
                    <label for="author">Auteur</label>
                    <input type="text" id="author" name="author" placeholder="Nom de l'auteur">
                </div>
                <div class="edit-description">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Description du livre"></textarea>
                </div>
                <div class="edit-disponibility">
                    <label for="disponibility">Disponibilité</label>
                    <select id="disponibility" name="disponibility">
                        <option value="1">Disponible</option>
                        <option value="0">Indisponbible</option>
                    </select>
                </div>
                <button type="submit" class="button button-green">Valider</button>
            </div>
        </form>
    </div>

</section>