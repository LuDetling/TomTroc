<?php
?>
<section class="background-page-edit-book">
    <div class="top-edit-book">
        <a href="<?= !isset($_SERVER['HTTP_REFERER']) ? "index.php?action=home" : $_SERVER['HTTP_REFERER'] ?>" class="breadcrumb">retour</a>
        <h1>Modifier les informations</h1>
    </div>
    <div class="page-edit-book">
        <form class="content-edit-book" method="POST" enctype="multipart/form-data">
            <div class="left-edit-book">
                <label>Photo</label>
                <img src="upload/books/<?= $book->getImg() ?>" alt="Image de <?= $book->getTitle() ?>">
                <div class="edit-img">
                    <input type="file" value="modifier" id="img" name="img" accept=".jpeg, .jpg, .png">
                    <label for="img" class="edit-image">Modifier la photo</label>
                </div>
                <?= isset($_SESSION["errorImg"]) ? "<p>" . $_SESSION["errorImg"] . "</p>" : null ?>
            </div>
            <div class="right-edit-book">
                <div class="edit-title">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" value="<?= $book->getTitle() ?>">
                </div>
                <div class="edit-author">
                    <label for="author">Auteur</label>
                    <input type="text" id="author" name="author" value="<?= $book->getAuthor() ?>">
                </div>
                <div class="edit-description">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description"><?= $book->getDescription() ?>
                    </textarea>
                </div>
                <div class="edit-disponibility">
                    <label for="disponibility">Disponibilité</label>
                    <select id="disponibility" name="disponibility">
                        <option value="1" <?= $book->getDisponibility() ? "selected" : null ?>>Disponible</option>
                        <option value="0" <?= $book->getDisponibility() ? null : "selected" ?>>Indisponbible</option>
                    </select>
                </div>
                <button type="submit" class="button button-green">Valider</button>
            </div>
        </form>
    </div>

</section>