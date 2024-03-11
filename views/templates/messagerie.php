<?php
?>
<section class="background-content-messagerie">
    <div class="content-messagerie">
        <div class="left-messagerie">
            <h1>Messagerie</h1>
            <ul>
                <?php
                foreach ($usersChat as $userChat) {
                    if (isset($userTo)) {
                ?>
                        <li class="<?= $userChat["user_to"] == $userTo->getId() ? 'active-messagerie' : null ?>">
                        <?php } else { ?>
                        <li><?php } ?>
                        <a href="index.php?action=messagerie&idUserTo=<?= $userChat["user_to"] ?>">
                            <img src="upload/avatar/<?= $userChat["avatar"] ?>" alt="">
                            <div class="content-contact">
                                <div class="name-hour">
                                    <div><?= $userChat["pseudo"] ?></div>
                                    <div><?= Utils::convertToHour(new DateTime($userChat["date_send"])) ?></div>
                                </div>
                                <div class="summary">
                                    <p>
                                        <?= $userChat["message"] ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        </li>
                    <?php
                }
                    ?>
            </ul>
        </div>
        <div class="right-messagerie">
            <?php
            if (isset($userTo)) {
            ?>
                <div class="content-discussion">
                    <div class="top-discussion">
                        <img src="upload/avatar/<?= $userTo->getAvatar() ?>" alt="">
                        <div><?= $userTo->getPseudo() ?></div>
                    </div>
                    <div class="discussion">
                        <?php foreach ($messages as $key => $message) {
                        ?>
                            <?php if ($message["user_from"] == $userTo->getId()) ?>
                            <div class="content-message <?= $message["user_from"] == $userTo->getId() ? 'user-from' : 'user-to' ?>">
                                <div class="top-message">
                                    <?php if ($message["user_from"] == $userTo->getId() && (empty($messages[$key + 1]) || $message["user_from"] != $messages[$key + 1]["user_from"])) {
                                    ?>
                                        <img src="upload/avatar/<?= $message["avatar"] ?>" alt="">
                                    <?php } ?>
                                    <div><?= Utils::convertDateHour(new DateTime($message["date_send"])) ?></div>
                                </div>
                                <p><?= $message["message"] ?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <form action="index.php?action=messagerie&idUserTo=<?= $userTo->getId() ?>" class="bottom-discussion" method="POST">
                        <textarea type="text" placeholder="Tapez votre message ici" name="message"></textarea>
                        <button type="submit" class="button button-green">Envoyer</button>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>